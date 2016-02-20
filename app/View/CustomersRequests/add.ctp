<?php
    $this->start('page_title');
    echo "Додати заявку";
    $this->end();

    $this->start('breadcrumb');
    echo $this->element('parts/breadcrumb', [
        'items' => [
            '/customers_requests' => 'Заявки',
            '/customers_requests/add' => $this->fetch('page_title'),
        ]
    ]);
    $this->end();

    echo $this->element('customers_requests/form', ['submit_text' => 'Додати']);
?>