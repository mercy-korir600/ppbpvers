<?php
/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {
	//For softdelete purpose
	public function exists($id = null) {
		if ($this->Behaviors->loaded('SoftDelete')) {
			return $this->existsAndNotDeleted($id);
		} else {
			return parent::exists($id);
		}
	}

	public function delete($id = null, $cascade = true) {
	    $result = parent::delete($id, $cascade);
	    if ($result === false && $this->Behaviors->enabled('SoftDelete')) {
	       return (bool)$this->field('deleted', array('deleted' => 1));
	    }
	    return $result;
	}

	function dateFormatAfterFind($dateString) {
		return date('d-m-Y', strtotime($dateString));
	}

	public function dateFormatBeforeSave($dateString) {
		return date('Y-m-d', strtotime($dateString));
	}

	function dateTimeFormatAfterFind($dateString) {
		return date('d-m-Y H:i', strtotime($dateString));
	}

	public function dateTimeFormatBeforeSave($dateString) {
		return date('Y-m-d H:i', strtotime($dateString));
	}

	/**
	 * Report models (Sadr, Padr, Ce2b, Saefi, Aggregate, Medication, Device,
	 * Pqmp, Aefi, Transfusion) all share a "copied" workflow:
	 *   copied = 0 -> a normal, never-copied report
	 *   copied = 1 -> the original report, after a manager/reviewer has made
	 *                 a working copy of it
	 *   copied = 2 -> the working copy itself, used for processing/submission
	 *
	 * Any row with copied = 1 or copied = 2 is part of that workflow, and its
	 * system-generated date fields (created, modified, submitted_date) must
	 * never be regenerated - not by CakePHP's automatic created/modified
	 * stamping, and not by controller code that stamps date('Y-m-d H:i:s').
	 * A fresh copy (copied = 2) must inherit those dates from the original
	 * report it was copied from; the original (copied = 1) must keep exactly
	 * what it already had, even though marking it "copied" is itself a save.
	 *
	 * This is centralized here (rather than patched into every report
	 * controller's copy/submit actions) so every report type gets the same
	 * guarantee from one place, run on every save/saveField() call.
	 *
	 * @param array $options Options passed from Model::save().
	 * @return bool
	 */
	public function beforeSave($options = array()) {
		if (!$this->hasField('copied')) {
			return true;
		}

		$alias = $this->alias;
		$exists = !empty($this->id) && $this->exists($this->id);

		$dateFields = array();
		foreach (array('created', 'modified', 'submitted_date') as $field) {
			if ($this->hasField($field)) {
				$dateFields[] = $field;
			}
		}
		if (empty($dateFields)) {
			return true;
		}

		if (isset($this->data[$alias]['copied'])) {
			$copiedState = (int)$this->data[$alias]['copied'];
		} elseif ($exists) {
			$raw = $this->_rawFieldValues($this->id, array('copied'));
			$copiedState = isset($raw['copied']) ? (int)$raw['copied'] : 0;
		} else {
			$copiedState = 0;
		}

		if ($copiedState !== 1 && $copiedState !== 2) {
			return true;
		}

		$refField = strtolower($alias) . '_id';

		if (!$exists && $copiedState === 2 && $this->hasField($refField) && !empty($this->data[$alias][$refField])) {
			// Brand-new copy row: inherit the original report's dates
			// verbatim, ignoring anything already computed in $this->data.
			$original = $this->_rawFieldValues($this->data[$alias][$refField], $dateFields);
			foreach ($dateFields as $field) {
				if (isset($original[$field])) {
					$this->data[$alias][$field] = $original[$field];
				}
			}
		} elseif ($exists) {
			// Existing row already part of the copy workflow: keep whatever
			// is already stored, regardless of what this save would
			// otherwise write (auto-stamped 'modified', or an explicit
			// date('Y-m-d H:i:s') from controller code).
			$existing = $this->_rawFieldValues($this->id, $dateFields);
			foreach ($dateFields as $field) {
				if (!empty($existing[$field])) {
					$this->data[$alias][$field] = $existing[$field];
				}
			}
		}

		return true;
	}

	/**
	 * Fetches raw field values for a single record directly from the
	 * database, bypassing afterFind() callbacks so date/time fields come
	 * back exactly as stored (some report models reformat dates - e.g.
	 * day-only precision - in their own afterFind()).
	 *
	 * @param mixed $id Primary key value.
	 * @param array $fields Field names to fetch.
	 * @return array Field values keyed by field name, empty array if not found.
	 */
	protected function _rawFieldValues($id, $fields) {
		if (empty($id)) {
			return array();
		}
		$row = $this->find('first', array(
			'conditions' => array($this->alias . '.' . $this->primaryKey => $id),
			'fields' => $fields,
			'recursive' => -1,
			'callbacks' => false,
		));
		if (empty($row[$this->alias])) {
			return array();
		}
		return $row[$this->alias];
	}
}
