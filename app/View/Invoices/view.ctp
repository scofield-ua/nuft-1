<?php
    $this->start('page_title');
    echo "Накладна &mdash; ".$invoice['Product']['title']." &mdash; ".$invoice['Customer']['title'];
    $this->end();

    $this->start('breadcrumb');
    echo $this->element('parts/breadcrumb', [
        'items' => [
            '/invoices' => 'Наклдані',
            '/invoices/view/'.$invoice['Invoice']['id'] => $this->fetch('page_title'),
        ]
    ]);
    $this->end();
?>
<p class='no-print'>
	<?= $this->Html->link('Редагувати', '/invoices/edit/'.$invoice['Invoice']['id'], ['class' => 'btn btn-primary-outline']); ?>
	<?= $this->element('parts/print-button'); ?>	
</p>
<hr class='no-print'>

<p class='lead text-muted'>Дані накладної</p>
<p><strong>Кількість:</strong> <?= $invoice['Invoice']['amount'] ?></p>
<p><strong>Дата:</strong> <?= $invoice['Invoice']['date'] ?></p>
<hr>

<p class='lead text-muted'>Дані замовника</p>
<p><strong>Замовник:</strong> <?= $invoice['Customer']['title'] ?></p>
<p><strong>Адреса:</strong> <?= $invoice['Customer']['address'] ?></p>
<p><strong>Телефон:</strong> <?= $invoice['Customer']['tel'] ?></p>
<hr>

<p class='lead text-muted'>Дані продукту</p>
<p><strong>Назва:</strong> <?= $invoice['Product']['title'] ?></p>
<p><strong>Ціна:</strong> <?= $invoice['Product']['price'] ?> грн</p>