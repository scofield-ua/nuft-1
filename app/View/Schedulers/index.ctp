<?php
    $this->start('page_title');
    echo "Графік перевезень";
    $this->end();
?>


<?php
    $this->start('breadcrumb');
    echo $this->element('parts/breadcrumb', [
        'items' => [
            '/schedulers' => $this->fetch('page_title')
        ]
    ]);
    $this->end();
?>


<div class='row'>
    <div class='col-md-12'>
        <a href="/schedulers/add" class="btn btn-primary-outline">Додати</a>
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
                            <input type="text" class="form-control form-control-sm" name="date" placeholder="Пошук за датою" />
                            <a href="/schedulers" class="btn btn-secondary btn-sm">Відмінити</a>
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
                                <th>Дата</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        <?php
                            if(!empty($schedules)) {
                                foreach($schedules as $item) {
                                    echo "
                                        <tr>
											<td>".$item['Customer']['title']."</td>
                                            <td>".$item['Product']['title']."</td>
                                            <td>".$this->Html->link('<span data-format="DD MMMM YYYY">'.$item['Scheduler']['date'].'</span>', '/schedulers/edit/'.$item['Scheduler']['id'], ['escape' => false])."</td>
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