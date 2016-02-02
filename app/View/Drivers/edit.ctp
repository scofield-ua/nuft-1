<?php
    $this->start('page_title');
    echo "Редагувати водія";
    $this->end();

    $this->start('breadcrumb');
    echo $this->element('parts/breadcrumb', [
        'items' => [
            '/drivers' => 'Водії',
            '/drivers/edit/'.$driver['Driver']['id'] => $this->fetch('page_title'),
        ]
    ]);
    $this->end();

    echo $this->element('drivers/form', ['submit_text' => 'Оновити']);
?>