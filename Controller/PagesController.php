<?php

App::uses('AppController', 'Controller');

class PagesController extends AppController {

	public $name = 'Pages';

	public $uses = array();
	
/*	public function isAuthorized($user){
		if($this->action == 'display'){
			return true;
		}
		return false;
	}
*/	
	public function display() {
		$path = func_get_args();
		$layout = 'default';
		$count = count($path);
		if (!$count) {
			$this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		if($page == 'home'){
			// load base layout:
			$layout = 'base';
			
			// grab latest news:
			$this->loadModel('News');
			$this->set('news', $this->News->getLatest());
			
			// grab published slides:
			$this->loadModel('Slide');
			$this->set('slides', $this->Slide->getPublished());
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));
		$this->render(implode('/', $path), $layout);
	}
	
	public function add() {
		debug($this->request->data);die;
		if ($this->request->is('post')) {
			$this->Page->create();
			if ($this->Page->save($this->request->data)) {
				$this->Session->setFlash(__('The page has been saved.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The page could not be saved. Please, try again.'));
			}
		}
	}
	
	public function edit($id = null) {
		if($id == null) 
			$this->redirect(array('action' => 'display', 'home'));
		
		$this->Page->id = $id;
		if (!$this->Page->exists()) {
			throw new NotFoundException(__('Invalid page requested.'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Page->save($this->request->data)) {
				$this->Session->setFlash(__('The page has been saved.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The page could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->News->read(null, $id);
		}
	}
}
