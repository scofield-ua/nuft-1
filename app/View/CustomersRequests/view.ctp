<?php
    $this->start('page_title');
    echo "Контракт &mdash; ".$contract['Customer']['title'];
    $this->end();

    $this->start('breadcrumb');
    echo $this->element('parts/breadcrumb', [
        'items' => [
            '/contracts' => 'Контракти',
            '/contracts/view/'.$contract['Contract']['id'] => $this->fetch('page_title'),
        ]
    ]);
    $this->end();
?>
<p class='no-print'>
	<?= $this->Html->link('Редагувати', '/contracts/edit/'.$contract['Contract']['id'], ['class' => 'btn btn-primary-outline']); ?>
	<?= $this->element('parts/print-button'); ?>	
</p>
<hr class='no-print'>

<p class='lead text-muted'>Дані контракту</p>
<hr>
<p><strong>Сума:</strong> <?= $contract['Contract']['sum'] ?> грн.</p>
<p><strong>Дата:</strong> <span data-format='DD MMMM YYYY'><?= $contract['Contract']['date'] ?></span></p>
<hr>

<p class='lead text-muted'>Дані замовника</p>
<p><strong>Замовник:</strong> <?= $contract['Customer']['title'] ?></p>
<p><strong>Адреса:</strong> <?= $contract['Customer']['address'] ?></p>
<p><strong>Телефон:</strong> <?= $contract['Customer']['tel'] ?></p>

