<?php

/**
 * @author Ashish Tiwari
 *
 */
App::uses('Helper', 'View');

class CommonHelper extends AppHelper {

    var $helpers = array("Session");
	
	function Query($table=NULL,$type=NULL,$array) 
	{
	 	$this->$table = ClassRegistry::init($table);	 		
	 	$result = $this->$table->find($type,$array);
//		echo $this->sql();
		return $result;
    }
	
	
	/**
	* method masks the username of an email address
	*
	* @param string $email the email address to mask
	* @param string $mask_char the character to use to mask with
	* @param int $percent the percent of the username to mask
	*/
	function hide_email( $email, $mask_char, $percent=50 )
	{
	
		list( $user, $domain ) = preg_split("/@/", $email );
	
		$len = strlen( $user );
	
		$mask_count = floor( $len * $percent /100 );
	
		$offset = floor( ( $len - $mask_count ) / 2 );
	
		$masked = substr( $user, 0, $offset )
				.str_repeat( $mask_char, $mask_count )
				.substr( $user, $mask_count+$offset );
	
	
		return( $masked.'@'.$domain );
	} 
	
	function hide_phone($phone) 
	{	
		if(!empty($phone) and strlen($phone)>9)		
		{
			$first=substr($phone, 0, -7);
			$second='*****';
			$third=substr($phone, 8, 2);
			$star=$first.$second.$third;
						
			return $star;
		}	
	}

	/**
	* quick sql debug from controller dynamically
	* or statically from just about any other place in the script
	* @param bool $die: TRUE to output and die, FALSE to log to file and continue
	*/
	function sql($die = true) {
	if (isset($this->Controller)) {
		$object = $this->Controller->{$this->Controller->modelClass};
	} else {
		$object = ClassRegistry::init(defined('CLASS_USER')?CLASS_USER:'User');
	}
	
	$log = $object->getDataSource()->getLog(false, false);
	foreach ($log['log'] as $key => $value) {
		if (strpos($value['query'], 'SHOW ') === 0 || strpos($value['query'], 'SELECT CHARACTER_SET_NAME ') === 0) {
			unset($log['log'][$key]);
			continue;	
		}
	}
	// Output and die?
	if ($die) {
		debug($log);
		die();
	}
	// Log to file then and continue
	$log = print_r($log, true);
	CakeLog::write('sql', $log);
	}	
	
	function complexPassword($candidate) {
    if (!preg_match_all('$\S*(?=\S{8,})(?=\S*[a-zA-Z])(?=\S*[\d])(?=\S*[\W])\S*$', $candidate)){
        	return false;
		}
    return true;
}
}
