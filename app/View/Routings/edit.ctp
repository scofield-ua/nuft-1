<?php
    $this->start('page_title');
    echo "Редагувати";
    $this->end();

    $this->start('breadcrumb');
    echo $this->element('parts/breadcrumb', [
        'items' => [
            '/routings' => 'Маршрутний лист',
            '/routings/edit/'.$routing['Routing']['id'] => $this->fetch('page_title'),
        ]
    ]);
    $this->end();

    echo $this->element('routings/form', ['submit_text' => 'Оновити']);
?>