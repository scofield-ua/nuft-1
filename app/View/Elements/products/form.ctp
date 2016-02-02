<?php
echo $this->Form->create('Product', [
    'type' => 'post',
    'class' => 'form',
    'inputDefaults' => [                            
        'div' => 'form-group',
        'class' => 'form-control'
    ]
]);

echo $this->Form->input('title', ['label' => 'Назва']);
echo $this->Form->input('price', ['label' => 'Ціна']);
echo $this->Form->submit($submit_text, ['class' => 'btn btn-primary']);

echo $this->Form->end();    

echo "<hr>";

echo $this->Session->flash();