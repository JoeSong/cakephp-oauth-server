<?php

App::uses('OAuthAppModel', 'OAuth.Model');

/**
 * AccessToken Model
 *
 * @property OAuthServerClient $OAuthServerClient
 * @property User $User
 */
class AccessToken extends OAuthAppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'oauth_token';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'oauth_token';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'oauth_token' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
			'isUnique' => array(
				'rule' => array('isUnique'),
			)
		),
		'client_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
		'user_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
		'expires' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
	);

	public $actsAs = array(
		'OAuth.HashedField' => array(
			'fields' => 'oauth_token',
		),
	);

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'OAuthServerClient' => array(
			'className' => 'OAuth.OAuthServerClient',
			'foreignKey' => 'client_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
