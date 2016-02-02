<?php
    $this->start('page_title');
    echo "Редагувати";
    $this->end();

    $this->start('breadcrumb');
    echo $this->element('parts/breadcrumb', [
        'items' => [
            '/schedulers' => 'Графіки перевезень',
            '/schedulers/edit/'.$scheduler['Scheduler']['id'] => $this->fetch('page_title'),
        ]
    ]);
    $this->end();

    echo $this->element('schedulers/form', ['submit_text' => 'Оновити']);
?>