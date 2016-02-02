<?php
    $this->start('page_title');
    echo "Додати контракт";
    $this->end();

    $this->start('breadcrumb');
    echo $this->element('parts/breadcrumb', [
        'items' => [
            '/contracts' => 'Контракти',
            '/contracts/add' => $this->fetch('page_title'),
        ]
    ]);
    $this->end();

    echo $this->element('contracts/form', ['submit_text' => 'Додати']);
?>