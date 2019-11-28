<?php

App::uses('AppModel', 'Model');

/**
 * Rfq Model
 *
 */
class Rfq extends AppModel {

	public $belongsTo = array(
       
		'Ledger' => array(
            'className' => 'Ledger',
            'foreignKey' => 'customer_id'
        ),
		'MfgLocation' => array(
            'className' => 'MfgLocation',
            'foreignKey' => 'mfg_id'
        )
		
		);
		
	
	
}
