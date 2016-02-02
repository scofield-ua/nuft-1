<?php
App::uses('Controller', 'Controller');
App::uses('CrudControllerTrait', 'Crud.Lib');

class AppController extends Controller {

	use CrudControllerTrait;

/**
 * List of global controller components
 *
 * @var array
 */
	public $components = [
		'RequestHandler',
		'Session',
		'Crud.Crud' => [
			'listeners' => [
				'Crud.Api',
				'Crud.ApiPagination',
				'Crud.ApiQueryLog'
			]
		],
		'Paginator' => ['settings' => ['paramType' => 'querystring', 'limit' => 30]],
        'Auth' => [
			'authenticate' => [
				'Form' => [
					'fields' => ['username' => 'email', 'password' => 'password'],
                    'passwordHasher' => [
                        'className' => 'Simple',
                        'hashType' => 'sha256'
                    ]
				],
			],
            'loginAction' => [
                'controller' => 'users',
                'action' => 'login',
            ],
            'logoutRedirect' => '/admin/users/login',
            'loginRedirect' => '/',
        ],
	];

}
