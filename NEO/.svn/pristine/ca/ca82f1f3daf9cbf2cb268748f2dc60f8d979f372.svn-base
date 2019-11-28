<?php

App::uses('AppModel', 'Model');

/**
 * State Model
 *
 */
class Country extends AppModel {
    
	public $validate = array(
			'name' => array(
            'nonEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Please enter country name',
				'allowEmpty' => false
            ),
			'isUnique' => array(
			'rule' => array('isUnique', array('name','is_deleted'=>BOOL_FALSE), false),
			'message' => 'The country alreay exists.'
			)
			)	
	);
	
		
	
	public $hasMany = array(
        'State' => array(
            'className' => 'State',
        ));
		/*
		Amit Sahu
		Get Country List
		24.02.18
		
		*/
		public function getCountryList() {	
        $fields = array('Country.id','Country.name');
		$conditions = array('Country.is_deleted !='=>BOOL_TRUE,'Country.is_active !='=>BOOL_FALSE);
        return $this->find('list', array('fields' => $fields,'conditions'=>$conditions,'order'=>'name asc'));
    }
}
