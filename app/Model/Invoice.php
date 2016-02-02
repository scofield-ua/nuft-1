<?php
class Invoice extends AppModel {
    
	public $belongsTo = [
		'Product' => [
			'className' => 'Product'
		],
		'Customer' => [
			'className' => 'Customer'
		]
	];
	
	function getList() {
        return $this->find('list', [
            'fields' => ['id'],
            'order' => 'id DESC'
        ]);
    }
}