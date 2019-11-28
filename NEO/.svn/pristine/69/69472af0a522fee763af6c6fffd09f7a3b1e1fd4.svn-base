<?php
App::uses('Component', 'Controller');

/**
 *
 * @author vivekshukla
 *        
**/
 
class EmailComponent extends Component {

    var $uses = array('EmailTemplate','SiteSetting');

    /**
     * function : sendMailContent()
     * params : $receiverEmail : User full name.
     * params : $senderEmail : Sender email address.
     * params : $subject : Subject line for email.
     * params : $message : Actual contents to send to user.
     * description : This function is use to send mail to user.
     */
    function sendMailContent($receiverEmail, $senderEmail, $subject, $message, $attachmentPath = null) {

        $this->SiteSetting = ClassRegistry::init('SiteSetting');
        App::import('Vendor', 'phpmailer', array(
            'file' => 'phpmailer' . DS . 'class.phpmailer.php'
        ));
		
        $mail = new PHPMailer ();
        $mail->SetLanguage("en", 'vendors/phpMailer/language/');
        $mail->IsSMTP(); // telling the class to use SMTP
        $SMTP_HOST = trim($this->SiteSetting->getSettingValue('SMTP_HOST'));
        $SMTP_PORT = trim($this->SiteSetting->getSettingValue('SMTP_PORT'));
        $SMTP_USERNAME = trim($this->SiteSetting->getSettingValue('SMTP_USERNAME'));
        $SMTP_PASSWORD = trim($this->SiteSetting->getSettingValue('SMTP_PASSWORD'));

        $mail->Mailer = "smtp";
        $mail->SMTPAuth = TRUE;
        if ($SMTP_HOST == 'smtp.gmail.com') {
            $mail->SMTPSecure = "tls";
        }

        $mail->Host = $SMTP_HOST;
        $mail->Port = $SMTP_PORT;
        $mail->Username = $SMTP_USERNAME;
        $mail->Password = $SMTP_PASSWORD;
        $mail->SMTPDebug = FALSE;

        $mail->From = $senderEmail;
        $mail->FromName = $senderEmail;
        $mail->Sender = $receiverEmail;
        $mail->AddAddress($receiverEmail, $receiverEmail);
        $mail->Subject = $subject;
        $mail->Body = $message;
        $mail->AddAttachment($attachmentPath);
        $mail->CharSet = 'UTF-8';
        $mail->WordWrap = 100;
        $mail->IsHTML(TRUE);

        if ($mail->Send()) {
            return TRUE;
        } else {
			echo "Mailer Error: " . $mail->ErrorInfo;
            //return FALSE;
        }
    }
	
	/*****************************************************************************/

