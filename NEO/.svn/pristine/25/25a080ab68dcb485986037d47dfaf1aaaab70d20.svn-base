<?php

App::uses('AppModel', 'Model');


/**
 * User Model
 */
class User extends AppModel {

 public $name = 'User';
    /**
     * Validation rules
     *
     * @var array
     */
    // defining server side validation
    public $validate = array(
        'name' => array(
            'valide1' => array(
                'rule' => 'notempty',
                'message' => 'Please enter Name.'
            ),
            'valide2' => array(
                'rule' => array(
                    'minLength',
                    2
                ),
                'message' => 'Name should be of minimum 2 digits.'
            ),
            'valide3' => array(
                'rule' => array(
                    'maxLength',
                    50
                ),
                'message' => 'Name should be of maximum 50 digits.'
            ),
            'valide4' => array(
                'rule' => '|^[a-zA-Z. ]*$|',
                'message' => 'Name should contain only alphabets.'
            )
        ),
       'email' => array(
			'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Please enter email',
            ),			
           /* 'email' => array(
                'rule' => array('email', true),
                'message' => 'Please enter valid email',
            ),*/
			'isUnique' => array(
			'rule' => array('isUnique', array('email','is_deleted'=>BOOL_FALSE), false),
			'message' => 'Email already exists.'
			)
			),
        'password' => array(
            'valide1' => array(
                'rule' => 'notempty',
                'message' => 'Please enter your password.'
            ),
            'valide2' => array(
                'rule' => array(
                    'minLength',
                    2
                ),
                'message' => 'Password should be of minimum 6 digits.'
            ),
            
        ),
	
        'address' => array(
            'valide1' => array(
                'rule' => 'notempty',
                'message' => 'Please enter your address.'
            ),
            'valide2' => array(
                'rule' => '/^[a-z0-9_\.\,\/\-\'\\r\n ]+$/i',
                'message' => 'Address must contain only letters, numbers, or underscore.'
            )
		
        ),
		'gender' => array(
            'valide1' => array(
                'rule' => 'notempty',
                'message' => 'Please Select Gender.'
            )
		
        ),
	
        
     
		'city' => array(
            'valide1' => array(
                'rule' => 'notempty',
                'message' => 'Please select District.'
              )           
		),
        
       'state' => array(
            'valide1' => array(
                'rule' => 'notempty',
                'message' => 'Please select state.'
              )           
		),

		
    );
	
	function beforeFilter()
   {
     parent::beforeFilter();
     $this->Auth->allow('*');
   }
	
	/**
	 * Checks to see if the username is already taken.
	 * @return boolean
	 */
	function beforeValidate($options = Array()) {
	
	    return true;
	}

	
    public $actsAs = array(
        'Captcha' => array(
            'field' => array('captcha'),
            'error' => 'Incorrect captcha code value'
        )
    );
    // The Associations below have been created with all possible keys, those that are not needed can be removed
    /**
     * belongsTo associations
     *
     * @var array
     */
	
    public $belongsTo = array(
	/* 'State' => array(
            'className' => 'State',
            'foreignKey' => 'state'
        ),
		'City' => array(
            'className' => 'City',
            'foreignKey' => 'city'
        ),
		'Taluka' => array(
            'className' => 'Taluka',
            'foreignKey' => 'taluka'
        ),
		'Village' => array(
            'className' => 'Village',
            'foreignKey' => 'village'
        ), 
        
		 'Society' => array(
            'className' => 'Society',
            'foreignKey' => 'society_id'			
        )*/
		'Role' => array(
            'className' => 'Role',
            'foreignKey' => 'role_id'			
        ),
    );
    

    // declare virtual fields
    function __construct($id = false, $table = null, $ds = null) {
        parent::__construct($id, $table, $ds);
        $this->virtualFields['name'] = sprintf('CONCAT(%s.name, " ")', $this->alias);
    }

    // before save callback

    public function beforeSave($options = array()) {
		
		parent::beforeSave($options);		
			
		if (isset($this->data[$this->alias]['password'])) 
		{
        	$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
    	}
        return true;
	}
     

	/*
	
	/*public function beforeSave($options = array()) {
	parent::beforeSave($options);
	if (!empty($this->data[$this->alias]['new_password'])) {
		$PasswordHasher = new SimplePasswordHasher(); // or add array('hashType' => '...') to overwrite default "sha1" type
		$this->data[$this->alias]['password'] = $PasswordHasher->hash($this->data[$this->alias]['new_password']);
	}
	return true;
	}
	*/

		
    /**
     * getUserData() function used to get data from user table
     */
    function getUserData($type = null, $conditions = null, $fields = null, $contain = null, $order = null, $group = null, $recursive = null, $limit = null, $offset = null) {
        $userData = $this->find($type, array(
            'conditions' => $conditions,
            'fields' => $fields,
            'contain' => $contain,
            'order' => $order,
            'group' => $group,
            'recursive' => $recursive,
            'limit' => $limit,
            'offset' => $offset
        ));
        return $userData;
    }
	
	
	
	/**
     * Generate a random pronounceable password
     */
    function generatePassword($length = 10) {
        // Seed
        srand((double) microtime()*1000000);
        
        $vowels = array('a', 'e', 'i', 'o', 'u');
        $cons = array('b', 'c', 'd', 'g', 'h', 'j', 'k', 'l', 'm', 'n',
            'p', 'r', 's', 't', 'u', 'v', 'w', 'tr',
            'cr', 'br', 'fr', 'th', 'dr', 'ch', 'ph',
            'wr', 'st', 'sp', 'sw', 'pr', 'sl', 'cl');
        
        $num_vowels = count($vowels);
        $num_cons = count($cons);
        
        $password = '';
        for ($i = 0; $i < $length; $i++){
            $password .= $cons[rand(0, $num_cons - 1)] . $vowels[rand(0, $num_vowels - 1)];
        }
        
        return substr($password, 0, $length);
    }
		
		/********** Get Latitude  and Logitutde From Database*********/
		/*public function findSortedByDistanse($long, $lat)
		{
			$distanceValue = "calc_distance($lat, $long, User.lat, User.lon)";
			$this->virtualFields['address'] = $distanceValue;
			return $this->find('all', array('conditions' => array(
				'order' => 'User.address ASC'
			)));
			
			$distanceValue = "3956 * 2 * ASIN(SQRT(POWER(SIN(({$lat}-abs(User.lat))*pi()/180/2),2)+COS({$lat} * pi()/180)*COS(abs(User.lat) *  pi()/180)*POWER(SIN(({$long} - User.lon)*pi()/180 / 2), 2)))";
		}*/
		
		
		
		
}