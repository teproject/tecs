<?php
App::uses('AppController', 'Controller');
class SlidesController extends AppController {


	public function index() {
		$this->Slide->recursive = 0;
		$this->set('slides', $this->paginate());
	}

	public function view($id = null) {
		$this->Slide->id = $id;
		if (!$this->Slide->exists()) {
			throw new NotFoundException(__('Invalid slide'));
		}
		$this->set('slide', $this->Slide->read(null, $id));
	}

	public function add() {
		if ($this->request->is('post')) {
			switch($this->data['action']){
				case 'cancel':
					$this->Session->setFlash(__('The slide was not saved.'));
					$this->redirect(array('action' => 'index'));
				case 'index':
					$this->redirect(array('action' => 'index'));
				default:
					$this->Slide->create();
					if ($this->Slide->save($this->request->data)) {
						$this->Session->setFlash(__('The slide has been saved'));
						$this->redirect(array('action' => 'index'));
					} else {
						$this->Session->setFlash(__('The slide could not be saved. Please, try again.'));
					}
			}
		}
	}

	public function edit($id = null) {
		$this->Slide->id = $id;
		if (!$this->Slide->exists()) {
			throw new NotFoundException(__('Invalid slide'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			switch($this->data['action']){
				case 'delete':
					$this->redirect(array('action' => 'delete', $id));
				case 'cancel':
					$this->redirect(array('action' => 'index'));
				case 'index':
					$this->redirect(array('action' => 'index'));
				case 'save':
					if ($this->Slide->save($this->request->data)) {
						$this->Session->setFlash(__('The slide has been saved'));
						$this->redirect(array('action' => 'index'));
					}
				default:
					$this->Session->setFlash(__('The slide could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Slide->read(null, $id);
		}
	}

	public function delete($id = null) {
		$this->Slide->id = $id;
		if (!$this->Slide->exists()) {
			throw new NotFoundException(__('Invalid slide'));
		}
		if ($this->Slide->delete()) {
			$this->Session->setFlash(__('Slide deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Slide was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
