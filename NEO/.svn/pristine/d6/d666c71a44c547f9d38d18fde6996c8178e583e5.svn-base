<?php

App::uses('AppModel', 'Model');

/**
 * Ledger Model
 *
 */
class Ledger extends AppModel {


public $validate = array(
        
			'name' => array(
            'nonEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Please enter ledger name',
				'allowEmpty' => false
            ),
			'isUnique' => array(
			'rule' => array('isUnique', array('name'), false),
			'message' => 'The author with this ledger exists.'
			)
			),	
			/*'group_id' => array(
			'notempty' => array(
			'rule' => array('notempty'),
			'message' => 'Please select group',
			)),*/
			
			
			
	);
	public $belongsTo = array(
	
		'PartyDetail' => array(
            'className' => 'PartyDetail',
            'foreignKey' => 'id'
        )
		);
		
	/*
	Amit Sahu
	03.02.17
	get all ledger list
	*/
	public function getLedgerList(){	
        $fields = array('Ledger.id','Ledger.company_name');
		$conditions = array('Ledger.is_deleted !='=>BOOL_TRUE,'Ledger.is_active !='=>BOOL_FALSE);
        return $this->find('list', array('fields' => $fields,'conditions'=>$conditions,'order'=>'name asc'));
    }

	
}
