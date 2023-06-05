<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
App::uses('CakeText', 'Utility');
App::uses('ThemeView', 'View');
App::uses('HtmlHelper', 'View/Helper');
App::uses('Router', 'Routing');
/**
 * Drugs Controller
 * * @property Drug $Drug
 */
class DrugsController extends AppController {

/**
 * Scaffold
 *
 * @var mixed
 */
	public $scaffold; 
	public $components = array('Search.Prg');
    public $paginate = array();
    public $presetVars = true;
    public $page_options = array('25' => '25', '50' => '50', '100' => '100');
	public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('manager_index');
    }

	public function manager_index()
	{
		# code...
		$this->Prg->commonProcess();
        if (!empty($this->passedArgs['start_date']) || !empty($this->passedArgs['end_date'])) $this->passedArgs['range'] = true;
        if (isset($this->passedArgs['pages']) && !empty($this->passedArgs['pages'])) $this->paginate['limit'] = $this->passedArgs['pages'];
        else $this->paginate['limit'] = reset($this->page_options);
        
        // $criteria = $this->Drug->parseCriteria($this->passedArgs); 
 
        // $this->paginate['conditions'] = $criteria;
        $this->paginate['order'] = array('Drug.created' => 'desc');       
        $this->set('page_options', $this->page_options); 
        $this->set('drugs', Sanitize::clean($this->paginate(), array('encode' => false)));
	}

}
