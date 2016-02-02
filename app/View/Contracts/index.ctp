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


<div class='row'>
    <div class='col-md-12'>
        <a href="/contracts/add" class="btn btn-primary-outline">Додати контракт</a>
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
                                <th>Замовник</th>
                                <th>Сума</th>
                                <th>Дата</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        <?php
                            if(!empty($contracts)) {
                                foreach($contracts as $item) {
                                    echo "
                                        <tr>
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