   function sendFeedbackEmail($tempateID, $emailData = array(), $attachmentPath = null) {
        (isset($emailData ['receiver_email'])) ? $receiverEmail = $emailData ['receiver_email'] : $receiverEmail = NULL;
		(isset($emailData ['NAME'])) ? $name = $emailData ['NAME'] : $name = NULL;
		(isset($emailData ['PHONE'])) ? $phone = $emailData ['PHONE'] : $phone = NULL;
		(isset($emailData ['SUBJECT'])) ? $subject = $emailData ['SUBJECT'] : $subject = NULL;
		(isset($emailData ['ENQUIRY'])) ? $enquiry = $emailData ['ENQUIRY'] : $enquiry = NULL;
        

        $siteLink = 'http://' . $_SERVER ['HTTP_HOST'];
        $this->SiteSetting = ClassRegistry::init('SiteSetting');
        $siteName = "TractoMandi Team";
        $loginLink = $siteLink . "/users/login";
        $loginLinkName = 'Login';

        $this->SiteSetting = ClassRegistry::init('SiteSetting');
		
        $senderEmail = $this->SiteSetting->getSettingValue('site_email');

        $loginLink = $siteLink . "/users/login";
        $loginLinkName = 'Login';

        //$topLogo = $siteLink . '/img/logo.png';
        //$bottomLogo = $siteLink . '/img/bottom_logo.png';

        $find = array(
            '[NAME]',
            '[PHONE]',
            '[SUBJECT]',
            '[ENQUIRY]',
			'[REGARDS]'
			
        );

        $replace = array(
		$name,
		$phone,
		$subject,
		$enquiry,
		$siteName
            
        );
        $tempatedata = ClassRegistry::init('EmailTemplate')->getTempateData($tempateID);
        $emailSubject = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['subject']);
        $emailContent = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['content']);

        if ($this->sendMailContent($receiverEmail, $senderEmail, $emailSubject,$emailContent)) {
            return 1;
        } else {
            return 0;
        }
    }
	
	/************************************************Tractor Booking*****************************/
	
	   function sendTractorbookingSendEmail($tempateID, $emailData = array(), $attachmentPath = null) {
        (isset($emailData ['receiver_email'])) ? $receiverEmail = $emailData ['receiver_email'] : $receiverEmail = NULL;
		(isset($emailData ['NAME'])) ? $name = $emailData ['NAME'] : $name = NULL;
        
        
		$heading="Tractor booking request send";
		$details="Your booking request was send successfully !
						Admin should approve your booking request shortly.After your booking has been approved,
						you will receive a notification via mail .";
        $siteLink = 'http://' . $_SERVER ['HTTP_HOST'];
        $this->SiteSetting = ClassRegistry::init('SiteSetting');
        $siteName = "TractoMandi Team";
        $loginLink = $siteLink . "/users/login";
        $loginLinkName = 'Login';

        $this->SiteSetting = ClassRegistry::init('SiteSetting');
		
        $senderEmail = $this->SiteSetting->getSettingValue('site_email');
		 
		 $find = array(
					'[HEADING]',
					'[NAME]',
					'[DETAILS]',
					'[REGARDS]'
				);

				$replace = array(
				$heading,
				$name,
				$details,
				$siteName
					
				);

       

        $tempatedata = ClassRegistry::init('EmailTemplate')->getTempateData($tempateID);
        $emailSubject = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['subject']);
        $emailContent = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['content']);

        if ($this->sendMailContent($receiverEmail, $senderEmail, $emailSubject,$emailContent)) {
            return 1;
        } else {
            return 0;
        }
    }
	//Tractor Booking Mail to Tractor Owner
	
	   function sendTractorbookingSendEmailOwner($tempateID, $emailData = array(), $attachmentPath = null) {
        (isset($emailData ['owner_email'])) ? $receiverEmail = $emailData ['owner_email'] : $receiverEmail = NULL;
		(isset($emailData ['OWN_NAME'])) ? $name = $emailData ['OWN_NAME'] : $name = NULL;
        
        
		$heading="Tractor booking request";
		$details="One booking request was send to admin for your tractor !
						Admin should approve request shortly.After your tractor has been booked,
						you will receive a notification via mail .";
        $siteLink = 'http://' . $_SERVER ['HTTP_HOST'];
        $this->SiteSetting = ClassRegistry::init('SiteSetting');
      
        $loginLink = $siteLink . "/users/login";
        $loginLinkName = 'Login';

        $this->SiteSetting = ClassRegistry::init('SiteSetting');
		$siteName = "TractoMandi Team";
        $senderEmail = $this->SiteSetting->getSettingValue('site_email');
		 
		  $find = array(
					'[HEADING]',
					'[NAME]',
					'[DETAILS]',
					'[REGARDS]'
				);

				$replace = array(
				$heading,
				$name,
				$details,
				$siteName
					
				);


   
        $tempatedata = ClassRegistry::init('EmailTemplate')->getTempateData($tempateID);
        $emailSubject = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['subject']);
        $emailContent = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['content']);

        if ($this->sendMailContent($receiverEmail, $senderEmail, $emailSubject,$emailContent)) {
            return 1;
        } else {
            return 0;
        }
    }
	//Tractor Booking Mail to Admin
	
	   function sendTractorbookingSendEmailAdmin($tempateID, $emailData = array(), $attachmentPath = null) {
        (isset($emailData ['admin_email'])) ? $receiverEmail = $emailData ['admin_email'] : $receiverEmail = NULL;
        
        $name="Admin";
		    $heading="Tractor booking request";
		$details="One booking request has been sent !
						Please approve booking request.";


        $siteLink = 'http://' . $_SERVER ['HTTP_HOST'];
        $this->SiteSetting = ClassRegistry::init('SiteSetting');
        $siteName = "TractoMandi Team";
        $loginLink = $siteLink . "/users/login";
        $loginLinkName = 'Login';

        $this->SiteSetting = ClassRegistry::init('SiteSetting');
       
        $senderEmail = $this->SiteSetting->getSettingValue('site_email');
		 
		 $find = array(
					'[HEADING]',
					'[NAME]',
					'[DETAILS]',
					'[REGARDS]'
				);

				$replace = array(
				$heading,
				$name,
				$details,
				$siteName
					
				);

       

        $tempatedata = ClassRegistry::init('EmailTemplate')->getTempateData($tempateID);
        $emailSubject = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['subject']);
        $emailContent = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['content']);

        if ($this->sendMailContent($receiverEmail, $senderEmail, $emailSubject,$emailContent)) {
            return 1;
        } else {
            return 0;
        }
    }
	/************************************************Cancel Tractor Booking*****************************/
	
	   function sendCancelTractorbookingSendEmail($tempateID, $emailData = array(), $attachmentPath = null) {
       (isset($emailData ['receiver_email'])) ? $receiverEmail = $emailData ['receiver_email'] : $receiverEmail = NULL;
		(isset($emailData ['NAME'])) ? $name = $emailData ['NAME'] : $name = NULL;
        
        
		$heading="Tractor booking cancel request send";
		$details="Your booking cancel request was send successfully !
						Admin should cancle your booking request shortly.After your booking has been cancled,
						you will receive a notification via mail .";
						
        $siteLink = 'http://' . $_SERVER ['HTTP_HOST'];
        $this->SiteSetting = ClassRegistry::init('SiteSetting');
        $siteName = "TractoMandi Team";
        $loginLink = $siteLink . "/users/login";
        $loginLinkName = 'Login';

        $this->SiteSetting = ClassRegistry::init('SiteSetting');
     
        $senderEmail = $this->SiteSetting->getSettingValue('site_email');
		 
		 $find = array(
					'[HEADING]',
					'[NAME]',
					'[DETAILS]',
					'[REGARDS]'
				);

				$replace = array(
				$heading,
				$cust_name,
				$details,
				$siteName
					
				);

       

        $tempatedata = ClassRegistry::init('EmailTemplate')->getTempateData($tempateID);
        $emailSubject = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['subject']);
        $emailContent = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['content']);

        if ($this->sendMailContent($receiverEmail, $senderEmail, $emailSubject,$emailContent)) {
            return 1;
        } else {
            return 0;
        }
    }
		//Tractor Booking Cancel Mail to Admin
	
	   function sendCancelTractorbookingSendEmailAdmin($tempateID, $emailData = array(), $attachmentPath = null) {
        (isset($emailData ['admin_email'])) ? $receiverEmail = $emailData ['admin_email'] : $receiverEmail = NULL;
        
        $name="Admin";
		    $heading="Tractor booking cancel request";
		$details="One booking cancel request has been sent !
						Please cancel booking request.";


        $siteLink = 'http://' . $_SERVER ['HTTP_HOST'];
        $this->SiteSetting = ClassRegistry::init('SiteSetting');
        $siteName = "TractoMandi Team";
        $loginLink = $siteLink . "/users/login";
        $loginLinkName = 'Login';

        $this->SiteSetting = ClassRegistry::init('SiteSetting');
      
        $senderEmail = $this->SiteSetting->getSettingValue('site_email');
		 
		 $find = array(
					'[HEADING]',
					'[NAME]',
					'[DETAILS]',
					'[REGARDS]'
				);

				$replace = array(
				$heading,
				$name,
				$details,
				$siteName
					
				);

       

        $tempatedata = ClassRegistry::init('EmailTemplate')->getTempateData($tempateID);
        $emailSubject = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['subject']);
        $emailContent = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['content']);

        if ($this->sendMailContent($receiverEmail, $senderEmail, $emailSubject,$emailContent)) {
            return 1;
        } else {
            return 0;
        }
    }
		/************************************************Close Tractor Booking*****************************/
	
	   function sendCloseTractorbookingSendEmailCustomer($tempateID, $emailData = array(), $attachmentPath = null) {
        
		(isset($emailData ['cust_email'])) ? $receiverEmail = $emailData ['cust_email'] : $receiverEmail = NULL;
		(isset($emailData ['cust_name'])) ? $cust_name = $emailData ['cust_name'] : $cust_name = NULL;
		(isset($emailData ['booking_id'])) ? $booking_id = $emailData ['booking_id'] : $booking_id = NULL;
        
        
		$heading="Tractor booking closed Sucessfully";
		$details="Your booking closed successfully ! booking id # ".$booking_id. " " ;
		
        $siteLink = 'http://' . $_SERVER ['HTTP_HOST'];
        $this->SiteSetting = ClassRegistry::init('SiteSetting');
     
        $loginLink = $siteLink . "/users/login";
        $loginLinkName = 'Login';

        $this->SiteSetting = ClassRegistry::init('SiteSetting');
       $siteName = "TractoMandi Team";
        $senderEmail = $this->SiteSetting->getSettingValue('site_email');
		 
		 $find = array(
					'[HEADING]',
					'[NAME]',
					'[DETAILS]',
					'[REGARDS]'
				);

				$replace = array(
				$heading,
				$cust_name,
				$details,
				$siteName
					
				);

       

        $tempatedata = ClassRegistry::init('EmailTemplate')->getTempateData($tempateID);
        $emailSubject = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['subject']);
        $emailContent = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['content']);

        if ($this->sendMailContent($receiverEmail, $senderEmail, $emailSubject,$emailContent)) {
            return 1;
        } else {
            return 0;
        }
    }
		//Tractor Booking Close Mail to Admin
	
	   function sendCloseTractorbookingSendEmailAdmin($tempateID, $emailData = array(), $attachmentPath = null) {
        (isset($emailData ['admin_email'])) ? $receiverEmail = $emailData ['admin_email'] : $receiverEmail = NULL;
		(isset($emailData ['booking_id'])) ? $booking_id = $emailData ['booking_id'] : $booking_id = NULL;
        
        $name="Admin";
		    $heading="Tractor booking closed sucessfully ";
		$details="One booking closed sucessfully !
						booking id # ".$booking_id. " ";


        $siteLink = 'http://' . $_SERVER ['HTTP_HOST'];
        $this->SiteSetting = ClassRegistry::init('SiteSetting');
        $siteName = "TractoMandi Team";
        $loginLink = $siteLink . "/users/login";
        $loginLinkName = 'Login';

        $this->SiteSetting = ClassRegistry::init('SiteSetting');
       
        $senderEmail = $this->SiteSetting->getSettingValue('site_email');
		 
		 $find = array(
					'[HEADING]',
					'[NAME]',
					'[DETAILS]',
					'[REGARDS]'
				);

				$replace = array(
				$heading,
				$name,
				$details,
				$siteName
					
				);

       

        $tempatedata = ClassRegistry::init('EmailTemplate')->getTempateData($tempateID);
        $emailSubject = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['subject']);
        $emailContent = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['content']);

        if ($this->sendMailContent($receiverEmail, $senderEmail, $emailSubject,$emailContent)) {
            return 1;
        } else {
            return 0;
        }
    }
	//Tractor Booking Close Mail to Tractro Owner
	
	   function sendCloseTractorbookingSendEmailOwner($tempateID, $emailData = array(), $attachmentPath = null) {
        (isset($emailData ['owner_email'])) ? $receiverEmail = $emailData ['owner_email'] : $receiverEmail = NULL;
		(isset($emailData ['owner_name'])) ? $owner_name = $emailData ['owner_name'] : $owner_name = NULL;
		(isset($emailData ['booking_id'])) ? $booking_id = $emailData ['booking_id'] : $booking_id = NULL;
        
        
		    $heading="Tractor booking closed sucessfully ";
		$details="One booking closed sucessfully !
						booking id # ".$booking_id. " ";


        $siteLink = 'http://' . $_SERVER ['HTTP_HOST'];
        $this->SiteSetting = ClassRegistry::init('SiteSetting');
        $siteName = "TractoMandi Team";
        $loginLink = $siteLink . "/users/login";
        $loginLinkName = 'Login';

        $this->SiteSetting = ClassRegistry::init('SiteSetting');
       
        $senderEmail = $this->SiteSetting->getSettingValue('site_email');
		 
		 $find = array(
					'[HEADING]',
					'[NAME]',
					'[DETAILS]',
					'[REGARDS]'
				);

				$replace = array(
				$heading,
				$owner_name,
				$details,
				$siteName
					
				);

       

        $tempatedata = ClassRegistry::init('EmailTemplate')->getTempateData($tempateID);
        $emailSubject = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['subject']);
        $emailContent = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['content']);

        if ($this->sendMailContent($receiverEmail, $senderEmail, $emailSubject,$emailContent)) {
            return 1;
        } else {
            return 0;
        }
    }
	//Tractor Booking Close Mail to Tractro Driver
	
	   function sendCloseTractorbookingSendEmailDriver($tempateID, $emailData = array(), $attachmentPath = null) {
        (isset($emailData ['receiver_email'])) ? $receiverEmail = $emailData ['receiver_email'] : $receiverEmail = NULL;
		(isset($emailData ['DRIVER_NAME'])) ? $driver_name = $emailData ['DRIVER_NAME'] : $driver_name = NULL;
		(isset($emailData ['booking_id'])) ? $booking_id = $emailData ['booking_id'] : $booking_id = NULL;
        
        
		    $heading="Tractor booking closed sucessfully ";
		$details="One booking closed sucessfully !
						booking id # ".$booking_id. " ";


        $siteLink = 'http://' . $_SERVER ['HTTP_HOST'];
        $this->SiteSetting = ClassRegistry::init('SiteSetting');
        $siteName = "TractoMandi Team";
        $loginLink = $siteLink . "/users/login";
        $loginLinkName = 'Login';

        $this->SiteSetting = ClassRegistry::init('SiteSetting');
       
        $senderEmail = $this->SiteSetting->getSettingValue('site_email');
		 
		 $find = array(
					'[HEADING]',
					'[NAME]',
					'[DETAILS]',
					'[REGARDS]'
				);

				$replace = array(
				$heading,
				$driver_name,
				$details,
				$siteName
					
				);

       

        $tempatedata = ClassRegistry::init('EmailTemplate')->getTempateData($tempateID);
        $emailSubject = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['subject']);
        $emailContent = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['content']);

        if ($this->sendMailContent($receiverEmail, $senderEmail, $emailSubject,$emailContent)) {
            return 1;
        } else {
            return 0;
        }
    }
		/*****************************************************************************/
	
	   function sendDriverAssignEmail($tempateID, $emailData = array(), $attachmentPath = null) {
			(isset($emailData ['receiver_email'])) ? $receiverEmail = $emailData ['receiver_email'] : $receiverEmail = NULL;
			(isset($emailData ['DRIVER_NAME'])) ? $driver_name = $emailData ['DRIVER_NAME'] : $driver_name = NULL;
			//customer
			(isset($emailData ['NAME'])) ? $cust_name = $emailData ['NAME'] : $cust_name = NULL;
			(isset($emailData ['EMAIL'])) ? $cust_email = $emailData ['EMAIL'] : $cust_email = NULL;
			(isset($emailData ['MOBILE'])) ? $cust_mobile = $emailData ['MOBILE'] : $cust_mobile = NULL;
			(isset($emailData ['CUST_VILLAGE'])) ? $cust_village = $emailData ['CUST_VILLAGE'] : $cust_village = NULL;
			(isset($emailData ['CUST_TALUKA'])) ? $cust_taluka = $emailData ['CUST_TALUKA'] : $cust_taluka = NULL;
			(isset($emailData ['CUST_CITY'])) ? $cust_city = $emailData ['CUST_CITY'] : $cust_city = NULL;
			(isset($emailData ['CUST_STATE'])) ? $cust_state = $emailData ['CUST_STATE'] : $cust_state = NULL;
			(isset($emailData ['CUST_ADDRESS'])) ? $cust_address = $emailData ['CUST_ADDRESS'] : $cust_address = NULL;
			//owner
			(isset($emailData ['OWNER_NAME'])) ? $owner_name = $emailData ['OWNER_NAME'] : $owner_name = NULL;
			(isset($emailData ['OWNER_EMAIL'])) ? $owner_email = $emailData ['OWNER_EMAIL'] : $owner_email = NULL;
			(isset($emailData ['OWNER_MOBILE'])) ? $owner_mob = $emailData ['OWNER_MOBILE'] : $owner_mob = NULL;
			(isset($emailData ['OWNER_VILLAGE'])) ? $owner_village = $emailData ['OWNER_VILLAGE'] : $owner_village = NULL;
			(isset($emailData ['OWNER_TALUKA'])) ? $owner_taluka = $emailData ['OWNER_TALUKA'] : $owner_taluka = NULL;
			(isset($emailData ['OWNER_CITY'])) ? $owner_city = $emailData ['OWNER_CITY'] : $owner_city = NULL;
			(isset($emailData ['OWNER_STATE'])) ? $owner_state = $emailData ['OWNER_STATE'] : $owner_state = NULL;
			(isset($emailData ['OWNER_ADDRESS'])) ? $owner_address = $emailData ['OWNER_ADDRESS'] : $owner_address = NULL;
			//Tractor details
			(isset($emailData ['TRACTOR_REGNO'])) ? $tractor_regNo = $emailData ['TRACTOR_REGNO'] : $tractor_regNo = NULL;
			(isset($emailData ['TRACTOR_BRAND'])) ? $tractor_brand = $emailData ['TRACTOR_BRAND'] : $tractor_brand = NULL;
			(isset($emailData ['TRACTOR_DESC'])) ? $tractor_desc = $emailData ['TRACTOR_DESC'] : $tractor_desc = NULL;
			(isset($emailData ['TRACTOR_TYPE'])) ? $tractor_type = $emailData ['TRACTOR_TYPE'] : $tractor_type = NULL;
			(isset($emailData ['TRACTOR_MAKE'])) ? $tractor_make = $emailData ['TRACTOR_MAKE'] : $tractor_make = NULL;
			(isset($emailData ['TRACTOR_MODEL'])) ? $tractor_model = $emailData ['TRACTOR_MODEL'] : $tractor_model = NULL;
			(isset($emailData ['TRACTOR_COLOR'])) ? $tractor_color = $emailData ['TRACTOR_COLOR'] : $tractor_color = NULL;
			(isset($emailData ['TRACTOR_IMPLE'])) ? $tractor_implement = $emailData ['TRACTOR_IMPLE'] : $tractor_implement = NULL;
			(isset($emailData ['TRACTOR_HORSE'])) ? $tractor_hrp = $emailData ['TRACTOR_HORSE'] : $tractor_hrp = NULL;
			//Booking Details
			(isset($emailData ['BOOKED_FOR'])) ? $booking_date = $emailData ['BOOKED_FOR'] : $booking_date = NULL;
			(isset($emailData ['USAGE_TIME'])) ? $tractor_time = $emailData ['USAGE_TIME'] : $tractor_time = NULL;
			(isset($emailData ['IMPLEMENT'])) ? $tractor_work = $emailData ['IMPLEMENT'] : $tractor_work = NULL;
			(isset($emailData ['DESC'])) ? $tractor_BookingDesc = $emailData ['DESC'] : $tractor_BookingDesc = NULL;
			(isset($emailData ['WORK_ADDRESS'])) ? $tractor_work_address = $emailData ['DESC'] : $tractor_work_address = NULL;
			
		$tagLine='Congrats! New booking assigned to you.';
		$details='Dear '.$driver_name.',<br>You are appointed as a driver for a tractor . Details about tractor,applicant,and owner is given below :';

	     $siteLink = 'http://' . $_SERVER ['HTTP_HOST'];
        $this->SiteSetting = ClassRegistry::init('SiteSetting');
        $siteName = "TractoMandi Team";
        $loginLink = $siteLink . "/users/login";
        $loginLinkName = 'Login';

        $this->SiteSetting = ClassRegistry::init('SiteSetting');
      
        $senderEmail = $this->SiteSetting->getSettingValue('site_email');
		 
		 $find = array(
					'[TAGLINE]',
					'[DETAILS]',					
					'[DRIVER_NAME]',
					'[NAME]',
					'[EMAIL]',
					'[MOBILE]',
					'[CUST_VILLAGE]',
					'[CUST_TALUKA]',
					'[CUST_CITY]',
					'[CUST_STATE]',
					'[CUST_ADDRESS]',
					//owner
					'[OWNER_NAME]',
					'[OWNER_EMAIL]',
					'[OWNER_MOBILE]',
					'[OWNER_VILLAGE]',
					'[OWNER_TALUKA]',
					'[OWNER_CITY]',
					'[OWNER_STATE]',
					'[OWNER_ADDRESS]',
					/*Tractor details*/
					'[TRACTOR_REGNO]',
					'[TRACTOR_BRAND]',
					'[TRACTOR_DESC]',
					'[TRACTOR_TYPE]',
					'[TRACTOR_MAKE]',
					'[TRACTOR_MODEL]',
					'[TRACTOR_COLOR]',
					'[TRACTOR_IMPLE]',
					'[TRACTOR_HORSE]',
					/*booking details*/
					'[BOOKED_FOR]',
					'[USAGE_TIME]',
					'[IMPLEMENT]',
					'[DESC]',
					'[REGARDS]',
					'[WORK_ADD]'
				);

				$replace = array(
				$tagLine,
				$details,
				$driver_name,
				$cust_name,
				$cust_email,
				$cust_mobile,
				$cust_village,
				$cust_taluka,
				$cust_city,
				$cust_state,
				$cust_address,
				//owner
				$owner_name,
				$owner_email,
				$owner_mob,
				$owner_village,
				$owner_taluka,
				$owner_city,
				$owner_state,
				$owner_address,
				/*Tractor details*/
				$tractor_regNo,
				$tractor_brand,
				$tractor_desc,
				$tractor_type,
				$tractor_make,
				$tractor_model,
				$tractor_color,
				$tractor_implement,
				$tractor_hrp,
				/*booking details*/
				$booking_date,
				$tractor_time,
				$tractor_work,
				$tractor_BookingDesc,
				$siteName	,
				$tractor_work_address
				);

       

       
        $tempatedata = ClassRegistry::init('EmailTemplate')->getTempateData($tempateID);
        $emailSubject = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['subject']);
        $emailContent = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['content']);

        if ($this->sendMailContent($receiverEmail, $senderEmail, $emailSubject,$emailContent)) {
            return 1;
        } else {
            return 0;
        }
    }
	/*****************************************************************************/
	
	   function sendDriverAssignEmailAdmin($tempateID, $emailData = array(), $attachmentPath = null) {
			(isset($emailData ['admin_email'])) ? $receiverEmail = $emailData ['admin_email'] : $receiverEmail = NULL;
			//$receiverEmail=DEFAULT_EMAIL_ADDRESS;
			(isset($emailData ['DRIVER_NAME'])) ? $driver_name = $emailData ['DRIVER_NAME'] : $driver_name = NULL;
			//customer
			(isset($emailData ['NAME'])) ? $cust_name = $emailData ['NAME'] : $cust_name = NULL;
			(isset($emailData ['EMAIL'])) ? $cust_email = $emailData ['EMAIL'] : $cust_email = NULL;
			(isset($emailData ['MOBILE'])) ? $cust_mobile = $emailData ['MOBILE'] : $cust_mobile = NULL;
			(isset($emailData ['CUST_VILLAGE'])) ? $cust_village = $emailData ['CUST_VILLAGE'] : $cust_village = NULL;
			(isset($emailData ['CUST_TALUKA'])) ? $cust_taluka = $emailData ['CUST_TALUKA'] : $cust_taluka = NULL;
			(isset($emailData ['CUST_CITY'])) ? $cust_city = $emailData ['CUST_CITY'] : $cust_city = NULL;
			(isset($emailData ['CUST_STATE'])) ? $cust_state = $emailData ['CUST_STATE'] : $cust_state = NULL;
			(isset($emailData ['CUST_ADDRESS'])) ? $cust_address = $emailData ['CUST_ADDRESS'] : $cust_address = NULL;
			//owner
			(isset($emailData ['OWNER_NAME'])) ? $owner_name = $emailData ['OWNER_NAME'] : $owner_name = NULL;
			(isset($emailData ['OWNER_EMAIL'])) ? $owner_email = $emailData ['OWNER_EMAIL'] : $owner_email = NULL;
			(isset($emailData ['OWNER_MOBILE'])) ? $owner_mob = $emailData ['OWNER_MOBILE'] : $owner_mob = NULL;
			(isset($emailData ['OWNER_VILLAGE'])) ? $owner_village = $emailData ['OWNER_VILLAGE'] : $owner_village = NULL;
			(isset($emailData ['OWNER_TALUKA'])) ? $owner_taluka = $emailData ['OWNER_TALUKA'] : $owner_taluka = NULL;
			(isset($emailData ['OWNER_CITY'])) ? $owner_city = $emailData ['OWNER_CITY'] : $owner_city = NULL;
			(isset($emailData ['OWNER_STATE'])) ? $owner_state = $emailData ['OWNER_STATE'] : $owner_state = NULL;
			(isset($emailData ['OWNER_ADDRESS'])) ? $owner_address = $emailData ['OWNER_ADDRESS'] : $owner_address = NULL;
			//Tractor details
			(isset($emailData ['TRACTOR_REGNO'])) ? $tractor_regNo = $emailData ['TRACTOR_REGNO'] : $tractor_regNo = NULL;
			(isset($emailData ['TRACTOR_BRAND'])) ? $tractor_brand = $emailData ['TRACTOR_BRAND'] : $tractor_brand = NULL;
			(isset($emailData ['TRACTOR_DESC'])) ? $tractor_desc = $emailData ['TRACTOR_DESC'] : $tractor_desc = NULL;
			(isset($emailData ['TRACTOR_TYPE'])) ? $tractor_type = $emailData ['TRACTOR_TYPE'] : $tractor_type = NULL;
			(isset($emailData ['TRACTOR_MAKE'])) ? $tractor_make = $emailData ['TRACTOR_MAKE'] : $tractor_make = NULL;
			(isset($emailData ['TRACTOR_MODEL'])) ? $tractor_model = $emailData ['TRACTOR_MODEL'] : $tractor_model = NULL;
			(isset($emailData ['TRACTOR_COLOR'])) ? $tractor_color = $emailData ['TRACTOR_COLOR'] : $tractor_color = NULL;
			(isset($emailData ['TRACTOR_IMPLE'])) ? $tractor_implement = $emailData ['TRACTOR_IMPLE'] : $tractor_implement = NULL;
			(isset($emailData ['TRACTOR_HORSE'])) ? $tractor_hrp = $emailData ['TRACTOR_HORSE'] : $tractor_hrp = NULL;
			//Booking Details
			(isset($emailData ['BOOKED_FOR'])) ? $booking_date = $emailData ['BOOKED_FOR'] : $booking_date = NULL;
			(isset($emailData ['USAGE_TIME'])) ? $tractor_time = $emailData ['USAGE_TIME'] : $tractor_time = NULL;
			(isset($emailData ['IMPLEMENT'])) ? $tractor_work = $emailData ['IMPLEMENT'] : $tractor_work = NULL;
			(isset($emailData ['DESC'])) ? $tractor_BookingDesc = $emailData ['DESC'] : $tractor_BookingDesc = NULL;
			(isset($emailData ['WORK_ADDRESS'])) ? $tractor_work_address = $emailData ['DESC'] : $tractor_work_address = NULL;
			
		$tagLine='You have approved  '.$driver_name.' as driver';
		$details='Details about tractor,applicant,driver and owner is given below :';

	   $siteLink = 'http://' . $_SERVER ['HTTP_HOST'];
        $this->SiteSetting = ClassRegistry::init('SiteSetting');
      
        $loginLink = $siteLink . "/users/login";
        $loginLinkName = 'Login';

        $this->SiteSetting = ClassRegistry::init('SiteSetting');
       $siteName = "TractoMandi Team";
        $senderEmail = $this->SiteSetting->getSettingValue('site_email');
		 
		 $find = array(
					'[TAGLINE]',
					'[DETAILS]',					
					'[DRIVER_NAME]',
					'[NAME]',
					'[EMAIL]',
					'[MOBILE]',
					'[CUST_VILLAGE]',
					'[CUST_TALUKA]',
					'[CUST_CITY]',
					'[CUST_STATE]',
					'[CUST_ADDRESS]',
					//owner
					'[OWNER_NAME]',
					'[OWNER_EMAIL]',
					'[OWNER_MOBILE]',
					'[OWNER_VILLAGE]',
					'[OWNER_TALUKA]',
					'[OWNER_CITY]',
					'[OWNER_STATE]',
					'[OWNER_ADDRESS]',
					/*Tractor details*/
					'[TRACTOR_REGNO]',
					'[TRACTOR_BRAND]',
					'[TRACTOR_DESC]',
					'[TRACTOR_TYPE]',
					'[TRACTOR_MAKE]',
					'[TRACTOR_MODEL]',
					'[TRACTOR_COLOR]',
					'[TRACTOR_IMPLE]',
					'[TRACTOR_HORSE]',
					/*booking details*/
					'[BOOKED_FOR]',
					'[USAGE_TIME]',
					'[IMPLEMENT]',
					'[DESC]',
					'[REGARDS]',
					'[WORK_ADD]'
				);

				$replace = array(
				$tagLine,
				$details,
				$driver_name,
				$cust_name,
				$cust_email,
				$cust_mobile,
				$cust_village,
				$cust_taluka,
				$cust_city,
				$cust_state,
				$cust_address,
				//owner
				$owner_name,
				$owner_email,
				$owner_mob,
				$owner_village,
				$owner_taluka,
				$owner_city,
				$owner_state,
				$owner_address,
				/*Tractor details*/
				$tractor_regNo,
				$tractor_brand,
				$tractor_desc,
				$tractor_type,
				$tractor_make,
				$tractor_model,
				$tractor_color,
				$tractor_implement,
				$tractor_hrp,
				/*booking details*/
				$booking_date,
				$tractor_time,
				$tractor_work,
				$tractor_BookingDesc,
				$siteName	,
				$tractor_work_address
				);

       

       
        $tempatedata = ClassRegistry::init('EmailTemplate')->getTempateData($tempateID);
        $emailSubject = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['subject']);
        $emailContent = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['content']);

        if ($this->sendMailContent($receiverEmail,$senderEmail, $emailSubject,$emailContent)) {
            return 1;
        } else {
            return 0;
        }
    }

	/*****************************************************************************/

   function sendAssignmentCancleEmailAdmin($tempateID, $emailData = array(), $attachmentPath = null) {
        (isset($emailData ['receiver_email'])) ? $receiverEmail = $emailData ['receiver_email'] : $receiverEmail = NULL;
		(isset($emailData ['DRIVER_NAME'])) ? $driveName= $emailData ['DRIVER_NAME'] : $driveName = NULL;
			
	
	
        $name='Admin';
		$heading='Assignment Cancelled by '.$driveName  ;
		$details='I regret to inform you that your assignment cancelled for some problem ';

        $siteLink = 'http://' . $_SERVER ['HTTP_HOST'];
        $this->SiteSetting = ClassRegistry::init('SiteSetting');
        $siteName = "TractoMandi Team";
        $loginLink = $siteLink . "/tracto/users/login";
        $loginLinkName = 'Login';

        $this->SiteSetting = ClassRegistry::init('SiteSetting');
      
        $senderEmail = $this->SiteSetting->getSettingValue('site_email');

        $loginLink = $siteLink . "/tracto/users/login";
        $loginLinkName = 'Login';
		
        

      $find = array(
					'[HEADING]',
					'[NAME]',
					'[DETAILS]',
					'[REGARDS]'
				);

				$replace = array(
				$heading,
				$name,
				$details,
				$driveName
					
				);
            
       

        $tempatedata = ClassRegistry::init('EmailTemplate')->getTempateData($tempateID);
        $emailSubject = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['subject']);
        $emailContent = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['content']);

        if ($this->sendMailContent($receiverEmail, $senderEmail, $emailSubject,$emailContent)) {
            return 1;
        } else {
            return 0;
        }
    }
	
	/*****************************************************************************/

   function sendAssignmentCancleEmailDriver($tempateID, $emailData = array(), $attachmentPath = null) {
        (isset($emailData ['DRIVER_EMAIL'])) ? $receiverEmail = $emailData ['DRIVER_EMAIL'] : $receiverEmail = NULL;
		(isset($emailData ['DRIVER_NAME'])) ? $driveName= $emailData ['DRIVER_NAME'] : $driveName = NULL;
		
			
	
	
        //$name='Admin';
		$heading='Assignment cancelled by you'  ;
		$details='This is to inform you that one assignment cancelled by you. ';

        $siteLink = 'http://' . $_SERVER ['HTTP_HOST'];
        $this->SiteSetting = ClassRegistry::init('SiteSetting');
       
        $loginLink = $siteLink . "/tracto/users/login";
        $loginLinkName = 'Login';

        $this->SiteSetting = ClassRegistry::init('SiteSetting');
        $siteName = "TractoMandi Team";
        $senderEmail = $this->SiteSetting->getSettingValue('site_email');

        $loginLink = $siteLink . "/tracto/users/login";
        $loginLinkName = 'Login';
		
        

      $find = array(
					'[HEADING]',
					'[NAME]',
					'[DETAILS]',
					'[REGARDS]'
				);

				$replace = array(
				$heading,
				$driveName,
				$details,
				$siteName
					
				);
            
       

        $tempatedata = ClassRegistry::init('EmailTemplate')->getTempateData($tempateID);
        $emailSubject = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['subject']);
        $emailContent = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['content']);

        if ($this->sendMailContent($receiverEmail, $senderEmail, $emailSubject,$emailContent)) {
            return 1;
        } else {
            return 0;
        }
    }

	/*****************************************************************************/

   function sendRegistrationEmail($tempateID, $emailData = array(), $attachmentPath = null) {
        (isset($emailData ['receiver_email'])) ? $receiverEmail = $emailData ['receiver_email'] : $receiverEmail = NULL;
		(isset($emailData ['role_id'])) ? $role_id = $emailData ['role_id'] : $role_id = NULL;
		
        (isset($emailData ['NAME'])) ? $name = $emailData ['NAME'] : $name = NULL;
		(isset($emailData ['ROLE'])) ? $role = $emailData ['ROLE'] : $role = NULL;
		(isset($emailData ['USER'])) ? $userid = $emailData ['USER'] : $userid = NULL;
		(isset($emailData ['PASSWORD'])) ? $password = $emailData ['PASSWORD'] : $password = NULL;
	
        

        $siteLink = 'http://' . $_SERVER ['HTTP_HOST'];
        $this->SiteSetting = ClassRegistry::init('SiteSetting');
        $siteName = "TractoMandi Team";
        $loginLink = $siteLink . "/tracto/users/login/".$role_id;
        $loginLinkName = 'Login';

        $this->SiteSetting = ClassRegistry::init('SiteSetting');
     
        $senderEmail = $this->SiteSetting->getSettingValue('site_email');

		
        

        $find = array(
            '[NAME]',
            '[ROLE]',
            '[USER]',
            '[PASSWORD]',
			'[URL]',
			'[REGARDS]'
        );

        $replace = array(
		$name,
		$role,
		$userid,
		$password,
		$loginLink,
		$siteName
            
        );

        $tempatedata = ClassRegistry::init('EmailTemplate')->getTempateData($tempateID);
        $emailSubject = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['subject']);
        $emailContent = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['content']);

        if ($this->sendMailContent($receiverEmail, $senderEmail, $emailSubject,$emailContent)) {
            return 1;
        } else {
            return 0;
        }
    }
