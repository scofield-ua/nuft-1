<?php
    $this->start('page_title');
    echo "Заявка &mdash; ".$crs['Customer']['title'];
    $this->end();

    $this->start('breadcrumb');
    echo $this->element('parts/breadcrumb', [
        'items' => [
            '/customers_requests' => 'Заявки',
            '/customers_requests/view/'.$crs['CustomerRequest']['id'] => $this->fetch('page_title'),
        ]
    ]);
    $this->end();
?>
<p class='no-print'>
	<?= $this->Html->link('Редагувати', '/customers_requests/edit/'.$crs['CustomerRequest']['id'], ['class' => 'btn btn-primary-outline']); ?>
	<?= $this->element('parts/print-button'); ?>	
</p>
<hr class='no-print'>

<p class='lead text-muted'>Дані заявки</p>
<hr>
<p><strong>Продукт:</strong> <?= $crs['Product']['title'] ?></p>
<p><strong>Кількість:</strong> <?= $crs['CustomerRequest']['amount'] ?> грн.</p>
<p><strong>Дата:</strong> <span data-format='DD MMMM YYYY HH:mm'><?= $crs['CustomerRequest']['date'] ?></span></p>
<hr>

<p class='lead text-muted'>Дані замовника</p>
<p><strong>Замовник:</strong> <?= $crs['Customer']['title'] ?></p>
<p><strong>Адреса:</strong> <?= $crs['Customer']['address'] ?></p>
<p><strong>Телефон:</strong> <?= $crs['Customer']['tel'] ?></p>

