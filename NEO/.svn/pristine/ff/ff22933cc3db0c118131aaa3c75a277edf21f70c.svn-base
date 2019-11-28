
<?php

/**rAbhay
	1-12-17
 * @Admission Document related helper
 *
 */
App::uses('Helper', 'View');

class DocHelper extends AppHelper {

    function getDocumentData($id) {
       
      
        $this->Courses = ClassRegistry::init('Courses');
        $docData = $this->Courses->findById($id);
        return $docData;
    }

	function getStudentDocument($id) {
       
      
        $this->Regdocument = ClassRegistry::init('Regdocument');
        $studentsDocsData = $this->Regdocument->findById($id);
        return $studentsDocsData;
    }

}
