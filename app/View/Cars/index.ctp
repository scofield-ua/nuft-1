<?php
    $this->start('page_title');
    echo "Автомобілі";
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


<div class='row'>
    <div class='col-md-12'>
        <a href="/cars/add" class="btn btn-primary-outline">Додати авто</a>
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
                            <input type="text" class="form-control form-control-sm" name="number" placeholder="Пошук по автономеру" />
                            <a href="/cars" class="btn btn-secondary btn-sm">Відмінити</a>
                        </form>
                    </div>
                </div>
                
                
                
            </div>
            
            <div class="card-block">
                <div class='table-responsive'>
                    <table class='table'>
                        <thead>
                            <tr>
                                <th>Модель</th>
                                <th>Автономер</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        <?php
                            if(!empty($cars)) {
                                foreach($cars as $item) {
                                    echo "
                                        <tr>
                                            <td>".$this->Html->link($item['Car']['model'], '/cars/edit/'.$item['Car']['id'])."</td>
                                            <td>".$item['Car']['number']."</td>
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