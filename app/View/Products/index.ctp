<?php
    $this->start('page_title');
    echo "Продукти";
    $this->end();
?>


<?php
    $this->start('breadcrumb');
    echo $this->element('parts/breadcrumb', [
        'items' => [
            '/products' => $this->fetch('page_title')
        ]
    ]);
    $this->end();
?>


<div class='row'>
    <div class='col-md-12'>
        <a href="/products/add" class="btn btn-primary-outline">Додати продукт</a>
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
                            <input type="text" class="form-control form-control-sm" name="name" placeholder="Пошук за назвою" value="<?= $this->request->query('name'); ?>" />
                            <a href="/products" class="btn btn-secondary btn-sm">Відмінити</a>
                        </form>
                    </div>
                </div>
                
                
                
            </div>
            
            <div class="card-block">
                <div class='table-responsive'>
                    <table class='table'>
                        <thead>
                            <tr>
                                <th>Назва</th>
                                <th>Ціна <small>(грн)</small></th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        <?php
                            if(!empty($products)) {
                                foreach($products as $item) {
                                    echo "
                                        <tr>
                                            <td>".$this->Html->link($item['Product']['title'], '/products/edit/'.$item['Product']['id'])."</td>
                                            <td>".$item['Product']['price']."</td>
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