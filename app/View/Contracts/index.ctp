<?php
    $this->start('page_title');
    echo "Контракти";
    $this->end();
?>


<?php
    $this->start('breadcrumb');
    echo $this->element('parts/breadcrumb', [
        'items' => [
            '/cars' => $this->fetch('page_title')
        ]
    ]);
    $this->end();
?>


<div class='row no-print'>
    <div class='col-md-12'>
        <a href="/contracts/add" class="btn btn-primary-outline">Додати контракт</a>
		<?= $this->element('parts/print-button'); ?>
        <hr>
    </div>
</div>

<div class='row no-print'>
    <div class='col-md-12'>
        <div class="card">
            <div class="card-header">
				<button class="btn btn-default btn-sm" data-target="#results-filter" data-toggle="collapse">Фільтр</button>
				<?= $this->Html->link('Відмінити', '/contracts', ['class' => 'btn btn-secondary btn-sm pull-right']); ?>				
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
					echo $this->Form->input('sum', ['label' => 'Сума', 'value' => $this->request->query('sum'), 'required' => false]);
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
                <div class="row">
                    <div class='col-md-7'>
                        <h4><?= $this->fetch('page_title'); ?></h4>
                    </div>
                    <div class='col-md-5 no-print text-right'>
                        <form class="form-inline">
                            <input type="text" class="form-control form-control-sm" name="name" placeholder="Пошук по замовнику" value="<?= $this->request->query('name'); ?>" />
                            <a href="/contracts" class="btn btn-secondary btn-sm">Відмінити</a>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="card-block">
                <div class='table-responsive'>
                    <table class='table'>
                        <thead>
                            <tr>
								<th class='no-print'></th>
                                <th>Замовник</th>
                                <th>Сума</th>
                                <th>Дата</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        <?php
                            if(!empty($contracts)) {								
								
                                foreach($contracts as $item) {
									$btns = "
										<div class='btn-group' role='group'>
											".$this->Html->link('Переглянути', '/contracts/view/'.$item['Contract']['id'], ['class' => 'btn btn-primary-outline btn-sm'])."
											".$this->Html->link('Редагувати', '/contracts/edit/'.$item['Contract']['id'], ['class' => 'btn btn-primary-outline btn-sm'])."
										</div>
									";
									
                                    echo "
                                        <tr>
											<td class='no-print'>{$btns}</td>
                                            <td>".$item['Customer']['title']."</td>
                                            <td>".$item['Contract']['sum']."</td>
                                            <td data-format='DD MMMM YYYY'>".$item['Contract']['date']."</td>
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