/*****************************************************************************/

   function sendRegistrationEmailAdmin($tempateID, $emailData = array(), $attachmentPath = null) {
        (isset($emailData ['admin_email'])) ? $receiverEmail = $emailData ['admin_email'] : $receiverEmail = NULL;
		
        (isset($emailData ['NAME'])) ? $name = $emailData ['NAME'] : $name = NULL;
		(isset($emailData ['ROLE'])) ? $role = $emailData ['ROLE'] : $role = NULL;
		(isset($emailData ['USER'])) ? $userid = $emailData ['USER'] : $userid = NULL;
	
	    (isset($emailData ['MOBILE'])) ? $mobile = $emailData ['MOBILE'] : $mobile = NULL;
		 (isset($emailData ['ADDRESS'])) ? $address = $emailData ['ADDRESS'] : $address = NULL;
	
        

        $siteLink = 'http://' . $_SERVER ['HTTP_HOST'];
        $this->SiteSetting = ClassRegistry::init('SiteSetting');
        $siteName = "TractoMandi Team";
        $loginLink = SITE_URL."/users/login";
        $loginLinkName = 'Login';

        $this->SiteSetting = ClassRegistry::init('SiteSetting');
      
        $senderEmail = $this->SiteSetting->getSettingValue('site_email');
        $loginLinkName = 'Login';
		
        

        $find = array(
            '[NAME]',
            '[ROLE]',
            '[USER]',
			'[EMAIL]',
            '[MOBILE]',
			'[ADDRESS]',
			'[REGARDS]'
        );

        $replace = array(
		$name,
		$role,
		$userid,
		$userid,
		$mobile,
		$address,
		$siteName
            
        );

        $tempatedata = ClassRegistry::init('EmailTemplate')->getTempateData($tempateID);
        $emailSubject = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['subject']);
        $emailContent = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['content']);

        if ($this->sendMailContent($receiverEmail, $senderEmail, $emailSubject,$emailContent)) {
            return 1;
        } else {
            return 0;
        }
    }

  
   function forgetPasswordEmail($tempateID, $emailData = array(), $attachmentPath = null) {
        (isset($emailData ['receiver_email'])) ? $receiverEmail = $emailData ['receiver_email'] : $receiverEmail = NULL;
        //(isset($emailData ['sender_email'])) ? $senderEmail = $emailData ['sender_email'] : $senderEmail = NULL;
		(isset($emailData ['NAME'])) ? $name = $emailData ['NAME'] : $name = NULL;
		(isset($emailData ['EMAIL'])) ? $email = $emailData ['EMAIL'] : $senderEmail = NULL;
		(isset($emailData ['PASSWORD'])) ? $password = $emailData ['PASSWORD'] : $password = NULL;
		//(isset($emailData ['LINK'])) ? $loginLink = $emailData ['LINK'] : $loginLink = NULL;
		//(isset($emailData ['ENQUIRY'])) ? $enquiry = $emailData ['ENQUIRY'] : $enquiry = NULL;
        

        $siteLink = 'http://' . $_SERVER ['HTTP_HOST'];
        $this->SiteSetting = ClassRegistry::init('SiteSetting');
        $siteName = "TractoMandi Team";
        $loginLink = $siteLink . "/testingserver/users/login";
        $loginLinkName = 'Login';
		$regrds="TractoMandi";

        $this->SiteSetting = ClassRegistry::init('SiteSetting');
     
        $senderEmail = $this->SiteSetting->getSettingValue('site_email');

     


        $find = array(
            '[NAME]',
            '[EMAIL]',
			'[PASSWORD]',
			'[LINK]',
			'[REGARDS]'
           
        );

        $replace = array(
		$name,
		$email,
		$password,
		$loginLink,
		$regrds
				
        );

        $tempatedata = ClassRegistry::init('EmailTemplate')->getTempateData($tempateID);
        $emailSubject = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['subject']);
        $emailContent = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['content']);

        if ($this->sendMailContent($receiverEmail, $senderEmail, $emailSubject,$emailContent)) {
            return 1;
        } else {
            return 0;
        }
    }
	
	/*****************************************************************************/
	
	   function sendDriverAssignAcceptEmailDriver($tempateID, $emailData = array(), $attachmentPath = null) {
		   (isset($emailData ['booking_id'])) ? $booking_id = $emailData ['booking_id'] : $booking_id = NULL;
			(isset($emailData ['receiver_email'])) ? $receiverEmail = $emailData ['receiver_email'] : $receiverEmail = NULL;
			(isset($emailData ['DRIVER_NAME'])) ? $driver_name = $emailData ['DRIVER_NAME'] : $driver_name = NULL;
			//customer
			(isset($emailData ['NAME'])) ? $cust_name = $emailData ['NAME'] : $cust_name = NULL;
			(isset($emailData ['EMAIL'])) ? $cust_email = $emailData ['EMAIL'] : $cust_email = NULL;
			(isset($emailData ['MOBILE'])) ? $cust_mobile = $emailData ['MOBILE'] : $cust_mobile = NULL;
			(isset($emailData ['CUST_VILLAGE'])) ? $cust_village = $emailData ['CUST_VILLAGE'] : $cust_village = NULL;
			(isset($emailData ['CUST_TALUKA'])) ? $cust_taluka = $emailData ['CUST_TALUKA'] : $cust_taluka = NULL;
			(isset($emailData ['CUST_CITY'])) ? $cust_city = $emailData ['CUST_CITY'] : $cust_city = NULL;
			(isset($emailData ['CUST_STATE'])) ? $cust_state = $emailData ['CUST_STATE'] : $cust_state = NULL;
			(isset($emailData ['CUST_ADDRESS'])) ? $cust_address = $emailData ['CUST_ADDRESS'] : $cust_address = NULL;
			//owner
			(isset($emailData ['OWNER_NAME'])) ? $owner_name = $emailData ['OWNER_NAME'] : $owner_name = NULL;
			(isset($emailData ['OWNER_EMAIL'])) ? $owner_email = $emailData ['OWNER_EMAIL'] : $owner_email = NULL;
			(isset($emailData ['OWNER_MOBILE'])) ? $owner_mob = $emailData ['OWNER_MOBILE'] : $owner_mob = NULL;
			(isset($emailData ['OWNER_VILLAGE'])) ? $owner_village = $emailData ['OWNER_VILLAGE'] : $owner_village = NULL;
			(isset($emailData ['OWNER_TALUKA'])) ? $owner_taluka = $emailData ['OWNER_TALUKA'] : $owner_taluka = NULL;
			(isset($emailData ['OWNER_CITY'])) ? $owner_city = $emailData ['OWNER_CITY'] : $owner_city = NULL;
			(isset($emailData ['OWNER_STATE'])) ? $owner_state = $emailData ['OWNER_STATE'] : $owner_state = NULL;
			(isset($emailData ['OWNER_ADDRESS'])) ? $owner_address = $emailData ['OWNER_ADDRESS'] : $owner_address = NULL;
			//Tractor details
			(isset($emailData ['TRACTOR_REGNO'])) ? $tractor_regNo = $emailData ['TRACTOR_REGNO'] : $tractor_regNo = NULL;
			(isset($emailData ['TRACTOR_BRAND'])) ? $tractor_brand = $emailData ['TRACTOR_BRAND'] : $tractor_brand = NULL;
			(isset($emailData ['TRACTOR_DESC'])) ? $tractor_desc = $emailData ['TRACTOR_DESC'] : $tractor_desc = NULL;
			(isset($emailData ['TRACTOR_TYPE'])) ? $tractor_type = $emailData ['TRACTOR_TYPE'] : $tractor_type = NULL;
			(isset($emailData ['TRACTOR_MAKE'])) ? $tractor_make = $emailData ['TRACTOR_MAKE'] : $tractor_make = NULL;
			(isset($emailData ['TRACTOR_MODEL'])) ? $tractor_model = $emailData ['TRACTOR_MODEL'] : $tractor_model = NULL;
			(isset($emailData ['TRACTOR_COLOR'])) ? $tractor_color = $emailData ['TRACTOR_COLOR'] : $tractor_color = NULL;
			(isset($emailData ['TRACTOR_IMPLE'])) ? $tractor_implement = $emailData ['TRACTOR_IMPLE'] : $tractor_implement = NULL;
			(isset($emailData ['TRACTOR_HORSE'])) ? $tractor_hrp = $emailData ['TRACTOR_HORSE'] : $tractor_hrp = NULL;
			//Booking Details
			(isset($emailData ['BOOKED_FOR'])) ? $booking_date = $emailData ['BOOKED_FOR'] : $booking_date = NULL;
			(isset($emailData ['USAGE_TIME'])) ? $tractor_time = $emailData ['USAGE_TIME'] : $tractor_time = NULL;
			(isset($emailData ['IMPLEMENT'])) ? $tractor_work = $emailData ['IMPLEMENT'] : $tractor_work = NULL;
			(isset($emailData ['DESC'])) ? $tractor_BookingDesc = $emailData ['DESC'] : $tractor_BookingDesc = NULL;
			(isset($emailData ['WORK_ADDRESS'])) ? $tractor_work_address = $emailData ['DESC'] : $tractor_work_address = NULL;
		$tagLine='Booking acceptance';
		$details='Dear '.$driver_name.',<br>You are accept a booking Id #'.$booking_id.' on date ' .$booking_date. ' Details about tractor,applicant,and tractor owner is given below :';

	     $siteLink = 'http://' . $_SERVER ['HTTP_HOST'];
        $this->SiteSetting = ClassRegistry::init('SiteSetting');
        $siteName = "TractoMandi Team";
        $loginLink = $siteLink . "/users/login";
        $loginLinkName = 'Login';

        $this->SiteSetting = ClassRegistry::init('SiteSetting');
       
        $senderEmail = $this->SiteSetting->getSettingValue('site_email');
		 
		 $find = array(
					'[TAGLINE]',
					'[DETAILS]',					
					'[DRIVER_NAME]',
					'[NAME]',
					'[EMAIL]',
					'[MOBILE]',
					'[CUST_VILLAGE]',
					'[CUST_TALUKA]',
					'[CUST_CITY]',
					'[CUST_STATE]',
					'[CUST_ADDRESS]',
					//owner
					'[OWNER_NAME]',
					'[OWNER_EMAIL]',
					'[OWNER_MOBILE]',
					'[OWNER_VILLAGE]',
					'[OWNER_TALUKA]',
					'[OWNER_CITY]',
					'[OWNER_STATE]',
					'[OWNER_ADDRESS]',
					/*Tractor details*/
					'[TRACTOR_REGNO]',
					'[TRACTOR_BRAND]',
					'[TRACTOR_DESC]',
					'[TRACTOR_TYPE]',
					'[TRACTOR_MAKE]',
					'[TRACTOR_MODEL]',
					'[TRACTOR_COLOR]',
					'[TRACTOR_IMPLE]',
					'[TRACTOR_HORSE]',
					/*booking details*/
					'[BOOKED_FOR]',
					'[USAGE_TIME]',
					'[IMPLEMENT]',
					'[DESC]',
					'[REGARDS]',
					'[WORK_ADD]'
				);

				$replace = array(
				$tagLine,
				$details,
				$driver_name,
				$cust_name,
				$cust_email,
				$cust_mobile,
				$cust_village,
				$cust_taluka,
				$cust_city,
				$cust_state,
				$cust_address,
				//owner
				$owner_name,
				$owner_email,
				$owner_mob,
				$owner_village,
				$owner_taluka,
				$owner_city,
				$owner_state,
				$owner_address,
				/*Tractor details*/
				$tractor_regNo,
				$tractor_brand,
				$tractor_desc,
				$tractor_type,
				$tractor_make,
				$tractor_model,
				$tractor_color,
				$tractor_implement,
				$tractor_hrp,
				/*booking details*/
				$booking_date,
				$tractor_time,
				$tractor_work,
				$tractor_BookingDesc,
				$siteName,
				$tractor_work_address				
				);

       

       
        $tempatedata = ClassRegistry::init('EmailTemplate')->getTempateData($tempateID);
        $emailSubject = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['subject']);
        $emailContent = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['content']);

        if ($this->sendMailContent($receiverEmail, $senderEmail, $emailSubject,$emailContent)) {
            return 1;
        } else {
            return 0;
        }
    }
	
	/*****************************************************************************/
	
	   function sendDriverAssignAcceptEmailAdmin($tempateID, $emailData = array(), $attachmentPath = null) {
		   (isset($emailData ['booking_id'])) ? $booking_id = $emailData ['booking_id'] : $booking_id = NULL;
			(isset($emailData ['admin_email'])) ? $receiverEmail = $emailData ['admin_email'] : $receiverEmail = NULL;
			(isset($emailData ['DRIVER_NAME'])) ? $driver_name = $emailData ['DRIVER_NAME'] : $driver_name = NULL;
			//Driver
			(isset($emailData ['DRIVER_EMAIL'])) ? $driver_email = $emailData ['DRIVER_EMAIL'] : $driver_email = NULL;
			(isset($emailData ['DRIVER_MOBILE'])) ? $driver_mobile = $emailData ['DRIVER_MOBILE'] : $driver_mobile = NULL;
			(isset($emailData ['DRIVER_VILLAGE'])) ? $driver_village = $emailData ['DRIVER_VILLAGE'] : $driver_village = NULL;
			(isset($emailData ['DRIVER_TALUKA'])) ? $driver_taluka = $emailData ['DRIVER_TALUKA'] : $driver_taluka = NULL;
			(isset($emailData ['DRIVER_CITY'])) ? $driver_city = $emailData ['DRIVER_CITY'] : $driver_city = NULL;
			(isset($emailData ['DRIVER_STATE'])) ? $driver_state = $emailData ['DRIVER_STATE'] : $driver_state = NULL;
			(isset($emailData ['DRIVER_ADDRESS'])) ? $driver_address = $emailData ['DRIVER_ADDRESS'] : $driver_address = NULL;
			
			//customer
			(isset($emailData ['NAME'])) ? $cust_name = $emailData ['NAME'] : $cust_name = NULL;
			(isset($emailData ['EMAIL'])) ? $cust_email = $emailData ['EMAIL'] : $cust_email = NULL;
			(isset($emailData ['MOBILE'])) ? $cust_mobile = $emailData ['MOBILE'] : $cust_mobile = NULL;
			(isset($emailData ['CUST_VILLAGE'])) ? $cust_village = $emailData ['CUST_VILLAGE'] : $cust_village = NULL;
			(isset($emailData ['CUST_TALUKA'])) ? $cust_taluka = $emailData ['CUST_TALUKA'] : $cust_taluka = NULL;
			(isset($emailData ['CUST_CITY'])) ? $cust_city = $emailData ['CUST_CITY'] : $cust_city = NULL;
			(isset($emailData ['CUST_STATE'])) ? $cust_state = $emailData ['CUST_STATE'] : $cust_state = NULL;
			(isset($emailData ['CUST_ADDRESS'])) ? $cust_address = $emailData ['CUST_ADDRESS'] : $cust_address = NULL;
			//owner
			(isset($emailData ['OWNER_NAME'])) ? $owner_name = $emailData ['OWNER_NAME'] : $owner_name = NULL;
			(isset($emailData ['OWNER_EMAIL'])) ? $owner_email = $emailData ['OWNER_EMAIL'] : $owner_email = NULL;
			(isset($emailData ['OWNER_MOBILE'])) ? $owner_mob = $emailData ['OWNER_MOBILE'] : $owner_mob = NULL;
			(isset($emailData ['OWNER_VILLAGE'])) ? $owner_village = $emailData ['OWNER_VILLAGE'] : $owner_village = NULL;
			(isset($emailData ['OWNER_TALUKA'])) ? $owner_taluka = $emailData ['OWNER_TALUKA'] : $owner_taluka = NULL;
			(isset($emailData ['OWNER_CITY'])) ? $owner_city = $emailData ['OWNER_CITY'] : $owner_city = NULL;
			(isset($emailData ['OWNER_STATE'])) ? $owner_state = $emailData ['OWNER_STATE'] : $owner_state = NULL;
			(isset($emailData ['OWNER_ADDRESS'])) ? $owner_address = $emailData ['OWNER_ADDRESS'] : $owner_address = NULL;
			//Tractor details
			(isset($emailData ['TRACTOR_REGNO'])) ? $tractor_regNo = $emailData ['TRACTOR_REGNO'] : $tractor_regNo = NULL;
			(isset($emailData ['TRACTOR_BRAND'])) ? $tractor_brand = $emailData ['TRACTOR_BRAND'] : $tractor_brand = NULL;
			(isset($emailData ['TRACTOR_DESC'])) ? $tractor_desc = $emailData ['TRACTOR_DESC'] : $tractor_desc = NULL;
			(isset($emailData ['TRACTOR_TYPE'])) ? $tractor_type = $emailData ['TRACTOR_TYPE'] : $tractor_type = NULL;
			(isset($emailData ['TRACTOR_MAKE'])) ? $tractor_make = $emailData ['TRACTOR_MAKE'] : $tractor_make = NULL;
			(isset($emailData ['TRACTOR_MODEL'])) ? $tractor_model = $emailData ['TRACTOR_MODEL'] : $tractor_model = NULL;
			(isset($emailData ['TRACTOR_COLOR'])) ? $tractor_color = $emailData ['TRACTOR_COLOR'] : $tractor_color = NULL;
			(isset($emailData ['TRACTOR_IMPLE'])) ? $tractor_implement = $emailData ['TRACTOR_IMPLE'] : $tractor_implement = NULL;
			(isset($emailData ['TRACTOR_HORSE'])) ? $tractor_hrp = $emailData ['TRACTOR_HORSE'] : $tractor_hrp = NULL;
			//Booking Details
			(isset($emailData ['BOOKED_FOR'])) ? $booking_date = $emailData ['BOOKED_FOR'] : $booking_date = NULL;
			(isset($emailData ['USAGE_TIME'])) ? $tractor_time = $emailData ['USAGE_TIME'] : $tractor_time = NULL;
			(isset($emailData ['IMPLEMENT'])) ? $tractor_work = $emailData ['IMPLEMENT'] : $tractor_work = NULL;
			(isset($emailData ['DESC'])) ? $tractor_BookingDesc = $emailData ['DESC'] : $tractor_BookingDesc = NULL;
			(isset($emailData ['WORK_ADDRESS'])) ? $tractor_work_address = $emailData ['DESC'] : $tractor_work_address = NULL;
		$tagLine='Driver Assign Accept';
		$details='Hello Admin,<br>Driver assign accpted by '.$driver_name.' booking Id #'.$booking_id.' Details about tractor,applicant,and tractor owner and driver is given below :';

	     $siteLink = 'http://' . $_SERVER ['HTTP_HOST'];
        $this->SiteSetting = ClassRegistry::init('SiteSetting');
        $siteName = "TractoMandi Team";
        $loginLink = $siteLink . "/users/login";
        $loginLinkName = 'Login';

        $this->SiteSetting = ClassRegistry::init('SiteSetting');
       
        $senderEmail = $this->SiteSetting->getSettingValue('site_email');
		 
		 $find = array(
					'[TAGLINE]',
					'[DETAILS]',					
					//Driver
					'[DRIVER_NAME]',
					'[DRIVER_EMAIL]',
					'[DRIVER_MOBILE]',
					'[DRIVER_VILLAGE]',
					'[DRIVER_TALUKA]',
					'[DRIVER_CITY]',
					'[DRIVER_STATE]',
					'[DRIVER_ADDRESS]',
					
					//Customer
					'[NAME]',
					'[EMAIL]',
					'[MOBILE]',
					'[CUST_VILLAGE]',
					'[CUST_TALUKA]',
					'[CUST_CITY]',
					'[CUST_STATE]',
					'[CUST_ADDRESS]',
					//owner
					'[OWNER_NAME]',
					'[OWNER_EMAIL]',
					'[OWNER_MOBILE]',
					'[OWNER_VILLAGE]',
					'[OWNER_TALUKA]',
					'[OWNER_CITY]',
					'[OWNER_STATE]',
					'[OWNER_ADDRESS]',
					/*Tractor details*/
					'[TRACTOR_REGNO]',
					'[TRACTOR_BRAND]',
					'[TRACTOR_DESC]',
					'[TRACTOR_TYPE]',
					'[TRACTOR_MAKE]',
					'[TRACTOR_MODEL]',
					'[TRACTOR_COLOR]',
					'[TRACTOR_IMPLE]',
					'[TRACTOR_HORSE]',
					/*booking details*/
					'[BOOKED_FOR]',
					'[USAGE_TIME]',
					'[IMPLEMENT]',
					'[DESC]',
					'[REGARDS]',
					'[WORK_ADD]'
				);

				$replace = array(
				$tagLine,
				$details,
				//Driver
				 $driver_name,
				 $driver_email,
				 $driver_mobile,
				 $driver_village,
				 $driver_taluka,
				 $driver_city,
				 $driver_state,
				 $driver_address,			
				//Customer
				$cust_name,
				$cust_email,
				$cust_mobile,
				$cust_village,
				$cust_taluka,
				$cust_city,
				$cust_state,
				$cust_address,
				//owner
				$owner_name,
				$owner_email,
				$owner_mob,
				$owner_village,
				$owner_taluka,
				$owner_city,
				$owner_state,
				$owner_address,
				/*Tractor details*/
				$tractor_regNo,
				$tractor_brand,
				$tractor_desc,
				$tractor_type,
				$tractor_make,
				$tractor_model,
				$tractor_color,
				$tractor_implement,
				$tractor_hrp,
				/*booking details*/
				$booking_date,
				$tractor_time,
				$tractor_work,
				$tractor_BookingDesc,
				$siteName,
				$tractor_work_address		
				);

       

       
        $tempatedata = ClassRegistry::init('EmailTemplate')->getTempateData($tempateID);
        $emailSubject = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['subject']);
        $emailContent = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['content']);

        if ($this->sendMailContent($receiverEmail, $senderEmail, $emailSubject,$emailContent)) {
            return 1;
        } else {
            return 0;
        }
    }
		/*****************************************************************************/
	
	   function sendDriverAssignAcceptEmailOwner($tempateID, $emailData = array(), $attachmentPath = null) {
		   (isset($emailData ['booking_id'])) ? $booking_id = $emailData ['booking_id'] : $booking_id = NULL;
			(isset($emailData ['OWNER_EMAIL'])) ? $receiverEmail = $emailData ['OWNER_EMAIL'] : $receiverEmail = NULL;
			(isset($emailData ['DRIVER_NAME'])) ? $driver_name = $emailData ['DRIVER_NAME'] : $driver_name = NULL;
			//Driver
			(isset($emailData ['DRIVER_EMAIL'])) ? $driver_email = $emailData ['DRIVER_EMAIL'] : $driver_email = NULL;
			(isset($emailData ['DRIVER_MOBILE'])) ? $driver_mobile = $emailData ['DRIVER_MOBILE'] : $driver_mobile = NULL;
			(isset($emailData ['DRIVER_VILLAGE'])) ? $driver_village = $emailData ['DRIVER_VILLAGE'] : $driver_village = NULL;
			(isset($emailData ['DRIVER_TALUKA'])) ? $driver_taluka = $emailData ['DRIVER_TALUKA'] : $driver_taluka = NULL;
			(isset($emailData ['DRIVER_CITY'])) ? $driver_city = $emailData ['DRIVER_CITY'] : $driver_city = NULL;
			(isset($emailData ['DRIVER_STATE'])) ? $driver_state = $emailData ['DRIVER_STATE'] : $driver_state = NULL;
			(isset($emailData ['DRIVER_ADDRESS'])) ? $driver_address = $emailData ['DRIVER_ADDRESS'] : $driver_address = NULL;
			
			//customer
			(isset($emailData ['NAME'])) ? $cust_name = $emailData ['NAME'] : $cust_name = NULL;
			(isset($emailData ['EMAIL'])) ? $cust_email = $emailData ['EMAIL'] : $cust_email = NULL;
			(isset($emailData ['MOBILE'])) ? $cust_mobile = $emailData ['MOBILE'] : $cust_mobile = NULL;
			(isset($emailData ['CUST_VILLAGE'])) ? $cust_village = $emailData ['CUST_VILLAGE'] : $cust_village = NULL;
			(isset($emailData ['CUST_TALUKA'])) ? $cust_taluka = $emailData ['CUST_TALUKA'] : $cust_taluka = NULL;
			(isset($emailData ['CUST_CITY'])) ? $cust_city = $emailData ['CUST_CITY'] : $cust_city = NULL;
			(isset($emailData ['CUST_STATE'])) ? $cust_state = $emailData ['CUST_STATE'] : $cust_state = NULL;
			(isset($emailData ['CUST_ADDRESS'])) ? $cust_address = $emailData ['CUST_ADDRESS'] : $cust_address = NULL;
			//owner
			(isset($emailData ['OWNER_NAME'])) ? $owner_name = $emailData ['OWNER_NAME'] : $owner_name = NULL;
			(isset($emailData ['OWNER_EMAIL'])) ? $owner_email = $emailData ['OWNER_EMAIL'] : $owner_email = NULL;
			(isset($emailData ['OWNER_MOBILE'])) ? $owner_mob = $emailData ['OWNER_MOBILE'] : $owner_mob = NULL;
			(isset($emailData ['OWNER_VILLAGE'])) ? $owner_village = $emailData ['OWNER_VILLAGE'] : $owner_village = NULL;
			(isset($emailData ['OWNER_TALUKA'])) ? $owner_taluka = $emailData ['OWNER_TALUKA'] : $owner_taluka = NULL;
			(isset($emailData ['OWNER_CITY'])) ? $owner_city = $emailData ['OWNER_CITY'] : $owner_city = NULL;
			(isset($emailData ['OWNER_STATE'])) ? $owner_state = $emailData ['OWNER_STATE'] : $owner_state = NULL;
			(isset($emailData ['OWNER_ADDRESS'])) ? $owner_address = $emailData ['OWNER_ADDRESS'] : $owner_address = NULL;
			//Tractor details
			(isset($emailData ['TRACTOR_REGNO'])) ? $tractor_regNo = $emailData ['TRACTOR_REGNO'] : $tractor_regNo = NULL;
			(isset($emailData ['TRACTOR_BRAND'])) ? $tractor_brand = $emailData ['TRACTOR_BRAND'] : $tractor_brand = NULL;
			(isset($emailData ['TRACTOR_DESC'])) ? $tractor_desc = $emailData ['TRACTOR_DESC'] : $tractor_desc = NULL;
			(isset($emailData ['TRACTOR_TYPE'])) ? $tractor_type = $emailData ['TRACTOR_TYPE'] : $tractor_type = NULL;
			(isset($emailData ['TRACTOR_MAKE'])) ? $tractor_make = $emailData ['TRACTOR_MAKE'] : $tractor_make = NULL;
			(isset($emailData ['TRACTOR_MODEL'])) ? $tractor_model = $emailData ['TRACTOR_MODEL'] : $tractor_model = NULL;
			(isset($emailData ['TRACTOR_COLOR'])) ? $tractor_color = $emailData ['TRACTOR_COLOR'] : $tractor_color = NULL;
			(isset($emailData ['TRACTOR_IMPLE'])) ? $tractor_implement = $emailData ['TRACTOR_IMPLE'] : $tractor_implement = NULL;
			(isset($emailData ['TRACTOR_HORSE'])) ? $tractor_hrp = $emailData ['TRACTOR_HORSE'] : $tractor_hrp = NULL;
			//Booking Details
			(isset($emailData ['BOOKED_FOR'])) ? $booking_date = $emailData ['BOOKED_FOR'] : $booking_date = NULL;
			(isset($emailData ['USAGE_TIME'])) ? $tractor_time = $emailData ['USAGE_TIME'] : $tractor_time = NULL;
			(isset($emailData ['IMPLEMENT'])) ? $tractor_work = $emailData ['IMPLEMENT'] : $tractor_work = NULL;
			(isset($emailData ['DESC'])) ? $tractor_BookingDesc = $emailData ['DESC'] : $tractor_BookingDesc = NULL;
			(isset($emailData ['WORK_ADDRESS'])) ? $tractor_work_address = $emailData ['DESC'] : $tractor_work_address = NULL;
		$tagLine='Tractor bookig approved';
		$details='Hello '.$owner_name.',<br>Your tractor booked sucessfully on date '.$booking_date.' Id #'.$booking_id.' Details about tractor,applicant, tractor owner and driver is given below :';

	     $siteLink = 'http://' . $_SERVER ['HTTP_HOST'];
        $this->SiteSetting = ClassRegistry::init('SiteSetting');
        $siteName = "TractoMandi Team";
        $loginLink = $siteLink . "/users/login";
        $loginLinkName = 'Login';

        $this->SiteSetting = ClassRegistry::init('SiteSetting');
     
        $senderEmail = $this->SiteSetting->getSettingValue('site_email');
		 
		 $find = array(
					'[TAGLINE]',
					'[DETAILS]',					
					//Driver
					'[DRIVER_NAME]',
					'[DRIVER_EMAIL]',
					'[DRIVER_MOBILE]',
					'[DRIVER_VILLAGE]',
					'[DRIVER_TALUKA]',
					'[DRIVER_CITY]',
					'[DRIVER_STATE]',
					'[DRIVER_ADDRESS]',
					
					//Customer
					'[NAME]',
					'[EMAIL]',
					'[MOBILE]',
					'[CUST_VILLAGE]',
					'[CUST_TALUKA]',
					'[CUST_CITY]',
					'[CUST_STATE]',
					'[CUST_ADDRESS]',
					//owner
					'[OWNER_NAME]',
					'[OWNER_EMAIL]',
					'[OWNER_MOBILE]',
					'[OWNER_VILLAGE]',
					'[OWNER_TALUKA]',
					'[OWNER_CITY]',
					'[OWNER_STATE]',
					'[OWNER_ADDRESS]',
					/*Tractor details*/
					'[TRACTOR_REGNO]',
					'[TRACTOR_BRAND]',
					'[TRACTOR_DESC]',
					'[TRACTOR_TYPE]',
					'[TRACTOR_MAKE]',
					'[TRACTOR_MODEL]',
					'[TRACTOR_COLOR]',
					'[TRACTOR_IMPLE]',
					'[TRACTOR_HORSE]',
					/*booking details*/
					'[BOOKED_FOR]',
					'[USAGE_TIME]',
					'[IMPLEMENT]',
					'[DESC]',
					'[REGARDS]',
					'[WORK_ADD]'
				);

				$replace = array(
				$tagLine,
				$details,
				//Driver
				 $driver_name,
				 $driver_email,
				 $driver_mobile,
				 $driver_village,
				 $driver_taluka,
				 $driver_city,
				 $driver_state,
				 $driver_address,			
				//Customer
				$cust_name,
				$cust_email,
				$cust_mobile,
				$cust_village,
				$cust_taluka,
				$cust_city,
				$cust_state,
				$cust_address,
				//owner
				$owner_name,
				$owner_email,
				$owner_mob,
				$owner_village,
				$owner_taluka,
				$owner_city,
				$owner_state,
				$owner_address,
				/*Tractor details*/
				$tractor_regNo,
				$tractor_brand,
				$tractor_desc,
				$tractor_type,
				$tractor_make,
				$tractor_model,
				$tractor_color,
				$tractor_implement,
				$tractor_hrp,
				/*booking details*/
				$booking_date,
				$tractor_time,
				$tractor_work,
				$tractor_BookingDesc,
				$siteName,
				$tractor_work_address					
				);

       

       
        $tempatedata = ClassRegistry::init('EmailTemplate')->getTempateData($tempateID);
        $emailSubject = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['subject']);
        $emailContent = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['content']);

        if ($this->sendMailContent($receiverEmail, $senderEmail, $emailSubject,$emailContent)) {
            return 1;
        } else {
            return 0;
        }
    }
	
	/*****************************************************************************/
	
	   function sendDriverAssignAcceptEmailCustomer($tempateID, $emailData = array(), $attachmentPath = null) {
		   (isset($emailData ['booking_id'])) ? $booking_id = $emailData ['booking_id'] : $booking_id = NULL;
			(isset($emailData ['EMAIL'])) ? $receiverEmail = $emailData ['EMAIL'] : $receiverEmail = NULL;
			(isset($emailData ['DRIVER_NAME'])) ? $driver_name = $emailData ['DRIVER_NAME'] : $driver_name = NULL;
			//Driver
			(isset($emailData ['DRIVER_EMAIL'])) ? $driver_email = $emailData ['DRIVER_EMAIL'] : $driver_email = NULL;
			(isset($emailData ['DRIVER_MOBILE'])) ? $driver_mobile = $emailData ['DRIVER_MOBILE'] : $driver_mobile = NULL;
			(isset($emailData ['DRIVER_VILLAGE'])) ? $driver_village = $emailData ['DRIVER_VILLAGE'] : $driver_village = NULL;
			(isset($emailData ['DRIVER_TALUKA'])) ? $driver_taluka = $emailData ['DRIVER_TALUKA'] : $driver_taluka = NULL;
			(isset($emailData ['DRIVER_CITY'])) ? $driver_city = $emailData ['DRIVER_CITY'] : $driver_city = NULL;
			(isset($emailData ['DRIVER_STATE'])) ? $driver_state = $emailData ['DRIVER_STATE'] : $driver_state = NULL;
			(isset($emailData ['DRIVER_ADDRESS'])) ? $driver_address = $emailData ['DRIVER_ADDRESS'] : $driver_address = NULL;
			
			//customer
			(isset($emailData ['NAME'])) ? $cust_name = $emailData ['NAME'] : $cust_name = NULL;
			(isset($emailData ['EMAIL'])) ? $cust_email = $emailData ['EMAIL'] : $cust_email = NULL;
			(isset($emailData ['MOBILE'])) ? $cust_mobile = $emailData ['MOBILE'] : $cust_mobile = NULL;
			(isset($emailData ['CUST_VILLAGE'])) ? $cust_village = $emailData ['CUST_VILLAGE'] : $cust_village = NULL;
			(isset($emailData ['CUST_TALUKA'])) ? $cust_taluka = $emailData ['CUST_TALUKA'] : $cust_taluka = NULL;
			(isset($emailData ['CUST_CITY'])) ? $cust_city = $emailData ['CUST_CITY'] : $cust_city = NULL;
			(isset($emailData ['CUST_STATE'])) ? $cust_state = $emailData ['CUST_STATE'] : $cust_state = NULL;
			(isset($emailData ['CUST_ADDRESS'])) ? $cust_address = $emailData ['CUST_ADDRESS'] : $cust_address = NULL;
			//owner
			(isset($emailData ['OWNER_NAME'])) ? $owner_name = $emailData ['OWNER_NAME'] : $owner_name = NULL;
			(isset($emailData ['OWNER_EMAIL'])) ? $owner_email = $emailData ['OWNER_EMAIL'] : $owner_email = NULL;
			(isset($emailData ['OWNER_MOBILE'])) ? $owner_mob = $emailData ['OWNER_MOBILE'] : $owner_mob = NULL;
			(isset($emailData ['OWNER_VILLAGE'])) ? $owner_village = $emailData ['OWNER_VILLAGE'] : $owner_village = NULL;
			(isset($emailData ['OWNER_TALUKA'])) ? $owner_taluka = $emailData ['OWNER_TALUKA'] : $owner_taluka = NULL;
			(isset($emailData ['OWNER_CITY'])) ? $owner_city = $emailData ['OWNER_CITY'] : $owner_city = NULL;
			(isset($emailData ['OWNER_STATE'])) ? $owner_state = $emailData ['OWNER_STATE'] : $owner_state = NULL;
			(isset($emailData ['OWNER_ADDRESS'])) ? $owner_address = $emailData ['OWNER_ADDRESS'] : $owner_address = NULL;
			//Tractor details
			(isset($emailData ['TRACTOR_REGNO'])) ? $tractor_regNo = $emailData ['TRACTOR_REGNO'] : $tractor_regNo = NULL;
			(isset($emailData ['TRACTOR_BRAND'])) ? $tractor_brand = $emailData ['TRACTOR_BRAND'] : $tractor_brand = NULL;
			(isset($emailData ['TRACTOR_DESC'])) ? $tractor_desc = $emailData ['TRACTOR_DESC'] : $tractor_desc = NULL;
			(isset($emailData ['TRACTOR_TYPE'])) ? $tractor_type = $emailData ['TRACTOR_TYPE'] : $tractor_type = NULL;
			(isset($emailData ['TRACTOR_MAKE'])) ? $tractor_make = $emailData ['TRACTOR_MAKE'] : $tractor_make = NULL;
			(isset($emailData ['TRACTOR_MODEL'])) ? $tractor_model = $emailData ['TRACTOR_MODEL'] : $tractor_model = NULL;
			(isset($emailData ['TRACTOR_COLOR'])) ? $tractor_color = $emailData ['TRACTOR_COLOR'] : $tractor_color = NULL;
			(isset($emailData ['TRACTOR_IMPLE'])) ? $tractor_implement = $emailData ['TRACTOR_IMPLE'] : $tractor_implement = NULL;
			(isset($emailData ['TRACTOR_HORSE'])) ? $tractor_hrp = $emailData ['TRACTOR_HORSE'] : $tractor_hrp = NULL;
			//Booking Details
			(isset($emailData ['BOOKED_FOR'])) ? $booking_date = $emailData ['BOOKED_FOR'] : $booking_date = NULL;
			(isset($emailData ['USAGE_TIME'])) ? $tractor_time = $emailData ['USAGE_TIME'] : $tractor_time = NULL;
			(isset($emailData ['IMPLEMENT'])) ? $tractor_work = $emailData ['IMPLEMENT'] : $tractor_work = NULL;
			(isset($emailData ['DESC'])) ? $tractor_BookingDesc = $emailData ['DESC'] : $tractor_BookingDesc = NULL;
			(isset($emailData ['WORK_ADDRESS'])) ? $tractor_work_address = $emailData ['DESC'] : $tractor_work_address = NULL;	
		$tagLine='Tractor bookig approved';
		$details='Hello '.$cust_name.',<br>Your booking complete  sucessfully on date '.$booking_date.' Id #'.$booking_id.' our team will contact you shortly. Details about tractor,applicant, tractor owner and driver is given below :';

	     $siteLink = 'http://' . $_SERVER ['HTTP_HOST'];
        $this->SiteSetting = ClassRegistry::init('SiteSetting');
        $siteName = "TractoMandi Team";
        $loginLink = $siteLink . "/users/login";
        $loginLinkName = 'Login';

        $this->SiteSetting = ClassRegistry::init('SiteSetting');
      
        $senderEmail = $this->SiteSetting->getSettingValue('site_email');
		 
		 $find = array(
					'[TAGLINE]',
					'[DETAILS]',					
					//Driver
					'[DRIVER_NAME]',
					'[DRIVER_EMAIL]',
					'[DRIVER_MOBILE]',
					'[DRIVER_VILLAGE]',
					'[DRIVER_TALUKA]',
					'[DRIVER_CITY]',
					'[DRIVER_STATE]',
					'[DRIVER_ADDRESS]',
					
					//Customer
					'[NAME]',
					'[EMAIL]',
					'[MOBILE]',
					'[CUST_VILLAGE]',
					'[CUST_TALUKA]',
					'[CUST_CITY]',
					'[CUST_STATE]',
					'[CUST_ADDRESS]',
					//owner
					'[OWNER_NAME]',
					'[OWNER_EMAIL]',
					'[OWNER_MOBILE]',
					'[OWNER_VILLAGE]',
					'[OWNER_TALUKA]',
					'[OWNER_CITY]',
					'[OWNER_STATE]',
					'[OWNER_ADDRESS]',
					/*Tractor details*/
					'[TRACTOR_REGNO]',
					'[TRACTOR_BRAND]',
					'[TRACTOR_DESC]',
					'[TRACTOR_TYPE]',
					'[TRACTOR_MAKE]',
					'[TRACTOR_MODEL]',
					'[TRACTOR_COLOR]',
					'[TRACTOR_IMPLE]',
					'[TRACTOR_HORSE]',
					/*booking details*/
					'[BOOKED_FOR]',
					'[USAGE_TIME]',
					'[IMPLEMENT]',
					'[DESC]',
					'[REGARDS]',
					'[WORK_ADD]'
				);

				$replace = array(
				$tagLine,
				$details,
				//Driver
				 $driver_name,
				 $driver_email,
				 $driver_mobile,
				 $driver_village,
				 $driver_taluka,
				 $driver_city,
				 $driver_state,
				 $driver_address,			
				//Customer
				$cust_name,
				$cust_email,
				$cust_mobile,
				$cust_village,
				$cust_taluka,
				$cust_city,
				$cust_state,
				$cust_address,
				//owner
				$owner_name,
				$owner_email,
				$owner_mob,
				$owner_village,
				$owner_taluka,
				$owner_city,
				$owner_state,
				$owner_address,
				/*Tractor details*/
				$tractor_regNo,
				$tractor_brand,
				$tractor_desc,
				$tractor_type,
				$tractor_make,
				$tractor_model,
				$tractor_color,
				$tractor_implement,
				$tractor_hrp,
				/*booking details*/
				$booking_date,
				$tractor_time,
				$tractor_work,
				$tractor_BookingDesc,
				$siteName	,
				$tractor_work_address	
				);

       

       
        $tempatedata = ClassRegistry::init('EmailTemplate')->getTempateData($tempateID);
        $emailSubject = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['subject']);
        $emailContent = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['content']);

        if ($this->sendMailContent($receiverEmail, $senderEmail, $emailSubject,$emailContent)) {
            return 1;
        } else {
            return 0;
        }
    }
	/************************************************Driver mark work is complete mail to admin*****************************/
	
	   function sendDriverMarkCompleteSendEmailAdmin($tempateID, $emailData = array(), $attachmentPath = null) {
        (isset($emailData ['admin_email'])) ? $receiverEmail = $emailData ['admin_email'] : $receiverEmail = NULL;
		 (isset($emailData ['booking_id'])) ? $booking_id = $emailData ['booking_id'] : $booking_id = NULL;
		 (isset($emailData ['work_time'])) ? $work_time = $emailData ['work_time'] : $work_time = NULL;
		(isset($emailData ['DRIVER_NAME'])) ? $driver_name = $emailData ['DRIVER_NAME'] : $driver_name = NULL;
			(isset($emailData ['TABLE'])) ? $table = $emailData ['TABLE'] : $table = NULL;
        
        $name="Admin";
		$heading="Work Completed";
		$details="Work completed sucessfully booking id #".$booking_id." details are given below";
        $siteLink = 'http://' . $_SERVER ['HTTP_HOST'];
        $this->SiteSetting = ClassRegistry::init('SiteSetting');
        $siteName = "TractoMandi Team";
        $loginLink = $siteLink . "/users/login";
        $loginLinkName = 'Login';

        $this->SiteSetting = ClassRegistry::init('SiteSetting');
        
        $senderEmail = $this->SiteSetting->getSettingValue('site_email');
		 
		 $find = array(
					'[HEADING]',
					'[NAME]',
					'[DETAILS]',
					'[TABLE]',
					'[REGARDS]'
				);

				$replace = array(
				$heading,
				$name,
				$details,
				$table,
				$driver_name
					
				);

       

        $tempatedata = ClassRegistry::init('EmailTemplate')->getTempateData($tempateID);
        $emailSubject = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['subject']);
        $emailContent = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['content']);

        if ($this->sendMailContent($receiverEmail, $senderEmail, $emailSubject,$emailContent)) {
            return 1;
        } else {
            return 0;
        }
    }
	/************************************************Driver mark work is complete mail to Driver*****************************/
	
	   function sendDriverMarkCompleteSendEmailDriver($tempateID, $emailData = array(), $attachmentPath = null) {
        (isset($emailData ['receiver_email'])) ? $receiverEmail = $emailData ['receiver_email'] : $receiverEmail = NULL;
		 (isset($emailData ['booking_id'])) ? $booking_id = $emailData ['booking_id'] : $booking_id = NULL;
		 (isset($emailData ['work_time'])) ? $work_time = $emailData ['work_time'] : $work_time = NULL;
		(isset($emailData ['DRIVER_NAME'])) ? $driver_name = $emailData ['DRIVER_NAME'] : $driver_name = NULL;
		(isset($emailData ['TABLE'])) ? $table = $emailData ['TABLE'] : $table = NULL;
        
       
		$heading="Congrats ! Work Completed";
		$details="You have completed work sucessfully booking id #".$booking_id."details are given below.";
        $siteLink = 'http://' . $_SERVER ['HTTP_HOST'];
        $this->SiteSetting = ClassRegistry::init('SiteSetting');
        $siteName = "TractoMandi Team";
        $loginLink = $siteLink . "/users/login";
        $loginLinkName = 'Login';

        $this->SiteSetting = ClassRegistry::init('SiteSetting');
       
        $senderEmail = $this->SiteSetting->getSettingValue('site_email');
		 
		 $find = array(
					'[HEADING]',
					'[NAME]',
					'[DETAILS]',
					'[TABLE]',
					'[REGARDS]'
				);

				$replace = array(
				$heading,
				$driver_name,
				$details,
				$table,
				$siteName
					
				);

       

        $tempatedata = ClassRegistry::init('EmailTemplate')->getTempateData($tempateID);
        $emailSubject = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['subject']);
        $emailContent = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['content']);

        if ($this->sendMailContent($receiverEmail, $senderEmail, $emailSubject,$emailContent)) {
            return 1;
        } else {
            return 0;
        }
    }
		/************************************************Driver mark work is complete mail to Customer*****************************/
	
	   function sendDriverMarkCompleteSendEmailCustomer($tempateID, $emailData = array(), $attachmentPath = null) {
        (isset($emailData ['cust_email'])) ? $receiverEmail = $emailData ['cust_email'] : $receiverEmail = NULL;
		 (isset($emailData ['booking_id'])) ? $booking_id = $emailData ['booking_id'] : $booking_id = NULL;
		 (isset($emailData ['work_time'])) ? $work_time = $emailData ['work_time'] : $work_time = NULL;
		 (isset($emailData ['cust_name'])) ? $cust_name = $emailData ['cust_name'] : $cust_name = NULL;
		 	(isset($emailData ['TABLE'])) ? $table = $emailData ['TABLE'] : $table = NULL;
		
        
       
		$heading="Congrats ! Work Completed";
		$details="Work completed  sucessfully booking id #".$booking_id."details are given below.";
        $siteLink = 'http://' . $_SERVER ['HTTP_HOST'];
        $this->SiteSetting = ClassRegistry::init('SiteSetting');
        $siteName = "TractoMandi Team";
        $loginLink = $siteLink . "/users/login";
        $loginLinkName = 'Login';

        $this->SiteSetting = ClassRegistry::init('SiteSetting');
       
        $senderEmail = $this->SiteSetting->getSettingValue('site_email');
		 
		 $find = array(
					'[HEADING]',
					'[NAME]',
					'[DETAILS]',
					'[TABLE]',
					'[REGARDS]'
				);

				$replace = array(
				$heading,
				$cust_name,
				$details,
				$table,
				$siteName
					
				);

       

        $tempatedata = ClassRegistry::init('EmailTemplate')->getTempateData($tempateID);
        $emailSubject = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['subject']);
        $emailContent = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['content']);

        if ($this->sendMailContent($receiverEmail, $senderEmail, $emailSubject,$emailContent)) {
            return 1;
        } else {
            return 0;
        }	
    }
   /************************************************Driver mark work is complete mail to Tractor Owner*****************************/
	
	   function sendDriverMarkCompleteSendEmailOwner($tempateID, $emailData = array(), $attachmentPath = null) {
        (isset($emailData ['owner_email'])) ? $receiverEmail = $emailData ['owner_email'] : $receiverEmail = NULL;
		 (isset($emailData ['booking_id'])) ? $booking_id = $emailData ['booking_id'] : $booking_id = NULL;
		 (isset($emailData ['work_time'])) ? $work_time = $emailData ['work_time'] : $work_time = NULL;
		 (isset($emailData ['owner_name'])) ? $owner_name = $emailData ['owner_name'] : $owner_name = NULL;
		 	(isset($emailData ['TABLE'])) ? $table = $emailData ['TABLE'] : $table = NULL;
		
		
		
        
       
		$heading="Congrats ! Work Completed";
		$details="Work completed  sucessfully booking id #".$booking_id."details are given below.";
        $siteLink = 'http://' . $_SERVER ['HTTP_HOST'];
        $this->SiteSetting = ClassRegistry::init('SiteSetting');
       
        $loginLink = $siteLink . "/users/login";
        $loginLinkName = 'Login';

        $this->SiteSetting = ClassRegistry::init('SiteSetting');
        $siteName = "TractoMandi Team";
        $senderEmail = $this->SiteSetting->getSettingValue('site_email');
		 
		 $find = array(
					'[HEADING]',
					'[NAME]',
					'[DETAILS]',
					'[TABLE]',
					'[REGARDS]'
				);

				$replace = array(
				$heading,
				$owner_name,
				$details,
				$table,
				$siteName
					
				);

       

        $tempatedata = ClassRegistry::init('EmailTemplate')->getTempateData($tempateID);
        $emailSubject = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['subject']);
        $emailContent = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['content']);

        if ($this->sendMailContent($receiverEmail, $senderEmail, $emailSubject,$emailContent)) {
            return 1;
        } else {
            return 0;
        }
    }
	
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		/************************************************Admin mark assignments done mail to admin*****************************/
	
	  function sendAdminMarkDoneSendEmailAdmin($tempateID, $emailData = array(), $attachmentPath = null) {
        (isset($emailData ['admin_email'])) ? $receiverEmail = $emailData ['admin_email'] : $receiverEmail = NULL;
		 (isset($emailData ['booking_id'])) ? $booking_id = $emailData ['booking_id'] : $booking_id = NULL;
		
		(isset($emailData ['DRIVER_NAME'])) ? $driver_name = $emailData ['DRIVER_NAME'] : $driver_name = NULL;
			(isset($emailData ['TABLE'])) ? $table = $emailData ['TABLE'] : $table = NULL;
		(isset($emailData ['total_amount'])) ? $total_amount = $emailData ['total_amount'] : $total_amount = NULL;
		(isset($emailData ['rate_per_hour'])) ? $rate_per_hour = $emailData ['rate_per_hour'] : $rate_per_hour = NULL;
         (isset($emailData ['cust_name'])) ? $cust_name = $emailData ['cust_name'] : $cust_name = NULL;
		 
		 $f = new NumberFormatter("en", NumberFormatter::SPELLOUT);
	   $amount_word=ucwords($f->format($total_amount));
        $name="Admin";
		$heading="Assignmets Done";
		$details="Assignmets done sucessfully booking id #".$booking_id."<br>Billing summary is given below";
        $siteLink = 'http://' . $_SERVER ['HTTP_HOST'];
        $this->SiteSetting = ClassRegistry::init('SiteSetting');
        $siteName = "TractoMandi Team";
        $loginLink = $siteLink . "/users/login";
        $loginLinkName = 'Login';

        $this->SiteSetting = ClassRegistry::init('SiteSetting');
       
        $senderEmail = $this->SiteSetting->getSettingValue('site_email');
		 
		 $find = array(
					'[HEADING]',
					'[NAME]',
					'[CUST_NAME]',
					'[BOOKING_ID]',
					'[TABLE]',
					'[AMOUNT_WORD]',
					'[TOTAL_AMT]',
					'[DETAILS]',
					'[REGARDS]'
				);

				$replace = array(
				$heading,
				$name,
				$cust_name,
				$booking_id,
				$table,
				$amount_word,
				$total_amount,
				$details,
				$siteName
					
				);

       

        $tempatedata = ClassRegistry::init('EmailTemplate')->getTempateData($tempateID);
        $emailSubject = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['subject']);
        $emailContent = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['content']);

        if ($this->sendMailContent($receiverEmail, $senderEmail, $emailSubject,$emailContent)) {
            return 1;
        } else {
            return 0;
        }
    }
	/************************************************Admin mark assignments done mail to Driver*****************************/
	
	   function sendAdminMarkDoneSendEmailDriver($tempateID, $emailData = array(), $attachmentPath = null) {
        (isset($emailData ['receiver_email'])) ? $receiverEmail = $emailData ['receiver_email'] : $receiverEmail = NULL;
		 (isset($emailData ['booking_id'])) ? $booking_id = $emailData ['booking_id'] : $booking_id = NULL;
		
		(isset($emailData ['DRIVER_NAME'])) ? $driver_name = $emailData ['DRIVER_NAME'] : $driver_name = NULL;
        	(isset($emailData ['TABLE'])) ? $table = $emailData ['TABLE'] : $table = NULL;
		(isset($emailData ['total_amount'])) ? $total_amount = $emailData ['total_amount'] : $total_amount = NULL;
		(isset($emailData ['rate_per_hour'])) ? $rate_per_hour = $emailData ['rate_per_hour'] : $rate_per_hour = NULL;
         (isset($emailData ['cust_name'])) ? $cust_name = $emailData ['cust_name'] : $cust_name = NULL;
       
	   
	   $f = new NumberFormatter("en", NumberFormatter::SPELLOUT);
	   $amount_word=ucwords($f->format($total_amount));
	   
		$heading="Assignmets Done";
		$details="Assignmets done sucessfully booking id #".$booking_id."<br>Billing summary is given below";
        $siteLink = 'http://' . $_SERVER ['HTTP_HOST'];
        $this->SiteSetting = ClassRegistry::init('SiteSetting');
        $siteName = "TractoMandi Team";
        $loginLink = $siteLink . "/users/login";
        $loginLinkName = 'Login';

        $this->SiteSetting = ClassRegistry::init('SiteSetting');
        
        $senderEmail = $this->SiteSetting->getSettingValue('site_email');
		 
		  $find = array(
					'[HEADING]',
					'[NAME]',
					'[CUST_NAME]',
					'[BOOKING_ID]',
					'[TABLE]',
					'[AMOUNT_WORD]',
					'[TOTAL_AMT]',
					'[DETAILS]',
					'[REGARDS]'
				);

				$replace = array(
				$heading,
				$driver_name,
				$cust_name,
				$booking_id,
				$table,
				$amount_word,
				$total_amount,
				$details,
				$siteName
					
				);

       

        $tempatedata = ClassRegistry::init('EmailTemplate')->getTempateData($tempateID);
        $emailSubject = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['subject']);
        $emailContent = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['content']);

        if ($this->sendMailContent($receiverEmail, $senderEmail, $emailSubject,$emailContent)) {
            return 1;
        } else {
            return 0;
        }
    }
		/************************************************Admin mark assignments done mail to Customer*****************************/
	
	 function sendDriverMarkDoneSendEmailCustomer($tempateID, $emailData = array(), $attachmentPath = null) {
        (isset($emailData ['cust_email'])) ? $receiverEmail = $emailData ['cust_email'] : $receiverEmail = NULL;
		 (isset($emailData ['booking_id'])) ? $booking_id = $emailData ['booking_id'] : $booking_id = NULL;
		 
		 (isset($emailData ['cust_name'])) ? $cust_name = $emailData ['cust_name'] : $cust_name = NULL;
			(isset($emailData ['TABLE'])) ? $table = $emailData ['TABLE'] : $table = NULL;
		(isset($emailData ['total_amount'])) ? $total_amount = $emailData ['total_amount'] : $total_amount = NULL;
		(isset($emailData ['rate_per_hour'])) ? $rate_per_hour = $emailData ['rate_per_hour'] : $rate_per_hour = NULL;
        
        
       
		  $f = new NumberFormatter("en", NumberFormatter::SPELLOUT);
	      $amount_word=ucwords($f->format($total_amount));
	   
		$heading="Assignmets Done";
		$details="Assignmets done sucessfully booking id #".$booking_id."<br>Billing summary is given below";
        $siteLink = 'http://' . $_SERVER ['HTTP_HOST'];
        $this->SiteSetting = ClassRegistry::init('SiteSetting');
        $siteName = "TractoMandi Team";
      

        $this->SiteSetting = ClassRegistry::init('SiteSetting');
       
        $senderEmail = $this->SiteSetting->getSettingValue('site_email');
		 
		  $find = array(
					'[HEADING]',
					'[NAME]',
					'[CUST_NAME]',
					'[BOOKING_ID]',
					'[TABLE]',
					'[AMOUNT_WORD]',
					'[TOTAL_AMT]',
					'[DETAILS]',
					'[REGARDS]'
				);

				$replace = array(
				$heading,
				$cust_name,
				$cust_name,
				$booking_id,
				$table,
				$amount_word,
				$total_amount,
				$details,
				$siteName
					
				);

       

        $tempatedata = ClassRegistry::init('EmailTemplate')->getTempateData($tempateID);
        $emailSubject = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['subject']);
        $emailContent = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['content']);

        if ($this->sendMailContent($receiverEmail, $senderEmail, $emailSubject,$emailContent)) {
            return 1;
        } else {
            return 0;
        }
    }
   /************************************************Admin mark assignments done mail to Tractro Owner*****************************/
	
	  function sendAdminMarkDoneSendEmailOwner($tempateID, $emailData = array(), $attachmentPath = null) {
        (isset($emailData ['owner_email'])) ? $receiverEmail = $emailData ['owner_email'] : $receiverEmail = NULL;
		 (isset($emailData ['booking_id'])) ? $booking_id = $emailData ['booking_id'] : $booking_id = NULL;
		
		(isset($emailData ['owner_name'])) ? $owner_name = $emailData ['owner_name'] : $owner_name = NULL;
		(isset($emailData ['TABLE'])) ? $table = $emailData ['TABLE'] : $table = NULL;
		(isset($emailData ['total_amount'])) ? $total_amount = $emailData ['total_amount'] : $total_amount = NULL;
		(isset($emailData ['rate_per_hour'])) ? $rate_per_hour = $emailData ['rate_per_hour'] : $rate_per_hour = NULL;
         (isset($emailData ['cust_name'])) ? $cust_name = $emailData ['cust_name'] : $cust_name = NULL;
		
        
       
		$f = new NumberFormatter("en", NumberFormatter::SPELLOUT);
	      $amount_word=ucwords($f->format($total_amount));
	   
		$heading="Assignmets Done";
		$details="Assignmets done sucessfully booking id #".$booking_id."<br>Billing summary is given below";
        $siteLink = 'http://' . $_SERVER ['HTTP_HOST'];
        $this->SiteSetting = ClassRegistry::init('SiteSetting');
        $siteName = "TractoMandi Team";
        $loginLink = $siteLink . "/users/login";
        $loginLinkName = 'Login';

        $this->SiteSetting = ClassRegistry::init('SiteSetting');
      
        $senderEmail = $this->SiteSetting->getSettingValue('site_email');
		 
		  $find = array(
					'[HEADING]',
					'[NAME]',
					'[CUST_NAME]',
					'[BOOKING_ID]',
					'[TABLE]',
					'[AMOUNT_WORD]',
					'[TOTAL_AMT]',
					'[DETAILS]',
					'[REGARDS]'
				);

				$replace = array(
				$heading,
				$owner_name,
				$cust_name,
				$booking_id,
				$table,
				$amount_word,
				$total_amount,
				$details,
				$siteName
					
				);

       

        $tempatedata = ClassRegistry::init('EmailTemplate')->getTempateData($tempateID);
        $emailSubject = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['subject']);
        $emailContent = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['content']);

        if ($this->sendMailContent($receiverEmail, $senderEmail, $emailSubject,$emailContent)) {
            return 1;
        } else {
            return 0;
        }
    }
	 /************************************************Order Confirmed****************************/
	
	  function sendOrderConfirmedSendEmailCustomer($tempateID, $emailData = array(), $attachmentPath = null) {
        (isset($emailData ['receiver_email'])) ? $receiverEmail = $emailData ['receiver_email'] : $receiverEmail = NULL;
		 (isset($emailData ['NAME'])) ? $cust_name = $emailData ['NAME'] : $cust_name = NULL;
		 (isset($emailData ['TOTAL'])) ? $total_amt = $emailData ['TOTAL'] : $total_amt = NULL;
		 (isset($emailData ['SHIP_AMT'])) ? $shipping_amt = $emailData ['SHIP_AMT'] : $shipping_amt = NULL;
		 (isset($emailData ['ADDRESS'])) ? $cust_address = $emailData ['ADDRESS'] : $cust_address = NULL;
		 (isset($emailData ['PIN'])) ? $cust_pin = $emailData ['PIN'] : $cust_pin = NULL;
		 (isset($emailData ['TABLE'])) ? $table = $emailData ['TABLE'] : $table = NULL;
		 
		  (isset($emailData ['order_id'])) ? $order_id = $emailData ['order_id'] : $order_id = NULL;
	
	   	$grand_total=$shipping_amt+$total_amt;
		$heading="Order Confirmed";
		$details="Thank you for your order id# ".$order_id." . You made a excellent choice by deciding to purchase on TractoMandi.  <br> <b>Order Details : </b>   ";
        $siteLink = 'http://' . $_SERVER ['HTTP_HOST'];
        $this->SiteSetting = ClassRegistry::init('SiteSetting');
        $siteName = "TractoMandi Team";
        $loginLink = $siteLink . "/users/login";
        $loginLinkName = 'Login';

        $this->SiteSetting = ClassRegistry::init('SiteSetting');
        
        $senderEmail = $this->SiteSetting->getSettingValue('site_email');
		 
		  $find = array(
					'[HEADING]',
					'[NAME]',
					'[DETAILS]',
					'[TABLE]',
					'[TOTAL]',
					'[SHIP_CHARG]',
					'[GRAND_TOTAL]',
					'[ADDRESS]',
					'[PIN]',
					
					'[REGARDS]',
					
				);

				$replace = array(
				$heading,
				$cust_name,
				$details,
				$table,
				$total_amt,
				$shipping_amt,
				$grand_total,
				$cust_address,
				$cust_pin,
				
				$siteName	
				
				
					
				);

       

        $tempatedata = ClassRegistry::init('EmailTemplate')->getTempateData($tempateID);
        $emailSubject = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['subject']);
        $emailContent = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['content']);

        if ($this->sendMailContent($receiverEmail, $senderEmail, $emailSubject,$emailContent)) {
            return 1;
        } else {
            return 0;
        }
    }
	 /************************************************Order Confirmed mail to admin****************************/
	
	  function sendOrderConfirmedSendEmailAdmin($tempateID, $emailData = array(), $attachmentPath = null) {
        (isset($emailData ['admin_email'])) ? $receiverEmail = $emailData ['admin_email'] : $receiverEmail = NULL;
		 (isset($emailData ['NAME'])) ? $cust_name = $emailData ['NAME'] : $cust_name = NULL;
		 (isset($emailData ['TOTAL'])) ? $total_amt = $emailData ['TOTAL'] : $total_amt = NULL;
		 (isset($emailData ['SHIP_AMT'])) ? $shipping_amt = $emailData ['SHIP_AMT'] : $shipping_amt = NULL;
		 (isset($emailData ['ADDRESS'])) ? $cust_address = $emailData ['ADDRESS'] : $cust_address = NULL;
		 (isset($emailData ['PIN'])) ? $cust_pin = $emailData ['PIN'] : $cust_pin = NULL;
		 (isset($emailData ['TABLE'])) ? $table = $emailData ['TABLE'] : $table = NULL;
		 
		  (isset($emailData ['order_id'])) ? $order_id = $emailData ['order_id'] : $order_id = NULL;
	
	   	$grand_total=$shipping_amt+$total_amt;
		$heading="Order Received";
		$details="One order received, order id#  ".$order_id." . <br> <b>Order Details : </b>   ";
        $siteLink = 'http://' . $_SERVER ['HTTP_HOST'];
        $this->SiteSetting = ClassRegistry::init('SiteSetting');
        $siteName = "TractoMandi Team";
        $loginLink = $siteLink . "/users/login";
        $loginLinkName = 'Login';
		$admin_name="Admin";

        $this->SiteSetting = ClassRegistry::init('SiteSetting');
      
        $senderEmail = $this->SiteSetting->getSettingValue('site_email');
		 
		  $find = array(
					'[HEADING]',
					'[NAME]',
					'[DETAILS]',
					'[TABLE]',
					'[TOTAL]',
					'[SHIP_CHARG]',
					'[GRAND_TOTAL]',
					'[ADDRESS]',
					'[PIN]',
					
					'[REGARDS]',
					
				);

				$replace = array(
				$heading,
				$admin_name,
				$details,
				$table,
				$total_amt,
				$shipping_amt,
				$grand_total,
				$cust_address,
				$cust_pin,
				
				$siteName	
				
				
					
				);

       

        $tempatedata = ClassRegistry::init('EmailTemplate')->getTempateData($tempateID);
        $emailSubject = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['subject']);
        $emailContent = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['content']);

        if ($this->sendMailContent($receiverEmail, $senderEmail, $emailSubject,$emailContent)) {
            return 1;
        } else {
            return 0;
        }
    }
	/************************************************Order Cancel mail to admin****************************/
	
	  function sendOrderCancelSendEmailAdmin($tempateID, $emailData = array(), $attachmentPath = null) {
        (isset($emailData ['admin_email'])) ? $receiverEmail = $emailData ['admin_email'] : $receiverEmail = NULL;
		 (isset($emailData ['NAME'])) ? $cust_name = $emailData ['NAME'] : $cust_name = NULL;
		 
		  (isset($emailData ['order_id'])) ? $order_id = $emailData ['order_id'] : $order_id = NULL;
	
	  
		$heading="Order Cancelled Request";
		$details="One order Cancelled, order id#  ".$order_id." .  ";
        $siteLink = 'http://' . $_SERVER ['HTTP_HOST'];
        $this->SiteSetting = ClassRegistry::init('SiteSetting');
        $siteName = "TractoMandi Team";
        $loginLink = $siteLink . "/users/login";
        $loginLinkName = 'Login';
		$admin_name="Admin";

        $this->SiteSetting = ClassRegistry::init('SiteSetting');
        
        $senderEmail = $this->SiteSetting->getSettingValue('site_email');
		 
		  $find = array(
					'[HEADING]',
					'[NAME]',
					'[DETAILS]',
					
					
					'[REGARDS]',
					
				);

				$replace = array(
				$heading,
				$admin_name,
				$details,
					
				$siteName	
				
				
					
				);

       

        $tempatedata = ClassRegistry::init('EmailTemplate')->getTempateData($tempateID);
        $emailSubject = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['subject']);
        $emailContent = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['content']);

        if ($this->sendMailContent($receiverEmail, $senderEmail, $emailSubject,$emailContent)) {
            return 1;
        } else {
            return 0;
        }
    }
	/************************************************Order Cancel mail to Customer****************************/
	
	  function sendOrderCancelSendEmailCustomer($tempateID, $emailData = array(), $attachmentPath = null) {
        (isset($emailData ['receiver_email'])) ? $receiverEmail = $emailData ['receiver_email'] : $receiverEmail = NULL;
		 (isset($emailData ['NAME'])) ? $cust_name = $emailData ['NAME'] : $cust_name = NULL;
		 
		  (isset($emailData ['order_id'])) ? $order_id = $emailData ['order_id'] : $order_id = NULL;
	
	  
		$heading="Order Cancelled Sucessfully";
		$details="Your order has been Cancelled sucessfully, order id#  ".$order_id." .  ";
        $siteLink = 'http://' . $_SERVER ['HTTP_HOST'];
        $this->SiteSetting = ClassRegistry::init('SiteSetting');
        $siteName = "TractoMandi Team";
        $loginLink = $siteLink . "/users/login";
        $loginLinkName = 'Login';
		$admin_name="Admin";

        $this->SiteSetting = ClassRegistry::init('SiteSetting');
       
        $senderEmail = $this->SiteSetting->getSettingValue('site_email');
		 
		  $find = array(
					'[HEADING]',
					'[NAME]',
					'[DETAILS]',
					'[REGARDS]',
					
				);

				$replace = array(
				$heading,
				$cust_name,
				$details,
					
				$siteName	
				
				
					
				);

       

        $tempatedata = ClassRegistry::init('EmailTemplate')->getTempateData($tempateID);
        $emailSubject = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['subject']);
        $emailContent = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['content']);

        if ($this->sendMailContent($receiverEmail, $senderEmail, $emailSubject,$emailContent)) {
            return 1;
        } else {
            return 0;
        }
    }
	/************************************************Add Tractor Mail  to Customer****************************/
	
	  function sendAddTractorEmailCustomer($tempateID, $emailData = array(), $attachmentPath = null) {
        (isset($emailData ['owner_email'])) ? $receiverEmail = $emailData ['owner_email'] : $receiverEmail = NULL;
		 (isset($emailData ['owner_name'])) ? $owner_name = $emailData ['owner_name'] : $owner_name = NULL;
		 
		  (isset($emailData ['tractor_id'])) ? $tractor_id = $emailData ['tractor_id'] : $tractor_id = NULL;
		    (isset($emailData ['tractor_mode'])) ? $tractor_mode = $emailData ['tractor_mode'] : $tractor_mode = NULL;
	
	  
		$heading="Tractor add Sucessfully";
		$details="Your Tractor has been add sucessfully,Tractor id#  ".$tractor_id." for ".$tractor_mode." .";
        $siteLink = 'http://' . $_SERVER ['HTTP_HOST'];
        $this->SiteSetting = ClassRegistry::init('SiteSetting');
        $siteName = "TractoMandi Team";
        $loginLink = $siteLink . "/users/login";
        $loginLinkName = 'Login';
		$admin_name="Admin";

        $this->SiteSetting = ClassRegistry::init('SiteSetting');
       
        $senderEmail = $this->SiteSetting->getSettingValue('site_email');
		 
		  $find = array(
					'[HEADING]',
					'[NAME]',
					'[DETAILS]',
					'[REGARDS]',
					
				);

				$replace = array(
				$heading,
				$owner_name,
				$details,
					
				$siteName	
				
				
					
				);

       

        $tempatedata = ClassRegistry::init('EmailTemplate')->getTempateData($tempateID);
        $emailSubject = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['subject']);
        $emailContent = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['content']);

        if ($this->sendMailContent($receiverEmail, $senderEmail, $emailSubject,$emailContent)) {
            return 1;
        } else {
            return 0;
        }
    }
	/************************************************Add Tractor Mail  to Admin****************************/
	
	  function sendAddTractorEmailAdmin($tempateID, $emailData = array(), $attachmentPath = null) {
        (isset($emailData ['admin_email'])) ? $receiverEmail = $emailData ['admin_email'] : $receiverEmail = NULL;
		
		 
		  (isset($emailData ['tractor_id'])) ? $tractor_id = $emailData ['tractor_id'] : $tractor_id = NULL;
		    (isset($emailData ['tractor_mode'])) ? $tractor_mode = $emailData ['tractor_mode'] : $tractor_mode = NULL;
	
		$admin="Admin";
		$heading="Tractor add Sucessfully";
		$details="One Tractor add sucessfully,Tractor id#  ".$tractor_id." for ".$tractor_mode." .";
        $siteLink = 'http://' . $_SERVER ['HTTP_HOST'];
        $this->SiteSetting = ClassRegistry::init('SiteSetting');
        $siteName = "TractoMandi Team";
        $loginLink = $siteLink . "/users/login";
        $loginLinkName = 'Login';
		$admin_name="Admin";

        $this->SiteSetting = ClassRegistry::init('SiteSetting');
        
        $senderEmail = $this->SiteSetting->getSettingValue('site_email');
		 
		  $find = array(
					'[HEADING]',
					'[NAME]',
					'[DETAILS]',
					'[REGARDS]',
					
				);

				$replace = array(
				$heading,
				$admin,
				$details,
					
				$siteName	
				
				
					
				);

       

        $tempatedata = ClassRegistry::init('EmailTemplate')->getTempateData($tempateID);
        $emailSubject = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['subject']);
        $emailContent = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['content']);

        if ($this->sendMailContent($receiverEmail, $senderEmail, $emailSubject,$emailContent)) {
            return 1;
        } else {
            return 0;
        }
    }
	
	/************************************************Delete Tractor Mail  to Admin****************************/
	
	  function sendDeleteTractorEmailAdmin($tempateID, $emailData = array(), $attachmentPath = null) {
        (isset($emailData ['admin_email'])) ? $receiverEmail = $emailData ['admin_email'] : $receiverEmail = NULL;
		
		 
		  (isset($emailData ['tractor_id'])) ? $tractor_id = $emailData ['tractor_id'] : $tractor_id = NULL;
		  
		$admin="Admin";
		$heading="Tractor Deleted Sucessfully";
		$details="One Tractor Deleted sucessfully,Tractor id#  ".$tractor_id." .";
        $siteLink = 'http://' . $_SERVER ['HTTP_HOST'];
        $this->SiteSetting = ClassRegistry::init('SiteSetting');
        $siteName = "TractoMandi Team";
        $loginLink = $siteLink . "/users/login";
        $loginLinkName = 'Login';
		$admin_name="Admin";

        $this->SiteSetting = ClassRegistry::init('SiteSetting');
       
        $senderEmail = $this->SiteSetting->getSettingValue('site_email');
		 
		  $find = array(
					'[HEADING]',
					'[NAME]',
					'[DETAILS]',
					'[REGARDS]',
					
				);

				$replace = array(
				$heading,
				$admin,
				$details,
					
				$siteName	
				
				
					
				);

       

        $tempatedata = ClassRegistry::init('EmailTemplate')->getTempateData($tempateID);
        $emailSubject = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['subject']);
        $emailContent = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['content']);

        if ($this->sendMailContent($receiverEmail, $senderEmail, $emailSubject,$emailContent)) {
            return 1;
        } else {
            return 0;
        }
    }
	/************************************************Delete Tractor Mail  to Customer****************************/
	
	  function sendDeleteTractorEmailCustomer($tempateID, $emailData = array(), $attachmentPath = null) {
		   (isset($emailData ['owner_name'])) ? $owner_name = $emailData ['owner_name'] : $owner_name = NULL;
        (isset($emailData ['owner_email'])) ? $receiverEmail = $emailData ['owner_email'] : $receiverEmail = NULL;
		
		 
		  (isset($emailData ['tractor_id'])) ? $tractor_id = $emailData ['tractor_id'] : $tractor_id = NULL;
		  
	
		$heading="Tractor Deleted Sucessfully";
		$details="Your Tractor has been Deleted sucessfully,Tractor id#  ".$tractor_id." .";
        $siteLink = 'http://' . $_SERVER ['HTTP_HOST'];
        $this->SiteSetting = ClassRegistry::init('SiteSetting');
       
        $loginLink = $siteLink . "/users/login";
        $loginLinkName = 'Login';
		$admin_name="Admin";

        $this->SiteSetting = ClassRegistry::init('SiteSetting');
        $siteName = "TractoMandi Team";
        $senderEmail = $this->SiteSetting->getSettingValue('site_email');
		 
		  $find = array(
					'[HEADING]',
					'[NAME]',
					'[DETAILS]',
					'[REGARDS]',
					
				);

				$replace = array(
				$heading,
				$owner_name,
				$details,
					
				$siteName	
				
				
					
				);

       

        $tempatedata = ClassRegistry::init('EmailTemplate')->getTempateData($tempateID);
        $emailSubject = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['subject']);
        $emailContent = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['content']);

        if ($this->sendMailContent($receiverEmail, $senderEmail, $emailSubject,$emailContent)) {
            return 1;
        } else {
            return 0;
        }
    }

