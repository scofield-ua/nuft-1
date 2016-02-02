<?php
    $this->start('page_title');
    echo "Редагувати контракт";
    $this->end();

    $this->start('breadcrumb');
    echo $this->element('parts/breadcrumb', [
        'items' => [
            '/contracts' => 'Водії',
            '/contracts/edit/'.$contract['Contract']['id'] => $this->fetch('page_title'),
        ]
    ]);
    $this->end();

    echo $this->element('contracts/form', ['submit_text' => 'Оновити']);
?>