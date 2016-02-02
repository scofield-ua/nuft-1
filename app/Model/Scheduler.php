<?php
class Scheduler extends AppModel {
	public $useTable = "transportations_schedule";
	
	public $belongsTo = [
		'Product' => [
			'className' => 'Product'
		],
		'Customer' => [
			'className' => 'Customer'
		]
	];
}