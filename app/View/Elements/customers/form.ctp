<?php
echo $this->Form->create('Customer', [
    'type' => 'post',
    'class' => 'form',
    'inputDefaults' => [                            
        'div' => 'form-group',
        'class' => 'form-control'
    ]
]);

echo $this->Form->input('title', ['label' => 'Назва підприємства']);
echo $this->Form->input('address', ['label' => 'Адреса']);
echo $this->Form->input('tel', ['label' => 'Телефон']);
echo $this->Form->submit($submit_text, ['class' => 'btn btn-primary']);

echo $this->Form->end();    

echo "<hr>";

echo $this->Session->flash();