/*-------------------------------------------Booking Approved--------------------------------------------------------------------------*/
 function sendBookingApprovedEmailOwner($tempateID, $emailData = array(), $attachmentPath = null) {
			(isset($emailData ['OWNER_EMAIL'])) ? $receiverEmail = $emailData ['OWNER_EMAIL'] : $receiverEmail = NULL;
			
			//customer
			(isset($emailData ['NAME'])) ? $cust_name = $emailData ['NAME'] : $cust_name = NULL;
			(isset($emailData ['EMAIL'])) ? $cust_email = $emailData ['EMAIL'] : $cust_email = NULL;
			(isset($emailData ['MOBILE'])) ? $cust_mobile = $emailData ['MOBILE'] : $cust_mobile = NULL;
			(isset($emailData ['CUST_VILLAGE'])) ? $cust_village = $emailData ['CUST_VILLAGE'] : $cust_village = NULL;
			(isset($emailData ['CUST_TALUKA'])) ? $cust_taluka = $emailData ['CUST_TALUKA'] : $cust_taluka = NULL;
			(isset($emailData ['CUST_CITY'])) ? $cust_city = $emailData ['CUST_CITY'] : $cust_city = NULL;
			(isset($emailData ['CUST_STATE'])) ? $cust_state = $emailData ['CUST_STATE'] : $cust_state = NULL;
			(isset($emailData ['CUST_ADDRESS'])) ? $cust_address = $emailData ['CUST_ADDRESS'] : $cust_address = NULL;
			//owner
			(isset($emailData ['OWNER_NAME'])) ? $owner_name = $emailData ['OWNER_NAME'] : $owner_name = NULL;
			(isset($emailData ['OWNER_EMAIL'])) ? $owner_email = $emailData ['OWNER_EMAIL'] : $owner_email = NULL;
			(isset($emailData ['OWNER_MOBILE'])) ? $owner_mob = $emailData ['OWNER_MOBILE'] : $owner_mob = NULL;
			(isset($emailData ['OWNER_VILLAGE'])) ? $owner_village = $emailData ['OWNER_VILLAGE'] : $owner_village = NULL;
			(isset($emailData ['OWNER_TALUKA'])) ? $owner_taluka = $emailData ['OWNER_TALUKA'] : $owner_taluka = NULL;
			(isset($emailData ['OWNER_CITY'])) ? $owner_city = $emailData ['OWNER_CITY'] : $owner_city = NULL;
			(isset($emailData ['OWNER_STATE'])) ? $owner_state = $emailData ['OWNER_STATE'] : $owner_state = NULL;
			(isset($emailData ['OWNER_ADDRESS'])) ? $owner_address = $emailData ['OWNER_ADDRESS'] : $owner_address = NULL;
			//Tractor details
			(isset($emailData ['TRACTOR_REGNO'])) ? $tractor_regNo = $emailData ['TRACTOR_REGNO'] : $tractor_regNo = NULL;
			(isset($emailData ['TRACTOR_BRAND'])) ? $tractor_brand = $emailData ['TRACTOR_BRAND'] : $tractor_brand = NULL;
			(isset($emailData ['TRACTOR_DESC'])) ? $tractor_desc = $emailData ['TRACTOR_DESC'] : $tractor_desc = NULL;
			(isset($emailData ['TRACTOR_TYPE'])) ? $tractor_type = $emailData ['TRACTOR_TYPE'] : $tractor_type = NULL;
			(isset($emailData ['TRACTOR_MAKE'])) ? $tractor_make = $emailData ['TRACTOR_MAKE'] : $tractor_make = NULL;
			(isset($emailData ['TRACTOR_MODEL'])) ? $tractor_model = $emailData ['TRACTOR_MODEL'] : $tractor_model = NULL;
			(isset($emailData ['TRACTOR_COLOR'])) ? $tractor_color = $emailData ['TRACTOR_COLOR'] : $tractor_color = NULL;
			(isset($emailData ['TRACTOR_IMPLE'])) ? $tractor_implement = $emailData ['TRACTOR_IMPLE'] : $tractor_implement = NULL;
			(isset($emailData ['TRACTOR_HORSE'])) ? $tractor_hrp = $emailData ['TRACTOR_HORSE'] : $tractor_hrp = NULL;
			//Booking Details
			(isset($emailData ['BOOKED_FOR'])) ? $booking_date = $emailData ['BOOKED_FOR'] : $booking_date = NULL;
			(isset($emailData ['USAGE_TIME'])) ? $tractor_time = $emailData ['USAGE_TIME'] : $tractor_time = NULL;
			(isset($emailData ['IMPLEMENT'])) ? $tractor_work = $emailData ['IMPLEMENT'] : $tractor_work = NULL;
			(isset($emailData ['DESC'])) ? $tractor_BookingDesc = $emailData ['DESC'] : $tractor_BookingDesc = NULL;
			(isset($emailData ['WORK_ADDRESS'])) ? $tractor_work_address = $emailData ['WORK_ADDRESS'] : $tractor_work_address = NULL;
		$tagLine='Congrats! New booking assigned to you.';
		$details='Dear '.$owner_name.',<br>Your tracotr booked for a assignment . Details about tractor and applicant is given below :';

	     $siteLink = 'http://' . $_SERVER ['HTTP_HOST'];
        $this->SiteSetting = ClassRegistry::init('SiteSetting');
        $siteName = "TractoMandi Team";
        $loginLink = $siteLink . "/users/login";
        $loginLinkName = 'Login';

        $this->SiteSetting = ClassRegistry::init('SiteSetting');
        
        $senderEmail = $this->SiteSetting->getSettingValue('site_email');
		 
		 $find = array(
					'[TAGLINE]',
					'[DETAILS]',					
					'[NAME]',
					'[EMAIL]',
					'[MOBILE]',
					'[CUST_VILLAGE]',
					'[CUST_TALUKA]',
					'[CUST_CITY]',
					'[CUST_STATE]',
					'[CUST_ADDRESS]',
					//owner
					'[OWNER_NAME]',
					'[OWNER_EMAIL]',
					'[OWNER_MOBILE]',
					'[OWNER_VILLAGE]',
					'[OWNER_TALUKA]',
					'[OWNER_CITY]',
					'[OWNER_STATE]',
					'[OWNER_ADDRESS]',
					/*Tractor details*/
					'[TRACTOR_REGNO]',
					'[TRACTOR_BRAND]',
					'[TRACTOR_DESC]',
					'[TRACTOR_TYPE]',
					'[TRACTOR_MAKE]',
					'[TRACTOR_MODEL]',
					'[TRACTOR_COLOR]',
					'[TRACTOR_IMPLE]',
					'[TRACTOR_HORSE]',
					/*booking details*/
					'[BOOKED_FOR]',
					'[USAGE_TIME]',
					'[IMPLEMENT]',
					'[DESC]',
					'[REGARDS]',
					'[WORK_ADD]'
				);

				$replace = array(
				$tagLine,
				$details,
				$cust_name,
				$cust_email,
				$cust_mobile,
				$cust_village,
				$cust_taluka,
				$cust_city,
				$cust_state,
				$cust_address,
				//owner
				$owner_name,
				$owner_email,
				$owner_mob,
				$owner_village,
				$owner_taluka,
				$owner_city,
				$owner_state,
				$owner_address,
				/*Tractor details*/
				$tractor_regNo,
				$tractor_brand,
				$tractor_desc,
				$tractor_type,
				$tractor_make,
				$tractor_model,
				$tractor_color,
				$tractor_implement,
				$tractor_hrp,
				/*booking details*/
				$booking_date,
				$tractor_time,
				$tractor_work,
				$tractor_BookingDesc,
				$siteName,
				$tractor_work_address
				);

       

       
        $tempatedata = ClassRegistry::init('EmailTemplate')->getTempateData($tempateID);
        $emailSubject = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['subject']);
        $emailContent = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['content']);

        if ($this->sendMailContent($receiverEmail, $senderEmail, $emailSubject,$emailContent)) {
            return 1;
        } else {
            return 0;
        }
    }
	/*****************************************************************************/
	
	   function sendBookingApprovedEmailAdmin($tempateID, $emailData = array(), $attachmentPath = null) {
			(isset($emailData ['admin_email'])) ? $receiverEmail = $emailData ['admin_email'] : $receiverEmail = NULL;
			//$receiverEmail=DEFAULT_EMAIL_ADDRESS;
			(isset($emailData ['DRIVER_NAME'])) ? $driver_name = $emailData ['DRIVER_NAME'] : $driver_name = NULL;
			//customer
			(isset($emailData ['NAME'])) ? $cust_name = $emailData ['NAME'] : $cust_name = NULL;
			(isset($emailData ['EMAIL'])) ? $cust_email = $emailData ['EMAIL'] : $cust_email = NULL;
			(isset($emailData ['MOBILE'])) ? $cust_mobile = $emailData ['MOBILE'] : $cust_mobile = NULL;
			(isset($emailData ['CUST_VILLAGE'])) ? $cust_village = $emailData ['CUST_VILLAGE'] : $cust_village = NULL;
			(isset($emailData ['CUST_TALUKA'])) ? $cust_taluka = $emailData ['CUST_TALUKA'] : $cust_taluka = NULL;
			(isset($emailData ['CUST_CITY'])) ? $cust_city = $emailData ['CUST_CITY'] : $cust_city = NULL;
			(isset($emailData ['CUST_STATE'])) ? $cust_state = $emailData ['CUST_STATE'] : $cust_state = NULL;
			(isset($emailData ['CUST_ADDRESS'])) ? $cust_address = $emailData ['CUST_ADDRESS'] : $cust_address = NULL;
			//owner
			(isset($emailData ['OWNER_NAME'])) ? $owner_name = $emailData ['OWNER_NAME'] : $owner_name = NULL;
			(isset($emailData ['OWNER_EMAIL'])) ? $owner_email = $emailData ['OWNER_EMAIL'] : $owner_email = NULL;
			(isset($emailData ['OWNER_MOBILE'])) ? $owner_mob = $emailData ['OWNER_MOBILE'] : $owner_mob = NULL;
			(isset($emailData ['OWNER_VILLAGE'])) ? $owner_village = $emailData ['OWNER_VILLAGE'] : $owner_village = NULL;
			(isset($emailData ['OWNER_TALUKA'])) ? $owner_taluka = $emailData ['OWNER_TALUKA'] : $owner_taluka = NULL;
			(isset($emailData ['OWNER_CITY'])) ? $owner_city = $emailData ['OWNER_CITY'] : $owner_city = NULL;
			(isset($emailData ['OWNER_STATE'])) ? $owner_state = $emailData ['OWNER_STATE'] : $owner_state = NULL;
			(isset($emailData ['OWNER_ADDRESS'])) ? $owner_address = $emailData ['OWNER_ADDRESS'] : $owner_address = NULL;
			//Tractor details
			(isset($emailData ['TRACTOR_REGNO'])) ? $tractor_regNo = $emailData ['TRACTOR_REGNO'] : $tractor_regNo = NULL;
			(isset($emailData ['TRACTOR_BRAND'])) ? $tractor_brand = $emailData ['TRACTOR_BRAND'] : $tractor_brand = NULL;
			(isset($emailData ['TRACTOR_DESC'])) ? $tractor_desc = $emailData ['TRACTOR_DESC'] : $tractor_desc = NULL;
			(isset($emailData ['TRACTOR_TYPE'])) ? $tractor_type = $emailData ['TRACTOR_TYPE'] : $tractor_type = NULL;
			(isset($emailData ['TRACTOR_MAKE'])) ? $tractor_make = $emailData ['TRACTOR_MAKE'] : $tractor_make = NULL;
			(isset($emailData ['TRACTOR_MODEL'])) ? $tractor_model = $emailData ['TRACTOR_MODEL'] : $tractor_model = NULL;
			(isset($emailData ['TRACTOR_COLOR'])) ? $tractor_color = $emailData ['TRACTOR_COLOR'] : $tractor_color = NULL;
			(isset($emailData ['TRACTOR_IMPLE'])) ? $tractor_implement = $emailData ['TRACTOR_IMPLE'] : $tractor_implement = NULL;
			(isset($emailData ['TRACTOR_HORSE'])) ? $tractor_hrp = $emailData ['TRACTOR_HORSE'] : $tractor_hrp = NULL;
			//Booking Details
			(isset($emailData ['BOOKED_FOR'])) ? $booking_date = $emailData ['BOOKED_FOR'] : $booking_date = NULL;
			(isset($emailData ['USAGE_TIME'])) ? $tractor_time = $emailData ['USAGE_TIME'] : $tractor_time = NULL;
			(isset($emailData ['IMPLEMENT'])) ? $tractor_work = $emailData ['IMPLEMENT'] : $tractor_work = NULL;
			(isset($emailData ['DESC'])) ? $tractor_BookingDesc = $emailData ['DESC'] : $tractor_BookingDesc = NULL;
			(isset($emailData ['WORK_ADDRESS'])) ? $tractor_work_address = $emailData ['WORK_ADDRESS'] : $tractor_work_address = NULL;
		$tagLine='You have approved a booking';
		$details='Details about tractor and applicant is given below :';

	   $siteLink = 'http://' . $_SERVER ['HTTP_HOST'];
        $this->SiteSetting = ClassRegistry::init('SiteSetting');
        $siteName = "TractoMandi Team";
        $loginLink = $siteLink . "/users/login";
        $loginLinkName = 'Login';

        $this->SiteSetting = ClassRegistry::init('SiteSetting');
      
        $senderEmail = $this->SiteSetting->getSettingValue('site_email');
		 
		 $find = array(
					'[TAGLINE]',
					'[DETAILS]',					
					'[NAME]',
					'[EMAIL]',
					'[MOBILE]',
					'[CUST_VILLAGE]',
					'[CUST_TALUKA]',
					'[CUST_CITY]',
					'[CUST_STATE]',
					'[CUST_ADDRESS]',
					//owner
					'[OWNER_NAME]',
					'[OWNER_EMAIL]',
					'[OWNER_MOBILE]',
					'[OWNER_VILLAGE]',
					'[OWNER_TALUKA]',
					'[OWNER_CITY]',
					'[OWNER_STATE]',
					'[OWNER_ADDRESS]',
					/*Tractor details*/
					'[TRACTOR_REGNO]',
					'[TRACTOR_BRAND]',
					'[TRACTOR_DESC]',
					'[TRACTOR_TYPE]',
					'[TRACTOR_MAKE]',
					'[TRACTOR_MODEL]',
					'[TRACTOR_COLOR]',
					'[TRACTOR_IMPLE]',
					'[TRACTOR_HORSE]',
					/*booking details*/
					'[BOOKED_FOR]',
					'[USAGE_TIME]',
					'[IMPLEMENT]',
					'[DESC]',
					'[REGARDS]',
					'[WORK_ADD]'
				);

				$replace = array(
				$tagLine,
				$details,
				$cust_name,
				$cust_email,
				$cust_mobile,
				$cust_village,
				$cust_taluka,
				$cust_city,
				$cust_state,
				$cust_address,
				//owner
				$owner_name,
				$owner_email,
				$owner_mob,
				$owner_village,
				$owner_taluka,
				$owner_city,
				$owner_state,
				$owner_address,
				/*Tractor details*/
				$tractor_regNo,
				$tractor_brand,
				$tractor_desc,
				$tractor_type,
				$tractor_make,
				$tractor_model,
				$tractor_color,
				$tractor_implement,
				$tractor_hrp,
				/*booking details*/
				$booking_date,
				$tractor_time,
				$tractor_work,
				$tractor_BookingDesc,
				$siteName	,
				$tractor_work_address
				);

       

       
        $tempatedata = ClassRegistry::init('EmailTemplate')->getTempateData($tempateID);
        $emailSubject = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['subject']);
        $emailContent = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['content']);

        if ($this->sendMailContent($receiverEmail,$senderEmail, $emailSubject,$emailContent)) {
            return 1;
        } else {
            return 0;
        }
    }
	/*--------------------------------------------------------------Owner Accpt Booking------------------------------------------------*/
   function sendOwnerAssignAcceptEmailAdmin($tempateID, $emailData = array(), $attachmentPath = null) {
		   (isset($emailData ['booking_id'])) ? $booking_id = $emailData ['booking_id'] : $booking_id = NULL;
			(isset($emailData ['admin_email'])) ? $receiverEmail = $emailData ['admin_email'] : $receiverEmail = NULL;
			
		
			//customer
			(isset($emailData ['NAME'])) ? $cust_name = $emailData ['NAME'] : $cust_name = NULL;
			(isset($emailData ['EMAIL'])) ? $cust_email = $emailData ['EMAIL'] : $cust_email = NULL;
			(isset($emailData ['MOBILE'])) ? $cust_mobile = $emailData ['MOBILE'] : $cust_mobile = NULL;
			(isset($emailData ['CUST_VILLAGE'])) ? $cust_village = $emailData ['CUST_VILLAGE'] : $cust_village = NULL;
			(isset($emailData ['CUST_TALUKA'])) ? $cust_taluka = $emailData ['CUST_TALUKA'] : $cust_taluka = NULL;
			(isset($emailData ['CUST_CITY'])) ? $cust_city = $emailData ['CUST_CITY'] : $cust_city = NULL;
			(isset($emailData ['CUST_STATE'])) ? $cust_state = $emailData ['CUST_STATE'] : $cust_state = NULL;
			(isset($emailData ['CUST_ADDRESS'])) ? $cust_address = $emailData ['CUST_ADDRESS'] : $cust_address = NULL;
			//owner
			(isset($emailData ['OWNER_NAME'])) ? $owner_name = $emailData ['OWNER_NAME'] : $owner_name = NULL;
			(isset($emailData ['OWNER_EMAIL'])) ? $owner_email = $emailData ['OWNER_EMAIL'] : $owner_email = NULL;
			(isset($emailData ['OWNER_MOBILE'])) ? $owner_mob = $emailData ['OWNER_MOBILE'] : $owner_mob = NULL;
			(isset($emailData ['OWNER_VILLAGE'])) ? $owner_village = $emailData ['OWNER_VILLAGE'] : $owner_village = NULL;
			(isset($emailData ['OWNER_TALUKA'])) ? $owner_taluka = $emailData ['OWNER_TALUKA'] : $owner_taluka = NULL;
			(isset($emailData ['OWNER_CITY'])) ? $owner_city = $emailData ['OWNER_CITY'] : $owner_city = NULL;
			(isset($emailData ['OWNER_STATE'])) ? $owner_state = $emailData ['OWNER_STATE'] : $owner_state = NULL;
			(isset($emailData ['OWNER_ADDRESS'])) ? $owner_address = $emailData ['OWNER_ADDRESS'] : $owner_address = NULL;
			//Tractor details
			(isset($emailData ['TRACTOR_REGNO'])) ? $tractor_regNo = $emailData ['TRACTOR_REGNO'] : $tractor_regNo = NULL;
			(isset($emailData ['TRACTOR_BRAND'])) ? $tractor_brand = $emailData ['TRACTOR_BRAND'] : $tractor_brand = NULL;
			(isset($emailData ['TRACTOR_DESC'])) ? $tractor_desc = $emailData ['TRACTOR_DESC'] : $tractor_desc = NULL;
			(isset($emailData ['TRACTOR_TYPE'])) ? $tractor_type = $emailData ['TRACTOR_TYPE'] : $tractor_type = NULL;
			(isset($emailData ['TRACTOR_MAKE'])) ? $tractor_make = $emailData ['TRACTOR_MAKE'] : $tractor_make = NULL;
			(isset($emailData ['TRACTOR_MODEL'])) ? $tractor_model = $emailData ['TRACTOR_MODEL'] : $tractor_model = NULL;
			(isset($emailData ['TRACTOR_COLOR'])) ? $tractor_color = $emailData ['TRACTOR_COLOR'] : $tractor_color = NULL;
			(isset($emailData ['TRACTOR_IMPLE'])) ? $tractor_implement = $emailData ['TRACTOR_IMPLE'] : $tractor_implement = NULL;
			(isset($emailData ['TRACTOR_HORSE'])) ? $tractor_hrp = $emailData ['TRACTOR_HORSE'] : $tractor_hrp = NULL;
			//Booking Details
			(isset($emailData ['BOOKED_FOR'])) ? $booking_date = $emailData ['BOOKED_FOR'] : $booking_date = NULL;
			(isset($emailData ['USAGE_TIME'])) ? $tractor_time = $emailData ['USAGE_TIME'] : $tractor_time = NULL;
			(isset($emailData ['IMPLEMENT'])) ? $tractor_work = $emailData ['IMPLEMENT'] : $tractor_work = NULL;
			(isset($emailData ['DESC'])) ? $tractor_BookingDesc = $emailData ['DESC'] : $tractor_BookingDesc = NULL;
			(isset($emailData ['WORK_ADDRESS'])) ? $tractor_work_address = $emailData ['WORK_ADDRESS'] : $tractor_work_address = NULL;
		$tagLine='Tractor Owner Booking Accept';
		$details='Hello Admin,<br>Booking accpted by '.$owner_name.' booking Id #'.$booking_id.' Details about tractor,applicant and tractor owner  is given below :';

	     $siteLink = 'http://' . $_SERVER ['HTTP_HOST'];
        $this->SiteSetting = ClassRegistry::init('SiteSetting');
        $siteName = "TractoMandi Team";
        $loginLink = $siteLink . "/users/login";
        $loginLinkName = 'Login';

        $this->SiteSetting = ClassRegistry::init('SiteSetting');
       
        $senderEmail = $this->SiteSetting->getSettingValue('site_email');
		 
		 $find = array(
					'[TAGLINE]',
					'[DETAILS]',					
					
					
					//Customer
					'[NAME]',
					'[EMAIL]',
					'[MOBILE]',
					'[CUST_VILLAGE]',
					'[CUST_TALUKA]',
					'[CUST_CITY]',
					'[CUST_STATE]',
					'[CUST_ADDRESS]',
					//owner
					'[OWNER_NAME]',
					'[OWNER_EMAIL]',
					'[OWNER_MOBILE]',
					'[OWNER_VILLAGE]',
					'[OWNER_TALUKA]',
					'[OWNER_CITY]',
					'[OWNER_STATE]',
					'[OWNER_ADDRESS]',
					/*Tractor details*/
					'[TRACTOR_REGNO]',
					'[TRACTOR_BRAND]',
					'[TRACTOR_DESC]',
					'[TRACTOR_TYPE]',
					'[TRACTOR_MAKE]',
					'[TRACTOR_MODEL]',
					'[TRACTOR_COLOR]',
					'[TRACTOR_IMPLE]',
					'[TRACTOR_HORSE]',
					/*booking details*/
					'[BOOKED_FOR]',
					'[USAGE_TIME]',
					'[IMPLEMENT]',
					'[DESC]',
					'[REGARDS]',
					'[WORK_ADD]'
				);

				$replace = array(
				$tagLine,
				$details,
						
				//Customer
				$cust_name,
				$cust_email,
				$cust_mobile,
				$cust_village,
				$cust_taluka,
				$cust_city,
				$cust_state,
				$cust_address,
				//owner
				$owner_name,
				$owner_email,
				$owner_mob,
				$owner_village,
				$owner_taluka,
				$owner_city,
				$owner_state,
				$owner_address,
				/*Tractor details*/
				$tractor_regNo,
				$tractor_brand,
				$tractor_desc,
				$tractor_type,
				$tractor_make,
				$tractor_model,
				$tractor_color,
				$tractor_implement,
				$tractor_hrp,
				/*booking details*/
				$booking_date,
				$tractor_time,
				$tractor_work,
				$tractor_BookingDesc,
				$siteName	,
				$tractor_work_address
				);

       

       
        $tempatedata = ClassRegistry::init('EmailTemplate')->getTempateData($tempateID);
        $emailSubject = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['subject']);
        $emailContent = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['content']);

        if ($this->sendMailContent($receiverEmail, $senderEmail, $emailSubject,$emailContent)) {
            return 1;
        } else {
            return 0;
        }
    }
		/*****************************************************************************/
	
	   function sendOwnerAssignAcceptEmailOwner($tempateID, $emailData = array(), $attachmentPath = null) {
		   (isset($emailData ['booking_id'])) ? $booking_id = $emailData ['booking_id'] : $booking_id = NULL;
			(isset($emailData ['OWNER_EMAIL'])) ? $receiverEmail = $emailData ['OWNER_EMAIL'] : $receiverEmail = NULL;
		
		
			//customer
			(isset($emailData ['NAME'])) ? $cust_name = $emailData ['NAME'] : $cust_name = NULL;
			(isset($emailData ['EMAIL'])) ? $cust_email = $emailData ['EMAIL'] : $cust_email = NULL;
			(isset($emailData ['MOBILE'])) ? $cust_mobile = $emailData ['MOBILE'] : $cust_mobile = NULL;
			(isset($emailData ['CUST_VILLAGE'])) ? $cust_village = $emailData ['CUST_VILLAGE'] : $cust_village = NULL;
			(isset($emailData ['CUST_TALUKA'])) ? $cust_taluka = $emailData ['CUST_TALUKA'] : $cust_taluka = NULL;
			(isset($emailData ['CUST_CITY'])) ? $cust_city = $emailData ['CUST_CITY'] : $cust_city = NULL;
			(isset($emailData ['CUST_STATE'])) ? $cust_state = $emailData ['CUST_STATE'] : $cust_state = NULL;
			(isset($emailData ['CUST_ADDRESS'])) ? $cust_address = $emailData ['CUST_ADDRESS'] : $cust_address = NULL;
			//owner
			(isset($emailData ['OWNER_NAME'])) ? $owner_name = $emailData ['OWNER_NAME'] : $owner_name = NULL;
			(isset($emailData ['OWNER_EMAIL'])) ? $owner_email = $emailData ['OWNER_EMAIL'] : $owner_email = NULL;
			(isset($emailData ['OWNER_MOBILE'])) ? $owner_mob = $emailData ['OWNER_MOBILE'] : $owner_mob = NULL;
			(isset($emailData ['OWNER_VILLAGE'])) ? $owner_village = $emailData ['OWNER_VILLAGE'] : $owner_village = NULL;
			(isset($emailData ['OWNER_TALUKA'])) ? $owner_taluka = $emailData ['OWNER_TALUKA'] : $owner_taluka = NULL;
			(isset($emailData ['OWNER_CITY'])) ? $owner_city = $emailData ['OWNER_CITY'] : $owner_city = NULL;
			(isset($emailData ['OWNER_STATE'])) ? $owner_state = $emailData ['OWNER_STATE'] : $owner_state = NULL;
			(isset($emailData ['OWNER_ADDRESS'])) ? $owner_address = $emailData ['OWNER_ADDRESS'] : $owner_address = NULL;
			//Tractor details
			(isset($emailData ['TRACTOR_REGNO'])) ? $tractor_regNo = $emailData ['TRACTOR_REGNO'] : $tractor_regNo = NULL;
			(isset($emailData ['TRACTOR_BRAND'])) ? $tractor_brand = $emailData ['TRACTOR_BRAND'] : $tractor_brand = NULL;
			(isset($emailData ['TRACTOR_DESC'])) ? $tractor_desc = $emailData ['TRACTOR_DESC'] : $tractor_desc = NULL;
			(isset($emailData ['TRACTOR_TYPE'])) ? $tractor_type = $emailData ['TRACTOR_TYPE'] : $tractor_type = NULL;
			(isset($emailData ['TRACTOR_MAKE'])) ? $tractor_make = $emailData ['TRACTOR_MAKE'] : $tractor_make = NULL;
			(isset($emailData ['TRACTOR_MODEL'])) ? $tractor_model = $emailData ['TRACTOR_MODEL'] : $tractor_model = NULL;
			(isset($emailData ['TRACTOR_COLOR'])) ? $tractor_color = $emailData ['TRACTOR_COLOR'] : $tractor_color = NULL;
			(isset($emailData ['TRACTOR_IMPLE'])) ? $tractor_implement = $emailData ['TRACTOR_IMPLE'] : $tractor_implement = NULL;
			(isset($emailData ['TRACTOR_HORSE'])) ? $tractor_hrp = $emailData ['TRACTOR_HORSE'] : $tractor_hrp = NULL;
			//Booking Details
			(isset($emailData ['BOOKED_FOR'])) ? $booking_date = $emailData ['BOOKED_FOR'] : $booking_date = NULL;
			(isset($emailData ['USAGE_TIME'])) ? $tractor_time = $emailData ['USAGE_TIME'] : $tractor_time = NULL;
			(isset($emailData ['IMPLEMENT'])) ? $tractor_work = $emailData ['IMPLEMENT'] : $tractor_work = NULL;
			(isset($emailData ['DESC'])) ? $tractor_BookingDesc = $emailData ['DESC'] : $tractor_BookingDesc = NULL;
			(isset($emailData ['WORK_ADDRESS'])) ? $tractor_work_address = $emailData ['WORK_ADDRESS'] : $tractor_work_address = NULL;
		$tagLine='Tractor bookig approved by you';
		$details='Hello '.$owner_name.',<br>Your tractor booked sucessfully on date '.$booking_date.' Id #'.$booking_id.' Details about tractor,applicant and tractor owner is given below :';

	     $siteLink = 'http://' . $_SERVER ['HTTP_HOST'];
        $this->SiteSetting = ClassRegistry::init('SiteSetting');
        $siteName = "TractoMandi Team";
        $loginLink = $siteLink . "/users/login";
        $loginLinkName = 'Login';

        $this->SiteSetting = ClassRegistry::init('SiteSetting');
      
        $senderEmail = $this->SiteSetting->getSettingValue('site_email');
		 
		 $find = array(
					'[TAGLINE]',
					'[DETAILS]',					
					
					//Customer
					'[NAME]',
					'[EMAIL]',
					'[MOBILE]',
					'[CUST_VILLAGE]',
					'[CUST_TALUKA]',
					'[CUST_CITY]',
					'[CUST_STATE]',
					'[CUST_ADDRESS]',
					//owner
					'[OWNER_NAME]',
					'[OWNER_EMAIL]',
					'[OWNER_MOBILE]',
					'[OWNER_VILLAGE]',
					'[OWNER_TALUKA]',
					'[OWNER_CITY]',
					'[OWNER_STATE]',
					'[OWNER_ADDRESS]',
					/*Tractor details*/
					'[TRACTOR_REGNO]',
					'[TRACTOR_BRAND]',
					'[TRACTOR_DESC]',
					'[TRACTOR_TYPE]',
					'[TRACTOR_MAKE]',
					'[TRACTOR_MODEL]',
					'[TRACTOR_COLOR]',
					'[TRACTOR_IMPLE]',
					'[TRACTOR_HORSE]',
					/*booking details*/
					'[BOOKED_FOR]',
					'[USAGE_TIME]',
					'[IMPLEMENT]',
					'[DESC]',
					'[REGARDS]',
					'[WORK_ADD]'
				);

				$replace = array(
				$tagLine,
				$details,
					
				//Customer
				$cust_name,
				$cust_email,
				$cust_mobile,
				$cust_village,
				$cust_taluka,
				$cust_city,
				$cust_state,
				$cust_address,
				//owner
				$owner_name,
				$owner_email,
				$owner_mob,
				$owner_village,
				$owner_taluka,
				$owner_city,
				$owner_state,
				$owner_address,
				/*Tractor details*/
				$tractor_regNo,
				$tractor_brand,
				$tractor_desc,
				$tractor_type,
				$tractor_make,
				$tractor_model,
				$tractor_color,
				$tractor_implement,
				$tractor_hrp,
				/*booking details*/
				$booking_date,
				$tractor_time,
				$tractor_work,
				$tractor_BookingDesc,
				$siteName	,
				$tractor_work_address
				);

       

       
        $tempatedata = ClassRegistry::init('EmailTemplate')->getTempateData($tempateID);
        $emailSubject = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['subject']);
        $emailContent = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['content']);

        if ($this->sendMailContent($receiverEmail, $senderEmail, $emailSubject,$emailContent)) {
            return 1;
        } else {
            return 0;
        }
    }
	
	/*****************************************************************************/
	
	   function sendOwnerAssignAcceptEmailCustomer($tempateID, $emailData = array(), $attachmentPath = null) {
		   (isset($emailData ['booking_id'])) ? $booking_id = $emailData ['booking_id'] : $booking_id = NULL;
			(isset($emailData ['EMAIL'])) ? $receiverEmail = $emailData ['EMAIL'] : $receiverEmail = NULL;
			
			//customer
			(isset($emailData ['NAME'])) ? $cust_name = $emailData ['NAME'] : $cust_name = NULL;
			(isset($emailData ['EMAIL'])) ? $cust_email = $emailData ['EMAIL'] : $cust_email = NULL;
			(isset($emailData ['MOBILE'])) ? $cust_mobile = $emailData ['MOBILE'] : $cust_mobile = NULL;
			(isset($emailData ['CUST_VILLAGE'])) ? $cust_village = $emailData ['CUST_VILLAGE'] : $cust_village = NULL;
			(isset($emailData ['CUST_TALUKA'])) ? $cust_taluka = $emailData ['CUST_TALUKA'] : $cust_taluka = NULL;
			(isset($emailData ['CUST_CITY'])) ? $cust_city = $emailData ['CUST_CITY'] : $cust_city = NULL;
			(isset($emailData ['CUST_STATE'])) ? $cust_state = $emailData ['CUST_STATE'] : $cust_state = NULL;
			(isset($emailData ['CUST_ADDRESS'])) ? $cust_address = $emailData ['CUST_ADDRESS'] : $cust_address = NULL;
			//owner
			(isset($emailData ['OWNER_NAME'])) ? $owner_name = $emailData ['OWNER_NAME'] : $owner_name = NULL;
			(isset($emailData ['OWNER_EMAIL'])) ? $owner_email = $emailData ['OWNER_EMAIL'] : $owner_email = NULL;
			(isset($emailData ['OWNER_MOBILE'])) ? $owner_mob = $emailData ['OWNER_MOBILE'] : $owner_mob = NULL;
			(isset($emailData ['OWNER_VILLAGE'])) ? $owner_village = $emailData ['OWNER_VILLAGE'] : $owner_village = NULL;
			(isset($emailData ['OWNER_TALUKA'])) ? $owner_taluka = $emailData ['OWNER_TALUKA'] : $owner_taluka = NULL;
			(isset($emailData ['OWNER_CITY'])) ? $owner_city = $emailData ['OWNER_CITY'] : $owner_city = NULL;
			(isset($emailData ['OWNER_STATE'])) ? $owner_state = $emailData ['OWNER_STATE'] : $owner_state = NULL;
			(isset($emailData ['OWNER_ADDRESS'])) ? $owner_address = $emailData ['OWNER_ADDRESS'] : $owner_address = NULL;
			//Tractor details
			(isset($emailData ['TRACTOR_REGNO'])) ? $tractor_regNo = $emailData ['TRACTOR_REGNO'] : $tractor_regNo = NULL;
			(isset($emailData ['TRACTOR_BRAND'])) ? $tractor_brand = $emailData ['TRACTOR_BRAND'] : $tractor_brand = NULL;
			(isset($emailData ['TRACTOR_DESC'])) ? $tractor_desc = $emailData ['TRACTOR_DESC'] : $tractor_desc = NULL;
			(isset($emailData ['TRACTOR_TYPE'])) ? $tractor_type = $emailData ['TRACTOR_TYPE'] : $tractor_type = NULL;
			(isset($emailData ['TRACTOR_MAKE'])) ? $tractor_make = $emailData ['TRACTOR_MAKE'] : $tractor_make = NULL;
			(isset($emailData ['TRACTOR_MODEL'])) ? $tractor_model = $emailData ['TRACTOR_MODEL'] : $tractor_model = NULL;
			(isset($emailData ['TRACTOR_COLOR'])) ? $tractor_color = $emailData ['TRACTOR_COLOR'] : $tractor_color = NULL;
			(isset($emailData ['TRACTOR_IMPLE'])) ? $tractor_implement = $emailData ['TRACTOR_IMPLE'] : $tractor_implement = NULL;
			(isset($emailData ['TRACTOR_HORSE'])) ? $tractor_hrp = $emailData ['TRACTOR_HORSE'] : $tractor_hrp = NULL;
			//Booking Details
			(isset($emailData ['BOOKED_FOR'])) ? $booking_date = $emailData ['BOOKED_FOR'] : $booking_date = NULL;
			(isset($emailData ['USAGE_TIME'])) ? $tractor_time = $emailData ['USAGE_TIME'] : $tractor_time = NULL;
			(isset($emailData ['IMPLEMENT'])) ? $tractor_work = $emailData ['IMPLEMENT'] : $tractor_work = NULL;
			(isset($emailData ['DESC'])) ? $tractor_BookingDesc = $emailData ['DESC'] : $tractor_BookingDesc = NULL;
			(isset($emailData ['WORK_ADDRESS'])) ? $tractor_work_address = $emailData ['WORK_ADDRESS'] : $tractor_work_address = NULL;
		$tagLine='Tractor bookig approved';
		$details='Hello '.$cust_name.',<br>Your booking completed  sucessfully on date '.$booking_date.' Id #'.$booking_id.' our team will contact you shortly. Details about tractor,applicant and tractor owner is given below :';

	     $siteLink = 'http://' . $_SERVER ['HTTP_HOST'];
        $this->SiteSetting = ClassRegistry::init('SiteSetting');
        $siteName = "TractoMandi Team";
        $loginLink = $siteLink . "/users/login";
        $loginLinkName = 'Login';

        $this->SiteSetting = ClassRegistry::init('SiteSetting');
        
        $senderEmail = $this->SiteSetting->getSettingValue('site_email');
		 
		 $find = array(
					'[TAGLINE]',
					'[DETAILS]',					
					
					
					//Customer
					'[NAME]',
					'[EMAIL]',
					'[MOBILE]',
					'[CUST_VILLAGE]',
					'[CUST_TALUKA]',
					'[CUST_CITY]',
					'[CUST_STATE]',
					'[CUST_ADDRESS]',
					//owner
					'[OWNER_NAME]',
					'[OWNER_EMAIL]',
					'[OWNER_MOBILE]',
					'[OWNER_VILLAGE]',
					'[OWNER_TALUKA]',
					'[OWNER_CITY]',
					'[OWNER_STATE]',
					'[OWNER_ADDRESS]',
					/*Tractor details*/
					'[TRACTOR_REGNO]',
					'[TRACTOR_BRAND]',
					'[TRACTOR_DESC]',
					'[TRACTOR_TYPE]',
					'[TRACTOR_MAKE]',
					'[TRACTOR_MODEL]',
					'[TRACTOR_COLOR]',
					'[TRACTOR_IMPLE]',
					'[TRACTOR_HORSE]',
					/*booking details*/
					'[BOOKED_FOR]',
					'[USAGE_TIME]',
					'[IMPLEMENT]',
					'[DESC]',
					'[REGARDS]',
					'[WORK_ADD]'
				);

				$replace = array(
				$tagLine,
				$details,
					
				//Customer
				$cust_name,
				$cust_email,
				$cust_mobile,
				$cust_village,
				$cust_taluka,
				$cust_city,
				$cust_state,
				$cust_address,
				//owner
				$owner_name,
				$owner_email,
				$owner_mob,
				$owner_village,
				$owner_taluka,
				$owner_city,
				$owner_state,
				$owner_address,
				/*Tractor details*/
				$tractor_regNo,
				$tractor_brand,
				$tractor_desc,
				$tractor_type,
				$tractor_make,
				$tractor_model,
				$tractor_color,
				$tractor_implement,
				$tractor_hrp,
				/*booking details*/
				$booking_date,
				$tractor_time,
				$tractor_work,
				$tractor_BookingDesc,
				$siteName	,
				$tractor_work_address
				);

       

       
        $tempatedata = ClassRegistry::init('EmailTemplate')->getTempateData($tempateID);
        $emailSubject = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['subject']);
        $emailContent = str_replace($find, $replace, $tempatedata ['EmailTemplate'] ['content']);

        if ($this->sendMailContent($receiverEmail, $senderEmail, $emailSubject,$emailContent)) {
            return 1;
        } else {
            return 0;
        }
    }	
}	

   




