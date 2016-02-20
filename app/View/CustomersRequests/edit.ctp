<?php
    $this->start('page_title');
    echo "Редагувати заявку";
    $this->end();

    $this->start('breadcrumb');
    echo $this->element('parts/breadcrumb', [
        'items' => [
            '/customers_requests' => 'Заявки',
            '/customers_requests/edit/'.$crs['CustomerRequest']['id'] => $this->fetch('page_title'),
        ]
    ]);
    $this->end();

    echo $this->element('customers_requests/form', ['submit_text' => 'Оновити']);
?>