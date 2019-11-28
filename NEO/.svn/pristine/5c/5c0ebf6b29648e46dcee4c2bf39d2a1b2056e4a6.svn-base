<?php

App::uses('AppModel', 'Model');

/**
 * City Model
 *
 */
class City extends AppModel {


public $validate = array(
        
			'name' => array(
            'nonEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Please enter city name',
				'allowEmpty' => false
            ),
			'isUnique' => array(
		    'rule' => 'isUnique',
            'message' => 'The city with this state already existss'
			),
			),			
			'state_id' => array(
            'nonEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Please select state',
				'allowEmpty' => false
            ))
			
	);
	
	public $belongsTo = array(
        'State' => array(
            'className' => 'State',
            'foreignKey' => 'state_id'
        )
    );	
	
	
	/*
	Amit Sahu
	03.02.17
	get all distributor list
	*/
	public function getCityList() {	
        $fields = array('City.id','City.name');
		$conditions = array('City.is_deleted !='=>BOOL_TRUE,'City.is_active !='=>BOOL_FALSE);
        return $this->find('list', array('fields' => $fields,'conditions'=>$conditions,'order'=>'name asc'));
    }
}
