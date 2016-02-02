<?php
    $this->start('page_title');
    echo "Додати продукт";
    $this->end();

    $this->start('breadcrumb');
    echo $this->element('parts/breadcrumb', [
        'items' => [
            '/products' => 'Продукти',
            '/products/add' => $this->fetch('page_title'),
        ]
    ]);
    $this->end();

    echo $this->element('products/form', ['submit_text' => 'Додати']);
?>