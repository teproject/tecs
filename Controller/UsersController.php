<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController {
	
	var $name = 'Users';
	var $uses = array('User');
	
	public function beforeFilter(){
		parent::beforeFilter();
	}
	
	public function isAuthorized($user = null){
		$isAuthorized = false;
		
		if($this->action == 'login'
			|| $this->action == 'logout'){
				$isAuthorized = true;
		} else if (parent::loggedIn() && parent::isAdmin()){
			if ($this->action == 'view' 
				|| $this->action == 'add'
				|| $this->action == 'edit'
				|| $this->action == 'delete'
				|| $this->action == 'activate'
				|| $this->action == 'index'){
					$isAuthorized = true;
			}
		} else {
			$isAuthorized = parent::isAuthorized($user);
		}
		return $isAuthorized;
	}
	
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

	public function view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
	}

	public function edit($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
	}

	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function sign_up() {
		$this->set('title_for_layout', 'Sign Up');
		if ($this->request->is('post')) {				//if user has submitted sign up information:
			$this->User->create();							//create a new record
			if ($this->User->save($this->request->data)) {	//attempt to save new record; if successful:
				$this->Session->setFlash(__(
					'Thank you for your interest in our website. We will inform you via email once your account has been activated.'
				));
				$this->redirect($this->Auth->redirect());		//redirect
			} else {										//otherwise:
				$this->request->data['User']['password'] = '';	//clear password (to prevent the hash from being displayed back to the user)
				$this->Session->setFlash(__('We were unnable to create your account. Please, try again.'));	//prompt user to try again
			}
		}
	}
	
	public function login() {
		$this->set('title_for_layout', 'Login');
		
		//do not allow users to log in repeatedly:
		if ($this->Auth->user()){
			$this->Session->setFlash(__('You have already logged in.'));
			$this->redirect(array('controller' => 'pages', 'action' => 'display', 'home'));
		}
		//if user has not logged in yet, handle their POST authorization request:
		else if($this->request->is('post')){
			if($this->Auth->login()){
				$this->Session->setFlash(__('You have logged in successfully!'));
				return $this->redirect($this->Auth->redirect());
			}
			else{
				$this->Session->setFlash(__('The email or password you entered is incorrect. Please try agian:'));
			}
		}
	}
	
	public function logout() {
		$this->redirect($this->Auth->logout());
	}

	public function activate($id = null) {
		if($this->loggedIn() && $this->isAdmin()){
			if($id){
				$user = $this->User->read(null, $id);
				if ($user){
					$this->User->set(array('activated' => 'Yes'));
					$this->User->save();
					$this->Session->setFlash($user['User']['name'] . "'s account has been activated successfully. An email notification has been sent to ".$user['User']['email']);
					$this->redirect(array('action' => 'index'));
				}
			} else {
				$this->Session->setFlash(__('Please supply a valid user id.'));
				$this->redirect(array('action' => 'index'));
			}
		} else {
			$this->Session->setFlash(__('You are not authorized to activate user accounts.'));
			$this->redirect(array('controller' => 'pages', 'action' => 'display', 'home'));
		}
	}	
}
