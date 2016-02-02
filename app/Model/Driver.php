<?php
class Driver extends AppModel {
    
    public $validate = [
        'name' => [
            'rule' => 'notBlank',
            'message' => 'Поле не може бути пустим'
        ],
        'address' => [
            'rule' => 'notBlank',
            'message' => 'Поле не може бути пустим'
        ],
        'tel' => [
            'rule' => 'notBlank',
            'message' => 'Поле не може бути пустим'
        ]
    ];
	
	function getList() {
        return $this->find('list', [
            'fields' => ['id', 'name'],
            'order' => 'name ASC'
        ]);
    }
}