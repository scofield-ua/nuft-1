<?php
    $this->start('page_title');
    echo "Додати маршрут";
    $this->end();

    $this->start('breadcrumb');
    echo $this->element('parts/breadcrumb', [
        'items' => [
            '/routings' => 'Маршрутний лист',
            '/routings/add' => $this->fetch('page_title'),
        ]
    ]);
    $this->end();

    echo $this->element('routings/form', ['submit_text' => 'Додати']);
?>