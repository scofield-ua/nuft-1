<?php
class Contract extends AppModel {
    
    public $belongsTo = [
        'Customer' => [
            'className' => 'Customer'
        ]
    ];
    
    public $validate = [
        'sum' => [
            'rule' => 'notBlank',
            'message' => 'Поле не може бути пустим'
        ],
        'date' => [
            'rule' => 'notBlank',
            'message' => 'Поле не може бути пустим'
        ],
    ];
}