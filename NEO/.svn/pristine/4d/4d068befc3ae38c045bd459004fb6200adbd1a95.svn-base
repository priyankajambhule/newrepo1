<?php

App::uses('AppModel', 'Model');

/**
 * IdProof Model
 *
 */
class IdProof extends AppModel {


public $validate = array(
        
			'name' => array(
            'nonEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Please enter name',
				'allowEmpty' => false
            ),
			'isUnique' => array(
		    'rule' => 'isUnique',
            'message' => 'The city with this IdProof already existss'
			)
			),			
		
			
	);
	
	public function getIdProofList() {	
        $fields = array('IdProof.id','IdProof.name');
		$conditions = array('IdProof.is_deleted !='=>BOOL_TRUE,'IdProof.is_active !='=>BOOL_FALSE);
        return $this->find('list', array('fields' => $fields,'conditions'=>$conditions,'order'=>'name asc'));
    }

}
