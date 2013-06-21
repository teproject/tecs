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
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {	
	public $components = array(
		'DebugKit.Toolbar',
		'Session',
		'Auth' => array(
			'loginAction' => array(
				'controller' => 'users',
				'action' => 'login'
			),
			'authError' => 'You do not have permission to access this feature.',
			'authenticate' => array(
				'Form' => array(
					'fields' => array(
						'username' => 'email',
						'password' => 'password'
					)
				)
			),
			'authorize' => 'Controller',	// handle authorization through the controller's isAuthorized() function
			'loginRedirect' => '/news'
		)
	);		

	var $helpers = array('Form', 'UploadPack.Upload');
	
	// permits access if the authenticated user is an administrator:
	public function isAuthorized($user) {
		$isAuthorized = false;
		// Admin can access every action
		if ($this->isAdmin()) {
			$isAuthorized = true;
		} else {	// deny non-admins by default:
			$isAuthorized = false;
		}
		return $isAuthorized;
	}
	
	public function beforeFilter(){
		//determine user authentication and administrative status for all views:
		$this->set('loggedIn', $this->loggedIn());
		$this->set('isAdmin', $this->isAdmin());
	}
	
	// returns 'true' when the current user has authenticated, and 'false' otherwise:
	protected function loggedIn() {
		return $this->Auth->loggedIn();
	}
	
	// returns 'true' when the currently authenticated user is an administrator, and 'false' otherwise:
	protected function isAdmin() {
		if($this->loggedIn()){
			return (bool)($this->Auth->user('group') == 'Administrator');
		}
		return false;
	}
}
