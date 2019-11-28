<?php

App::uses('AppModel', 'Model');

/**
 * MfgLocation Model
 *
 */
class MfgLocation extends AppModel {

	
		
	/*
	Mrunali D
	20.08.18
	get all Category list
	*/
	
	public function getMfgLocationList() {
        $fields = array('MfgLocation.id','MfgLocation.area');		
		$conditions = array('MfgLocation.is_deleted !='=>BOOL_TRUE,'MfgLocation.is_active !='=>BOOL_FALSE);
        return $this->find('list', array('fields'=>$fields,'conditions'=>$conditions));
    }
	
}
