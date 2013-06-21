<?php
App::uses('AppController', 'Controller');
class UploadsController extends AppController {

	public function beforeFilter(){
		parent::beforeFilter();
		if(parent::isAdmin())
			$this->layout = 'file-index';
		if($this->isAuthorized($this->Auth->user()))
			$this->Auth->allow($this->action);
	}
	
	public function isAuthorized($user){
		if(parent::loggedIn() && $this->action == 'index'){
			return true;
		} else {
			return parent::isAuthorized($user);
		}
	}

	public function index() {
		if(parent::isAdmin()){
			$this->Upload->bindModel(array('hasOne' => array('UploadsUser')), false);
			$this->paginate = array(
				'fields' => array(
					'DISTINCT Upload.id', 'Upload.user_id', 'Upload.title', 
					'Upload.description', 'Upload.filename', 'Upload.modified'),
				'contain' => array('Owner.name', 'SharedUser.name'),
			);
			$this->set('uploads', $this->paginate());
		} else if(parent::loggedIn()) {
			$this->Upload->bindModel(array('hasOne' => array('UploadsUser')), false);
			$this->paginate = array(
				'fields' => array(
					'DISTINCT Upload.id', 'Upload.user_id', 'Upload.title', 
					'Upload.description', 'Upload.filename', 'Upload.modified'),
				'contain' => array('Owner.name', 'SharedUser.name', 'UploadsUser'),
				'conditions' => array('UploadsUser.user_id' => $this->Auth->user('id'))
			);
			$this->set('uploads', $this->paginate());
		} else {
			$this->Session->setFlash('You do not have permission to access this feature.');
			$this->redirect();
		}
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Upload->create();
			if ($this->uploadFile() && $this->Upload->save($this->request->data)) {
				$this->Session->setFlash(__('The upload has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The upload could not be saved. Please, try again.'));
			}
		}
		$users = $this->Upload->Owner->find('list');
		$this->set(compact('users', 'users'));
	}

	public function edit($id = null) {
		$this->Upload->id = $id;
		if (!$this->Upload->exists()) {
			throw new NotFoundException(__('Invalid upload'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Upload->save($this->data)) {
				$this->Session->setFlash(__('The upload has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The upload could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Upload->read(null, $id);
		}
		$users = $this->Upload->User->find('list');
		$this->set(compact('users', 'users'));
	}

	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Upload->id = $id;
		if (!$this->Upload->exists()) {
			throw new NotFoundException(__('Invalid upload'));
		}
		if ($this->Upload->delete() && unlink(APP.'uploads'.DS.$id)) {	// delete the db record AND the file
			$this->Session->setFlash(__('Upload deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Upload was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	function uploadFile() {
		$file = $this->data['Upload']['file'];
		if ($file['error'] === UPLOAD_ERR_OK) {
			$id = String::uuid();
			if (move_uploaded_file($file['tmp_name'], APP.'uploads'.DS.$id)) {
				$this->request->data['Upload']['id'] = $id;
				$this->request->data['Upload']['user_id'] = $this->Auth->user('id');
				$this->request->data['Upload']['filename'] = $file['name'];
				$this->request->data['Upload']['filesize'] = $file['size'];
				$this->request->data['Upload']['filemime'] = $file['type'];
				return true;
			}
		}
		return false;
	}
	
	function download($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for upload', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Upload->bindModel(array('hasOne' => array('UploadsUser')));
		$upload = $this->Upload->find('first', array(
			'conditions' => array(
				'Upload.id' => $id,
				'OR' => array(
					'UploadsUser.user_id' => $this->Auth->user('id'),
					'Upload.user_id' => $this->Auth->user('id'),
				),
			)
		));
		if (!$upload) {
			$this->Session->setFlash(__('Invalid id for upload', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->viewClass = 'Media';
		$filename = $upload['Upload']['filename'];
		$this->set(array(
			'id' => $upload['Upload']['id'],
			'name' => substr($filename, 0, strrpos($filename, '.')),
			'extension' => substr(strrchr($filename, '.'), 1),
			'path' => APP.'uploads'.DS,
			'download' => true,
		));
	}
}
