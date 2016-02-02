<?php
    $this->start('page_title');
    echo "Додати водія";
    $this->end();

    $this->start('breadcrumb');
    echo $this->element('parts/breadcrumb', [
        'items' => [
            '/drivers' => 'Водії',
            '/drivers/add' => $this->fetch('page_title'),
        ]
    ]);
    $this->end();

    echo $this->element('drivers/form', ['submit_text' => 'Додати']);
?>