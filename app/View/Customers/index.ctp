<?php
    $this->start('page_title');
    echo "Замовники";
    $this->end();
?>


<?php
    $this->start('breadcrumb');
    echo $this->element('parts/breadcrumb', [
        'items' => [
            '/customers' => $this->fetch('page_title')
        ]
    ]);
    $this->end();
?>


<div class='row'>
    <div class='col-md-12'>
        <a href="/customers/add" class="btn btn-primary-outline">Додати замовника</a>
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
                            <input type="text" class="form-control form-control-sm" name="name" placeholder="Пошук за назвою" />
                            <a href="/customers" class="btn btn-secondary btn-sm">Відмінити</a>
                        </form>
                    </div>
                </div>
                
                
                
            </div>
            
            <div class="card-block">
                <div class='table-responsive'>
                    <table class='table'>
                        <thead>
                            <tr>
                                <th>Назва підприємства</th>
                                <th>Адреса</th>
                                <th>Телефон</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        <?php
                            if(!empty($customers)) {
                                foreach($customers as $item) {
                                    echo "
                                        <tr>
                                            <td>".$this->Html->link($item['Customer']['title'], '/customers/edit/'.$item['Customer']['id'])."</td>
                                            <td>".$item['Customer']['address']."</td>
                                            <td>".$item['Customer']['tel']."</td>
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