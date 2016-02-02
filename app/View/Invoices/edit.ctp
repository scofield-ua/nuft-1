<?php
    $this->start('page_title');
    echo "Редагувати накладну";
    $this->end();

    $this->start('breadcrumb');
    echo $this->element('parts/breadcrumb', [
        'items' => [
            '/invoices' => 'Накладні',
            '/invoices/edit/'.$invoice['Invoice']['id'] => $this->fetch('page_title'),
        ]
    ]);
    $this->end();

    echo $this->element('invoices/form', ['submit_text' => 'Оновити']);
?>