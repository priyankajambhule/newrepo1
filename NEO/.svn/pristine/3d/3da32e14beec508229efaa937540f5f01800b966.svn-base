<?php

/**
 * @author Ashish Tiwari
 *
 */
App::uses('Helper', 'View');

class ContentHelper extends AppHelper {

    var $helpers = array("Session");

    /**
     * Function to check Follow Footer Content
     * getTripFeedback() method
     * @name getFollowContent
     * @acces public 
     * @param  N/A
     * @return void
     * @created 27 Nov 2014
     * @modified 27 Nov 2014
     */
    function getFollowContent() {
        // FOLLOW US CONTENT
        $followConditions = array(
            'slug' => 'follow',
            'is_active' => BOOL_TRUE,
            'is_deleted' => BOOL_FALSE
        );
        $fields = array(
            'name',
            'content'
        );
        $this->SiteContent = ClassRegistry::init('SiteContent');
        $followData = $this->SiteContent->findPageBySlug($followConditions, $fields);
        return $followData;
    }

}
