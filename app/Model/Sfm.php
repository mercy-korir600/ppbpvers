 <?php                                                                                                                                                                    
    App::uses('AppModel', 'Model');                                                                                                                                          
                                                                                                                                                                             
    /**                                                                                                                                                                      
     * Sfm Model                                                                                                                                                             
     *                                                                                                                                                                       
     * @property County $County                                                                                                                                              
     * @property SubCounty $SubCounty                                                                                                                                        
     */                                                                                                                                                                      
    class Sfm extends AppModel                                                                                                                                               
    {                                                                                                                                                                        
        public $actsAs = array('Search.Searchable', 'Containable');                                                                                                          
                                                                                                                                                                             
        public $belongsTo = array(                                                                                                                                           
            'County' => array(                                                                                                                                               
                'className' => 'County',                                                                                                                                     
                'foreignKey' => 'county_id',                                                                                                                                 
                'conditions' => '',                                                                                                                                          
                'fields' => '',                                                                                                                                              
                'order' => ''                                                                                                                                                
            ),                                                                                                                                                               
            'SubCounty' => array(                                                                                                                                            
                'className' => 'SubCounty',                                                                                                                                  
                'foreignKey' => 'sub_county_id',                                                                                                                             
                'conditions' => '',                                                                                                                                          
                'fields' => '',                                                                                                                                              
                'order' => ''                                                                                                                                                
            )                                                                                                                                                                
        );                                                                                                                                                                   
                                                                                                                                                                             
        public $filterArgs = array(                                                                                                                                          
            'reference_no' => array('type' => 'like', 'encode' => true),                                                                                                     
            'brand_name' => array('type' => 'like', 'encode' => true),                                                                                                       
            'county_id' => array('type' => 'value'),                                                                                                                         
            'sub_county_id' => array('type' => 'value'),                                                                                                                     
            'submitted' => array('type' => 'value')                                                                                                                          
        );                                                                                                                                                                   
    }                                