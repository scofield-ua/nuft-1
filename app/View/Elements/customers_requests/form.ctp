<?php
echo $this->Form->create('CustomerRequest', [
    'type' => 'post',
    'class' => 'form',
    'inputDefaults' => [                            
        'div' => 'form-group',
        'class' => 'form-control'
    ]
]);

echo $this->Form->input('customer_id', ['label' => 'Замовник', 'options' => $customers]);
echo $this->Form->input('product_id', ['label' => 'Продукти', 'options' => $products]);
echo $this->Form->input('amount', ['label' => 'Кількість']);
echo $this->Form->input('date', ['label' => 'Дата', 'type' => 'text', 'data-type' => 'calendar-time']);
echo $this->Form->submit($submit_text, ['class' => 'btn btn-primary']);

echo $this->Form->end();

echo "<hr>";

echo $this->Session->flash();

$this->start('scripts');
    echo $this->Html->script([
        'plugins/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min',
        '/node_modules/moment/locale/uk',
        'plugins/bootstrap-datetimepicker/build/js/setup',
    ]);
$this->end();

$this->start('css');
    echo $this->Html->css([
        '/js/plugins/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min',
    ]);
$this->end();