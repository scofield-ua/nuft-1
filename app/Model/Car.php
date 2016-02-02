<?php
class Car extends AppModel {
	
	public $virtualFields = [
		'model_number' => 'CONCAT(Car.model, " - ", Car.number)'
	];
    
    public $validate = [
        'model' => [
            'rule' => 'notBlank',
            'message' => 'Поле не може бути пустим'
        ],
        'number' => [
            'rule' => 'notBlank',
            'message' => 'Поле не може бути пустим'
        ],
    ];
	
	function getList() {
        return $this->find('list', [
            'fields' => ['id', 'model_number'],
            'order' => 'model_number ASC'
        ]);
    }
}