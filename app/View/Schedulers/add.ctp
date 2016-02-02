<?php
    $this->start('page_title');
    echo "Додати графік перевезень";
    $this->end();

    $this->start('breadcrumb');
    echo $this->element('parts/breadcrumb', [
        'items' => [
            '/schedulers' => 'Графіки перевезень',
            '/schedulers/add' => $this->fetch('page_title'),
        ]
    ]);
    $this->end();

    echo $this->element('schedulers/form', ['submit_text' => 'Додати']);
?>