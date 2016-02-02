<?php
class Routing extends AppModel {
	
	public $useTable = "routing";
	
	public $belongsTo = [
		'Driver' => [
			'className' => 'Driver'
		],
		'Car' => [
			'className' => 'Car'
		],
		'Invoice' => [
			'className' => 'Invoice'
		],
	];
}
