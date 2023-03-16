<?php
App::uses('AppController', 'Controller');
App::uses('HttpSocket', 'Network/Http');
/**
 * Meddras Controller
 *
 * @property Meddra $Meddra
 * @property PaginatorComponent $Paginator
 */
class MeddrasController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Search.Prg');
	public $paginate = array();
	public $presetVars = array(
        array('field' => 'llt_name', 'type' => 'value'),
    );

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('autocomplete', 'api_autocomplete','autosync');
	}

	public function autocomplete($query = null) {
		$this->RequestHandler->setContent('json', 'application/json' ); 
		$groupers = $this->Meddra->finder($this->request->query['term']);			
                $groups = array();
		foreach ($groupers as $key => $value) {
			$groups[] = $value['Meddra']['llt_name'];
		}
		$this->set('groups', array_values($groups));
        $this->set('_serialize', 'groups');
	}

	public function autosync()
	{
		$HttpSocket = new HttpSocket();

        //Request Access Token
        $initiate = $HttpSocket->get('https://umc-ext-dev-apim-01.azure-api.net/global-api/v1/regional-drugs'
           ,array('header' => array('umc-client-key' => '1f47dbc26c524fbbb8d6f3e2b9244434',
		   'umc-license-key'=>'7013477',
		   'subscription key'=>'uu'))
        );
        if ($initiate->isOk()) {
           
            $body = $initiate->body;           
            $this->Flash->success($body);
            $this->redirect($this->referer());
			 
		}else{
			$body = $initiate->body; 
            $this->Flash->error($body);
            $this->redirect($this->referer());

		}
	}

	public function api_autocomplete($query = null) {
		$this->RequestHandler->setContent('json', 'application/json' ); 
		$groupers = $this->Meddra->finder($this->request->query['term']);			
                $groups = array();
		foreach ($groupers as $key => $value) {
			$groups[] = $value['Meddra']['llt_name'];
		}
		$this->set('groups', array_values($groups));
        $this->set('_serialize', 'groups');
	}


	public function admin_index() {
		$this->Prg->commonProcess();
		$criteria = $this->Meddra->parseCriteria($this->passedArgs);
        $this->paginate['conditions'] = $criteria;
 		$this->Meddra->recursive = -1;
        $this->paginate['limit'] = 20;
        $this->paginate['order'] = array('Meddra.llt_name' => 'asc');
		$this->set('meddras', $this->paginate());
	}
}
