<?php
    $this->start('page_title');
    echo "Додати автомобіль";
    $this->end();

    $this->start('breadcrumb');
    echo $this->element('parts/breadcrumb', [
        'items' => [
            '/cars' => 'Водії',
            '/cars/add' => $this->fetch('page_title'),
        ]
    ]);
    $this->end();

    echo $this->element('cars/form', ['submit_text' => 'Додати']);
?>