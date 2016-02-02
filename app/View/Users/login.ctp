<div class='row'>
    <div class='col-md-6 col-md-offset-3'>
        <br/>
        <?php
            echo $this->Form->create('User', [
                'type' => 'post',
                'class' => 'form',
                'inputDefaults' => [                            
                    'div' => 'form-group',
                    'class' => 'form-control'
                ]
            ]);
            
            echo $this->Form->input('email', ['label' => 'Електронна адреса']);
            echo $this->Form->input('password', ['label' => 'Пароль']);
            echo $this->Form->submit('Увійти', ['class' => 'btn btn-primary']);
            
            echo $this->Form->end();
        ?>
        
        <br/>
        <?= $this->Session->flash(); ?>
    </div>
</div>