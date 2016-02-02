<ul class="nav nav-pills nav-stacked">
    <?php
        $items = [
            '/products' => 'Продукти',
            '/customers' => 'Замовники',
            '/contracts' => 'Контракти',
            '/drivers' => 'Водії',
            '/cars' => 'Автомобілі',
            '/invoices' => 'Накладні',
            '/schedulers' => 'Графік перевезень',
            '/routings' => 'Маршрутний лист'
        ];
        
        if(!isset($current_nav)) $current_nav = "";
        
        foreach($items as $url => $title) {
            $class = $url == $current_nav ? 'active' : '';
            
            echo "
                <li class='nav-item'>
                    ".$this->Html->link($title, $url, ['class' => 'nav-link '.$class])."
                </li>                        
            ";
        }
    ?>
</ul>
