<?php
class Customer extends AppModel {
    
    public $validate = [
        'title' => [
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
        ],
    ];
    
    function getList() {
        return $this->find('list', [
            'fields' => ['id', 'title'],
            'order' => 'title ASC'
        ]);
    }
}