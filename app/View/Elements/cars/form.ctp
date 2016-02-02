<?php
echo $this->Form->create('Car', [
    'type' => 'post',
    'class' => 'form',
    'inputDefaults' => [                            
        'div' => 'form-group',
        'class' => 'form-control'
    ]
]);

echo $this->Form->input('model', ['label' => 'Модель']);
echo $this->Form->input('number', ['label' => 'Автономер']);
echo $this->Form->submit($submit_text, ['class' => 'btn btn-primary']);

echo $this->Form->end();    

echo "<hr>";

echo $this->Session->flash();