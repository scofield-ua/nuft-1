<?php
class CustomerRequest extends AppModel {
	
	public $useTable = "customers_requests";
	
	public $belongsTo = [
        'Customer' => [
            'className' => 'Customer'
        ],
		'Product' => [
			'className' => 'Product'
		],
    ];
}
