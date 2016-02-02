<?php
    $this->start('page_title');
    echo "Водії";
    $this->end();
?>


<?php
    $this->start('breadcrumb');
    echo $this->element('parts/breadcrumb', [
        'items' => [
            '/drivers' => 'Водії'
        ]
    ]);
    $this->end();
?>


<div class='row'>
    <div class='col-md-12'>
        <a href="/drivers/add" class="btn btn-primary-outline">Додати водія</a>
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
                            <input type="text" class="form-control form-control-sm" name="name" placeholder="Пошук по ПІБ" />
                            <a href="/drivers" class="btn btn-secondary btn-sm">Відмінити</a>
                        </form>
                    </div>
                </div>
                
                
                
            </div>
            
            <div class="card-block">
                <div class='table-responsive'>
                    <table class='table'>
                        <thead>
                            <tr>
                                <th>ПІБ</th>
                                <th>Адреса</th>
                                <th>Моб. телефон</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        <?php
                            if(!empty($drivers)) {
                                foreach($drivers as $item) {
                                    echo "
                                        <tr>
                                            <td>".$this->Html->link($item['Driver']['name'], '/drivers/edit/'.$item['Driver']['id'])."</td>
                                            <td>".$item['Driver']['address']."</td>
                                            <td>".$item['Driver']['tel']."</td>
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