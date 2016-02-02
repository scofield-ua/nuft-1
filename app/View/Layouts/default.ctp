<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title><?= $this->fetch('page_title'); ?></title>
	<?php
        echo $this->Html->css(['main']);
    
		echo $this->fetch('css');		
	?>
</head>
<body>
    <div class='container'>
        <?= $this->element('parts/header'); ?>
        
        <?php if(AuthComponent::user()) : ?>
            <?= $this->fetch('breadcrumb'); ?>
        
            <div class='row'>
                <div class='col-md-3'>
                    <?= $this->element('parts/nav'); ?>
                </div>
                
                <div class='col-md-9'>
                    <?= $this->fetch('content'); ?>
                </div>
            </div>
        <?php else : ?>
        
            <?= $this->fetch('content'); ?>
            
        <?php endif; ?>
        
    </div>	
    
    <?php
        echo $this->Html->script('main');
        echo $this->fetch('scripts');
    ?>    
</body>
</html>
