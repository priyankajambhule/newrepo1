<?php
/*
#Create by Mohammad Masood
#Created on 28-07-2016
#Purpose : To show numbered google captcha on customer login form
*/
App::uses('AppHelper', 'View/Helper');
App::import('Vendor','recaptchav1' ,array('file'=>'recaptchav1'.DS.'recaptchalib.php')); 

class RecaptchaOneHelper extends AppHelper {
	
	function captcha()
	{
		 $publickey = "6Lc74iUTAAAAABaZjKXhJRzpOOIeT_Q_-eEKyZjh"; 
         return recaptcha_get_html($publickey);
	}	
				
}