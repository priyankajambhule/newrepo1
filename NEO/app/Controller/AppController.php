<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $helpers = array(
		'Form',
		'Html',
		'Js',
		'Time',
		'Encryption', //helper for encryption/decryption
		'Access',
		'Content',		
		'Common',		
	);
	
	public $components = array(
		'Session',
		'Cookie',
		'Encryption',
		'Access',
		'Email',
		'P28n',
		'Common',
		'DebugKit.Toolbar',
		'Auth' => array(
			'authenticate' => array(
				'Form' => array(
					'fields' => array('username' => 'email'),
					'scope' => array('User.is_active' => BOOL_TRUE, 'User.is_deleted' => BOOL_FALSE)
				)
			),
			'authorize' => 'Controller'
		),
		'RequestHandler',		
	);
	
	 public function beforeFilter() {
	
        // checking if the request is from admin or user		
        if (!empty($this->params ['admin'])) {
		
			$this->Auth->loginAction = array('controller' => 'managements', 'action' => 'login', 'admin' => true);
			$this->Auth->loginRedirect = array('controller' => 'managements', 'action' => 'dashboard', 'admin' => true);
			$this->Auth->logoutRedirect = array('controller' => 'managements', 'action' => 'login', 'admin' => true);
        } 
	 if (!empty($this->params ['compadmin'])) {
		
			$this->Auth->loginAction = array('controller' => 'pages', 'action' => 'login', 'compadmin' => false);
			$this->Auth->loginRedirect = array('controller' => 'companyadmins', 'action' => 'dashboard', 'compadmin' => true);
			$this->Auth->logoutRedirect = array('controller' => 'pages', 'action' => 'login', 'compadmin' => false);
        } 
		 if (!empty($this->params ['design'])) {
		
			$this->Auth->loginAction = array('controller' => 'pages', 'action' => 'login', 'design' => false);
			$this->Auth->loginRedirect = array('controller' => 'designdevelopments', 'action' => 'dashboard', 'design' => true);
			$this->Auth->logoutRedirect = array('controller' => 'pages', 'action' => 'login', 'design' => false);
        } 
		 if (!empty($this->params ['toolroom'])) {
		
			$this->Auth->loginAction = array('controller' => 'pages', 'action' => 'login', 'toolroom' => false);
			$this->Auth->loginRedirect = array('controller' => 'toolrooms', 'action' => 'dashboard', 'toolroom' => true);
			$this->Auth->logoutRedirect = array('controller' => 'pages', 'action' => 'login', 'toolroom' => false);
        } 
		 if (!empty($this->params ['hr'])) {
		
			$this->Auth->loginAction = array('controller' => 'pages', 'action' => 'login', 'hr' => false);
			$this->Auth->loginRedirect = array('controller' => 'hrs', 'action' => 'dashboard', 'hr' => true);
			$this->Auth->logoutRedirect = array('controller' => 'pages', 'action' => 'login', 'hr' => false);
        } 


        //set layout based on user session
        if ($this->Auth->user()) {
            /*$this->layout = 'front/inner';*/
			$this->layout = 'default';
        } 
        else {
            $this->layout = 'default';
        }

        $this->set('loginInfo', $this->Auth->user());						
		
    }	
	 

    public function isAuthorized($user = NULL) {
	
        // Any registered user can access public functions
        if (empty($this->request->params ['admin'])) {
            return true;
        }

        // Only admins can access admin functions
        if (isset($this->request->params ['admin'])) {
            return (bool) ($user ['Role'] ['name'] === 'Admin' || $user ['Role'] ['name'] === 'Co-Administrator');
        }

        // Default deny
        return false;
    }

	/**
     * Function : check_login
     * @access private
     * Description : Function for check user login
     * Date : 11th may 2015
     */
    function admin_check_login() {
        $logininfo = $this->Session->read('Auth');
        $user_id = $this->Session->read('Auth.User.id');
        if ($user_id == "") {
            $this->Session->delete('Auth');
            $this->redirect('/admin/');
        }
    }
	
	function compadmin_check_login() {
        $logininfo = $this->Session->read('Auth');
        $user_id = $this->Session->read('Auth.User.id');
        if ($user_id == "") {
            $this->Session->delete('Auth');
            $this->redirect('/compadmin/');
        }
    }
	function design_check_login() {
        $logininfo = $this->Session->read('Auth');
        $user_id = $this->Session->read('Auth.User.id');
        if ($user_id == "") {
            $this->Session->delete('Auth');
            $this->redirect('/design/');
        }
    }
	function toolroom_check_login() {
        $logininfo = $this->Session->read('Auth');
        $user_id = $this->Session->read('Auth.User.id');
        if ($user_id == "") {
            $this->Session->delete('Auth');
            $this->redirect('/toolroom/');
        }
    }
	function hr_check_login() {
        $logininfo = $this->Session->read('Auth');
        $user_id = $this->Session->read('Auth.User.id');
        if ($user_id == "") {
            $this->Session->delete('Auth');
            $this->redirect('/hr/');
        }
    }
}
