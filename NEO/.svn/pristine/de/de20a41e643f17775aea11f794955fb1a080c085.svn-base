<?php

App::uses('AppModel', 'Model');


class State extends AppModel {
    
	 
public $validate = array(
        
			'name' => array(
            'nonEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Please enter state name',
				'allowEmpty' => false
            ),
			'isUnique' => array(
			'rule' => array('isUnique', array('name', 'country_id','is_deleted'=>BOOL_FALSE), false),
			'message' => 'The state with this country already exists.'
			)
			),			
			'country_id' => array(
            'nonEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Please select country',
				'allowEmpty' => false
            ))
			
	);

	 
    public $belongsTo = array(
	'Country' => array(
            'className' => 'Country',
            'foreignKey' => 'country_id'
        ),
    );
	
	/*
		Amit Sahu
		Get State List
		24.02.18
		
		*/
		public function getStateList() {	
        $fields = array('State.id','State.name');
		$conditions = array('State.is_deleted !='=>BOOL_TRUE,'State.is_active !='=>BOOL_FALSE);
        return $this->find('list', array('fields' => $fields,'conditions'=>$conditions,'order'=>'name asc'));
    }
}
