<?php

App::uses('AppModel', 'Model');

/**
 * Role Model
 *
 * @property User $User
 */
class Role extends AppModel {

    public $displayField = 'name';
    // defining server side validation
  
    //The Associations below have been created with all possible keys, those that are not needed can be removed
    /**
     * hasMany associations
     *
     * @var array
     */
   /* public $hasMany = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'role_id',
        )
    );*/

    //function to get role pertaining to user
    public function getUserList() {	
        $fields = array('Role.id','Role.name');
		$conditions = array('Role.is_deleted !='=>BOOL_TRUE,'Role.is_active !='=>BOOL_FALSE);
        return $this->find('list', array('fields' => $fields,'conditions'=>$conditions,'order'=>'name asc'));
    }
    
    //function for getting data from role table
  /*  public function getRoleData($type = 'first', $conditions = null, $fields = null, $contain = null, $order = null, $group = null, $recursive = null) {
        $roleData = $this->find($type, array(
            'conditions' => $conditions,
            'fields' => $fields,
            'contain' => $contain,
            'order' => $order,
            'group' => $group,
            'recursive' => $recursive
        ));
        return $roleData;
    }	*/
	public function getRoleNameList(){	
        $fields = array('Role.id','Role.name');
		$conditions = array('Role.is_deleted !='=>BOOL_TRUE,'Role.is_active !='=>BOOL_FALSE);
        return $this->find('list', array('fields' => $fields,'conditions'=>$conditions,'order'=>'name asc'));
    }
}
