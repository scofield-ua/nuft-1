<?php
    $this->start('page_title');
    echo "Накладні";
    $this->end();
?>


<?php
    $this->start('breadcrumb');
    echo $this->element('parts/breadcrumb', [
        'items' => [
            '/invoices' => $this->fetch('page_title')
        ]
    ]);
    $this->end();
?>


<div class='row'>
    <div class='col-md-12'>
        <a href="/invoices/add" class="btn btn-primary-outline">Додати накладну</a>
        <hr>
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
                    <div class='col-md-5'>
                        <form class="form-inline">
                            <input type="text" class="form-control form-control-sm" name="date" placeholder="Пошук за датою" value="<?= $this->request->query('date'); ?>" />
                            <a href="/invoices" class="btn btn-secondary btn-sm">Відмінити</a>
                        </form>
                    </div>
                </div>
                
                
                
            </div>
            
            <div class="card-block">
                <div class='table-responsive'>
                    <table class='table'>
                        <thead>
                            <tr>
                                <th>Замовник</th>
								<th>Продукт</th>
                                <th>Кількість</th>
								<th>Дата</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        <?php
                            if(!empty($invoices)) {
                                foreach($invoices as $item) {
                                    echo "
                                        <tr>
											<td>".$item['Customer']['title']."</td>
											<td>".$item['Product']['title']."</td>
                                            <td>".$item['Invoice']['amount']."</td>
											<td>".$this->Html->link('<span data-format="DD MMMM YYYY HH:mm">'.$item['Invoice']['date'].'</span>', '/invoices/edit/'.$item['Invoice']['id'], ['escape' => false])."</td>
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