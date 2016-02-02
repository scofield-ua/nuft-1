<?php
echo $this->Form->create('Routing', [
    'type' => 'post',
    'class' => 'form',
    'inputDefaults' => [                            
        'div' => 'form-group',
        'class' => 'form-control'
    ]
]);

echo $this->Form->input('driver_id', ['label' => 'Водій', 'options' => $drivers]);
echo $this->Form->input('car_id', ['label' => 'Автомобіль', 'options' => $cars]);
echo $this->Form->input('invoice_id', ['label' => 'Накладна', 'options' => $invoices]);
echo $this->Form->input('address', ['label' => 'Адреса']);
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