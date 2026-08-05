<?php
App::uses('AppModel', 'Model');

/**
 * Sfm Model (Suspected Falsified Medicine)
 *
 * @property User $User
 * @property County $County
 * @property SubCounty $SubCounty
 * @property Designation $Designation
 * @property Attachment $Attachment
 */
class Sfm extends AppModel
{
    public $name = 'Sfm';
    public $actsAs = array('Search.Searchable', 'Containable');

     public $filterArgs = array(                                                                                                                                          
            'reference_no' => array('type' => 'like', 'encode' => true),                                                                                                     
            'brand_name'   => array('type' => 'like', 'encode' => true),                                                                                                     
            'generic_name' => array('type' => 'like', 'encode' => true),                                                                                                     
            'batch_number' => array('type' => 'like', 'encode' => true),                                                                                                     
            'range'        => array('type' => 'expression', 'method' => 'makeRangeCondition', 'field' => 'Sfm.created BETWEEN ? AND ?'),                                     
            'county_id'    => array('type' => 'value'),                                                                                                                      
            'sub_county_id'=> array('type' => 'value'),                                                                                                                      
            'report_type'  => array('type' => 'value'),                                                                                                                      
            'submitted'    => array('type' => 'value'),                                                                                                                      
            'start_date'   => array('type' => 'query', 'method' => 'dummy'),                                                                                                 
            'end_date'     => array('type' => 'query', 'method' => 'dummy'),                                                                                                 
        );                                                                                                                                                                   
                                                                                                                                                                             
         public function makeRangeCondition($data = array())                                                                                                                  
        {                                                                                                                                                            
            if (empty($data['start_date']) && empty($data['end_date'])) {                                                                                                    
                return array();                                                                                                                                              
            }                                                                                                                                                                
                                                                                                                                                                             
            if (!empty($data['start_date'])) {                                                                                                                               
                $start_date = date('Y-m-d 00:00:00', strtotime($data['start_date']));                                                                                        
            } else {                                                                                                                                                         
                $start_date = date('Y-m-d 00:00:00', strtotime('2012-05-01'));                                                                                               
            }                                                                                                                                                                
                                                                                                                                                                             
            if (!empty($data['end_date'])) {                                                                                                                                 
                $end_date = date('Y-m-d 23:59:59', strtotime($data['end_date']));                                                                                            
            } else {                                                                                                                                                         
                $end_date = date('Y-m-d 23:59:59');                                                                                                                          
            }                                                                                                                                                                
                                                                                                                                                                             
            return array($start_date, $end_date);                                                                                                                            
        }                                                                                                                                                                     
                                                                                                                                                                             
        public function dummy($data = array())                                                                                                                               
        {                                                                                                                                                                    
            return array();                                                                                                                                                  
        }                                       
    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
        ),
        'County' => array(
            'className' => 'County',
            'foreignKey' => 'county_id',
        ),
        'SubCounty' => array(
            'className' => 'SubCounty',
            'foreignKey' => 'sub_county_id',
        ),
        'Designation' => array(
            'className' => 'Designation',
            'foreignKey' => 'designation_id',
        )
    );

    public $hasMany = array(
        'Attachment' => array(
            'className' => 'Attachment',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('Attachment.model' => 'Sfm'),
        ),
        'Comment' => array(
            'className' => 'Comment',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('Comment.model' => 'Sfm'),
        )
    );
}
