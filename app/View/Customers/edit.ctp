<?php
    $this->start('page_title');
    echo "Редагувати замовника";
    $this->end();

    $this->start('breadcrumb');
    echo $this->element('parts/breadcrumb', [
        'items' => [
            '/customers' => 'Замовники',
            '/customers/edit/'.$customer['Customer']['id'] => $this->fetch('page_title'),
        ]
    ]);
    $this->end();

    echo $this->element('customers/form', ['submit_text' => 'Оновити']);
?>