<?php
    $this->start('page_title');
    echo "ADM";
    $this->end();
	
	$this->start('breadcrumb');
    echo $this->element('parts/breadcrumb', [
        'items' => [
            '/' => 'Головна'
        ]
    ]);
    $this->end();
?>


<div class='row'>
    <div class='col-md-6'>
        <a href="/products" class="btn btn-secondary btn-lg btn-block"><i class="fa fa-birthday-cake"></i> Продукти</a>
    </div>
	<div class='col-md-6'>
        <a href="/drivers" class="btn btn-secondary btn-lg btn-block"><i class="fa fa-users"></i> Водії</a>
    </div>
	
</div>

<div class='row'>
	<div class='col-md-12'>
		<hr>
	</div>
</div>

<div class='row'>
	<div class='col-md-6'>
        <a href="/cars" class="btn btn-secondary btn-lg btn-block"><i class="fa fa-truck"></i> Автомобілі</a>
    </div>
	<div class='col-md-6'>
        <a href="/contracts" class="btn btn-secondary btn-lg btn-block"><i class="fa fa-file"></i> Контракти</a>
    </div>
</div>

<div class='row'>
	<div class='col-md-12'>
		<hr>
	</div>
</div>

<div class='row'>
	<div class='col-md-6'>
        <a href="/customers" class="btn btn-secondary btn-lg btn-block"><i class="fa fa-shopping-basket"></i> Замовники</a>
    </div>
	<div class='col-md-6'>
        <a href="/invoices" class="btn btn-secondary btn-lg btn-block"><i class="fa fa-files-o"></i> Накладні</a>
    </div>
</div>

<div class='row'>
	<div class='col-md-12'>
		<hr>
	</div>
</div>

<div class='row'>    
	<div class='col-md-6'>
        <a href="/schedulers" class="btn btn-secondary btn-lg btn-block"><i class="fa fa fa-sitemap"></i> Графік перевезень</a>
    </div>
	<div class='col-md-6'>
        <a href="/routings" class="btn btn-secondary btn-lg btn-block"><i class="fa fa fa-sitemap"></i> Маршрутний лист</a>
    </div>
</div>