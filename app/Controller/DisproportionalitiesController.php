<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
App::uses('CakeText', 'Utility');
App::uses('ThemeView', 'View');
App::uses('HtmlHelper', 'View/Helper');
App::uses('Router', 'Routing');
/**
 * Disproportionalities Controller
 */
class DisproportionalitiesController extends AppController {

/**
 * Scaffold
 *  @property Disproportionality $Disproportionality
 *
 * @var mixed 
 */
	public $scaffold;

	public $components = array( 
        'Search.Prg', 
    );
    public $paginate = array(); 
    public $presetVars = true;
    public $page_options = array('25' => '25', '50' => '50', '100' => '100');

	public function manager_index()
    {
        $this->Prg->commonProcess(); 
        if (!empty($this->passedArgs['start_date']) || !empty($this->passedArgs['end_date'])) $this->passedArgs['range'] = true;
        if (!empty($this->request->query['pages'])) $this->paginate['limit'] = $this->request->query['pages'];
        else $this->paginate['limit'] = reset($this->page_options);

        $criteria = $this->Disproportionality->parseCriteria($this->passedArgs);
        $this->paginate['conditions'] = $criteria;
        $this->paginate['order'] = array('Disproportionality.created' => 'desc');
        
        $this->set('page_options', $this->page_options); 
        $this->set('sadrs', Sanitize::clean($this->paginate(), array('encode' => false)));
    }

}
