<?php
App::uses('AppController', 'Controller');
class NewsController extends AppController {

	var $name = 'News';
	var $uses = array('News');

	public $paginate = array(
		'limit' => 4,
		'order' => array(
			'News.created' => 'asc' 
	));
	
	
	public function beforeFilter(){
		parent::beforeFilter();
		if($this->isAuthorized($this->Auth->user()))
			$this->Auth->allow($this->action);
		else $this->Auth->deny($this->action);
	}
	
	public function isAuthorized($user = null){
		$isAuthorized = false; 
		if($this->action == 'index' || $this->action == 'view') {
			$isAuthorized = true;
		} else if (parent::loggedIn()){ 
			if($this->action == 'add' 
				|| $this->action == 'delete' 
				|| $this->action == 'edit')
					$isAuthorized = true;
		} else {
			$isAuthorized = parent::isAuthorized($user);
		}
		return $isAuthorized;
	}
	
	public function index() {
		$this->News->recursive = 0;
		$this->set('news', $this->paginate('News'));
	}

	public function view($id = null) {
		$this->News->id = $id;
		if (!$this->News->exists()) {
			throw new NotFoundException(__('Invalid news'));
		}
		$this->set('news', $this->News->read(null, $id));
	}

	public function add() {
		if ($this->request->is('post')) {
			switch($this->data['action']){
				case 'cancel':
					$this->Session->setFlash(__('The news item was not saved.'));
					$this->redirect(array('action' => 'index'));
				case 'index':
					$this->redirect(array('action' => 'index'));
				case 'save':
					// hash file name:
					if(!empty($this->request->data['News']['photo']['name'])) {
						$fileInfo = pathinfo($this->request->data['News']['photo']['name']);
						$this->request->data['News']['photo']['name'] = Security::hash($fileInfo['filename']).'.'.$fileInfo['extension'];
					}
					$this->News->create();
					if ($this->News->save($this->request->data)) {
						$this->Session->setFlash(__('The news has been saved'));
						$this->redirect(array('action' => 'index'));
					} 
				default:
					$this->Session->setFlash(__('The news could not be saved. Please, try again.'));
			}
		}
	}

	public function edit($id = null) {
		$this->News->id = $id;

		if (!$this->News->exists()) {
			throw new NotFoundException(__('Invalid news article.'));
		}
		
		if ($this->request->is('post') || $this->request->is('put')) {
			switch($this->data['action']){
				case 'delete':
					$this->redirect(array('action' => 'delete', $id));
				case 'cancel':
					$this->Session->setFlash(__('Changes to the article were not saved.'));
					$this->redirect(array('action' => 'index'));
				case 'index':
					$this->redirect(array('action' => 'index'));
				case 'save':
					// hash file name:
					if(!empty($this->request->data['News']['photo']['name'])) {
						$fileInfo = pathinfo($this->request->data['News']['photo']['name']);
						$this->request->data['News']['photo']['name'] = Security::hash($fileInfo['filename']).'.'.$fileInfo['extension'];
					}
					if ($this->News->save($this->request->data)) {
						$this->Session->setFlash(__('The news article has been updated.'));
						$this->redirect(array('action' => 'index'));
					}
				default:
					$this->Session->setFlash(__('The news could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->News->read(null, $id);
		}
	}

	public function delete($id = null) {
		$this->News->id = $id;
		if (!$this->News->exists()) {
			throw new NotFoundException(__('Invalid news article.'));
		}
		if ($this->News->delete()) {
			$this->Session->setFlash(__('The news article was deleted.'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The news article was not deleted.'));
		$this->redirect(array('action' => 'index'));
	}
}
