<?php

App::uses('AppModel', 'Model');

/**
 * Role Model
 *
 * @property User $User
 */
class RolePermission extends AppModel {

    
    
    
    public function getPermissionData($type = 'first', $conditions = null, $fields = null, $contain = null, $order = null, $group = null, $recursive = null) {
        $isPermitted = $this->find($type, array(
            'conditions' => $conditions,
            'fields' => $fields,
            'contain' => $contain,
            'order' => $order,
            'group' => $group,
            'recursive' => $recursive
        ));
        return $isPermitted;
		print_r($isPermitted);
    }

}
