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

<p><strong>Замовник:</strong> <?= $contract['Customer']['title'] ?> <small>(<?= $contract['Customer']['address'] ?>, <?= $contract['Customer']['tel'] ?>)</small></p>
<p><strong>Сумма:</strong> <?= $contract['Contract']['sum'] ?> грн.</p>
<p><strong>Дата:</strong> <span data-format='DD MMMM YYYY'><?= $contract['Contract']['date'] ?></span></p>