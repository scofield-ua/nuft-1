<?php
    $this->start('page_title');
    echo "Заявки клієнтів";
    $this->end();
?>


<?php
    $this->start('breadcrumb');
    echo $this->element('parts/breadcrumb', [
        'items' => [
            '/customers_requests' => $this->fetch('page_title')
        ]
    ]);
    $this->end();
?>


<div class='row no-print'>
    <div class='col-md-12'>
        <a href="/customers_requests/add" class="btn btn-primary-outline">Додати заявку</a>
		<?= $this->element('parts/print-button'); ?>
        <hr>
    </div>
</div>

<div class='row no-print'>
    <div class='col-md-12'>
        <div class="card">
            <div class="card-header">
				<button class="btn btn-default btn-sm" data-target="#results-filter" data-toggle="collapse">Фільтр</button>
				<?= $this->Html->link('Відмінити', '/customers_requests', ['class' => 'btn btn-secondary btn-sm pull-right']); ?>				
            </div>            
			
			<div class="card-block collapse" id="results-filter" aria-expanded="false">
				<?php
					echo $this->Form->create('Contract', [
						'type' => 'get',
						'class' => 'form',
						'inputDefaults' => [
							'div' => 'form-group',
							'class' => 'form-control'
						]
					]);
					echo $this->Form->input('customer_id', ['options' => $customers, 'label' => 'Замовник', 'value' => $this->request->query('customer_id')]);
					echo $this->Form->input('product_id', ['options' => $products, 'label' => 'Продукт', 'value' => $this->request->query('product_id')]);
					echo $this->Form->input('amount', ['label' => 'Кількість', 'value' => $this->request->query('sum'), 'required' => false]);
					echo $this->Form->submit('Пошук', ['class' => 'btn btn-secondary']);						
					echo $this->Form->end();
				?>
			</div>			
        </div>
    </div>
</div>

<div class='row'>
    <div class='col-md-12'>
        <div class="card">
            <div class="card-header">
                <h4><?= $this->fetch('page_title'); ?></h4>
            </div>
            
            <div class="card-block">
                <div class='table-responsive'>
                    <table class='table'>
                        <thead>
                            <tr>
								<th class='no-print'></th>
								<th>#</th>
                                <th>Замовник</th>
								<th>Продукт</th>
                                <th>Кількість</th>
                                <th>Дата</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        <?php
                            if(!empty($crs)) {
								
                                foreach($crs as $item) {
									$btns = "
										<div class='btn-group' role='group'>
											".$this->Html->link('Переглянути', '/customers_requests/view/'.$item['CustomerRequest']['id'], ['class' => 'btn btn-primary-outline btn-sm'])."
											".$this->Html->link('Редагувати', '/customers_requests/edit/'.$item['CustomerRequest']['id'], ['class' => 'btn btn-primary-outline btn-sm'])."
										</div>
									";
									
                                    echo "
                                        <tr>
											<td class='no-print'>{$btns}</td>
											<td>".$item['CustomerRequest']['id']."</td>
                                            <td>".$item['Customer']['title']."</td>
											<td>".$item['Product']['title']."</td>
                                            <td>".$item['CustomerRequest']['amount']."</td>
                                            <td data-format='DD MMMM YYYY HH:mm'>".$item['CustomerRequest']['date']."</td>
                                        </tr>
                                    ";
                                }
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>