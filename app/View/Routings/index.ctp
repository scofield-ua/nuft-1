<?php
    $this->start('page_title');
    echo "Маршрутний лист";
    $this->end();
?>


<?php
    $this->start('breadcrumb');
    echo $this->element('parts/breadcrumb', [
        'items' => [
            '/routings' => $this->fetch('page_title')
        ]
    ]);
    $this->end();
?>


<div class='row'>
    <div class='col-md-12'>
        <a href="/routings/add" class="btn btn-primary-outline">Додати</a>
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
                    <!--<div class='col-md-5'>
                        <form class="form-inline">
                            <input type="text" class="form-control form-control-sm" name="date" placeholder="Пошук за датою" />
                            <a href="/routings" class="btn btn-secondary btn-sm">Відмінити</a>
                        </form>
                    </div>-->
                </div>
                
                
                
            </div>
            
            <div class="card-block">
                <div class='table-responsive'>
                    <table class='table small'>
                        <thead>
                            <tr>
                                <th>Водій</th>
								<th>Авто</th>
                                <th>Накладна</th>
								<th>Адреса</th>
								<th>Дата</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        <?php
                            if(!empty($routing)) {
                                foreach($routing as $item) {
                                    echo "
                                        <tr>
											<td>".$this->Html->link($item['Driver']['name'], '/routings/driver/'.$item['Driver']['id'])."</td>
											<td>".$item['Car']['model_number']."</td>
                                            <td>".$item['Invoice']['id']."</td>
											<td>".$item['Routing']['address']."</td>
                                            <td>".$this->Html->link('<span data-format="DD MMMM YYYY">'.$item['Routing']['date'].'</span>', '/routings/edit/'.$item['Routing']['id'], ['escape' => false])."</td>
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