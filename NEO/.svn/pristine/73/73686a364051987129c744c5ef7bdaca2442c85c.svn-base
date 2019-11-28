<?php

App::uses('AppModel', 'Model');

/**
 * Packagine Model
 *
 */
class Packagine extends AppModel {

	/*
	Mrunali D
	20.08.18
	get all Category list
	*/
	
	public function getPackagineList() {
        $fields = array('Packagine.id','Packagine.packing_type');		
		$conditions = array('Packagine.is_deleted !='=>BOOL_TRUE,'Packagine.is_active !='=>BOOL_FALSE);
        return $this->find('list', array('fields'=>$fields,'conditions'=>$conditions));
    }
	
}
