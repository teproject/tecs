<?php
App::uses('AppModel', 'Model');

class News extends AppModel {

	public $displayField = 'title';

	public $name = 'News';
	
	public $actsAs = array(
		'UploadPack.Upload' => array(
			'photo' => array(
				'styles' => array(
					'medium' => '170x125'
				)
			)
		)
	);
	
	public $validate = array(
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please type a title for this news item.',
				'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'content' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter the content for this news item.',
				'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'photo' => array(
			'attachmentPresence' => array(
				'rule' => array('attachmentPresence'),
				'message' => 'Please choose an image for this news item.'
			),
			'fileType' => array(
				'rule' => array('attachmentContentType', array(
					'image/jpeg', 
					'image/gif',
					'image/png')),
				'message' => 'Please choose an image of type JPEG, GIF, or PNG.'
			),
			'maxSize' => array(
				'rule' => array('attachmentMaxSize', 409600),
				'message' => 'Please choose an image smaller than 400 KB.'
			)
		),
		'published' => array(
			'inList' => array(
				'rule' => array('inList', array('Yes', 'No')),
				'message' => 'Please choose whether to publish this article.',
				'allowEmpty' => false,
				'required' => true
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
	
	public function beforeValidate(){
	
	}
	
	public function getLatest(){
		return $this->find('all', array(
			'oder' => array('News.id ASC'),
			'limit' => 6
		));
	}
}
