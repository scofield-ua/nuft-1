<?php
    $this->start('page_title');
    echo "Редагувати авто";
    $this->end();

    $this->start('breadcrumb');
    echo $this->element('parts/breadcrumb', [
        'items' => [
            '/cars' => 'Водії',
            '/cars/edit/'.$car['Car']['id'] => $this->fetch('page_title'),
        ]
    ]);
    $this->end();

    echo $this->element('cars/form', ['submit_text' => 'Оновити']);
?>