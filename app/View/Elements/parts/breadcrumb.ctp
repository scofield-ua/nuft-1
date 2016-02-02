<div class='row'>
    <div class='col-md-12'>
        <ol class="breadcrumb">
            <?php
                foreach($items as $url => $title) {
                    echo "<li>".$this->Html->link($title, $url, ['escape' => false])."</li>";
                }
            ?>
        </ol>
    </div>
</div>