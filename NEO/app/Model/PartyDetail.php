<?php

App::uses('AppModel', 'Model');

/**
 * PartyDetail Model
 *
 */
class PartyDetail extends AppModel {

	public $belongsTo = array(
       
		'Country' => array(
            'className' => 'Country',
            'foreignKey' => 'country_id'
        )
		);
		
	
	
}
