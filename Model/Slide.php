<?php
App::uses('AppModel', 'Model');
class Slide extends AppModel {

	public $displayField = 'title';

	public $actsAs = array(
		'UploadPack.Upload' => array(
			'photo' => array(
				'styles' => array(
					'thumb' => '310x115',
					'slide' => '650x240'
				)
			)
		)
	);
	
	public $validate = array(
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please choose a title for this slide.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'photo' => array(
			'attachmentPresence' => array(
				'rule' => array('attachmentPresence'),
				'message' => 'Please choose an image for this slide.'
			),
			'fileType' => array(
				'rule' => array('attachmentContentType', array(
					'image/jpeg', 
					'image/gif',
					'image/png')),
				'message' => 'Please choose an image of type JPEG, GIF, or PNG.'
			),
			'maxSize' => array(
				'rule' => array('attachmentMaxSize', 1048576),
				'message' => 'Please choose an image smaller than 1 MB.'
			),
		),
		'link' => array(
			'url' => array(
				'rule' => array('url'),
				'message' => 'Please enter a valid URL address.',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'order' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'published' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Would you like to publsih this slide?',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'created_by' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'modified_by' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	
	public function getPublished(){
		return $this->find('all', array(
			'order' => array('Slide.created ASC'),
			'conditions' => array(
				'Slide.published' => 'Yes'
			)				
		));
	}
}
