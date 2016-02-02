<?php
    $this->start('page_title');
    echo "Редагувати продукт";
    $this->end();

    $this->start('breadcrumb');
    echo $this->element('parts/breadcrumb', [
        'items' => [
            '/products' => 'Продукти',
            '/products/edit/'.$product['Product']['id'] => $this->fetch('page_title'),
        ]
    ]);
    $this->end();

    echo $this->element('products/form', ['submit_text' => 'Оновити']);
?>