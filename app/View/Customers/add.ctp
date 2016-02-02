<?php
    $this->start('page_title');
    echo "Додати замовника";
    $this->end();

    $this->start('breadcrumb');
    echo $this->element('parts/breadcrumb', [
        'items' => [
            '/customers' => 'Замовники',
            '/customers/add' => $this->fetch('page_title'),
        ]
    ]);
    $this->end();

    echo $this->element('customers/form', ['submit_text' => 'Додати']);
?>