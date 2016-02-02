<?php
echo $this->Form->create('Driver', [
    'type' => 'post',
    'class' => 'form',
    'inputDefaults' => [                            
        'div' => 'form-group',
        'class' => 'form-control'
    ]
]);

echo $this->Form->input('name', ['label' => 'ПІБ']);
echo $this->Form->input('address', ['label' => 'Адреса']);
echo $this->Form->input('tel', ['label' => 'Моб. телефон']);
echo $this->Form->submit($submit_text, ['class' => 'btn btn-primary']);

echo $this->Form->end();    

echo "<hr>";

echo $this->Session->flash();