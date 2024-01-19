<?php
App::uses('SadrReaction', 'Model');

/**
 * SadrReaction Test Case
 */
class SadrReactionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.sadr_reaction',
		'app.sadr',
		'app.user',
		'app.group',
		'app.designation',
		'app.pqmp',
		'app.county',
		'app.sub_county',
		'app.aefi',
		'app.aefi_description',
		'app.aefi_reaction',
		'app.attachment',
		'app.aefi_list_of_vaccine',
		'app.vaccine',
		'app.reminder',
		'app.comment',
		'app.padr',
		'app.padr_list_of_medicine',
		'app.country',
		'app.notification',
		'app.feedback',
		'app.saefi',
		'app.review',
		'app.device',
		'app.list_of_device',
		'app.medication',
		'app.medication_product',
		'app.transfusion',
		'app.pint',
		'app.sae',
		'app.concomittant_drug',
		'app.route',
		'app.suspected_drug',
		'app.ce2b',
		'app.facility_code',
		'app.sadr_list_of_drug',
		'app.sadr_followup',
		'app.dose',
		'app.frequency',
		'app.sadr_description',
		'app.sadr_list_of_medicine'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SadrReaction = ClassRegistry::init('SadrReaction');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SadrReaction);

		parent::tearDown();
	}

}
