<?php

/**
 * Kajal kurrewar
 * 07-12-2017
 */
App::uses('Helper', 'View');

class StudentHelper extends AppHelper {


	function countUnapprovedStudent() {
        $this->Student = ClassRegistry::init('Student');
		$UnapprovedCount=$this->Student->countUnapprovedStudent();
		return $UnapprovedCount;
    }

   
}
