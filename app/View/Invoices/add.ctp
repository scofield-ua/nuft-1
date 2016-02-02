<?php
    $this->start('page_title');
    echo "Додати накладну";
    $this->end();

    $this->start('breadcrumb');
    echo $this->element('parts/breadcrumb', [
        'items' => [
            '/invoices' => 'Накладні',
            '/invoices/add' => $this->fetch('page_title'),
        ]
    ]);
    $this->end();

    echo $this->element('invoices/form', ['submit_text' => 'Додати']);
?>