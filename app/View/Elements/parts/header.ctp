<div class='row header'>
    <div class='col-md-12 text-center'>
        <a href='/'><strong>ADM</strong></a>
		
		<?php if(AuthComponent::user()) : ?>
		<a href='/users/logout' class='pull-right text-muted' title='Вихід'>
			<i class="fa fa-sign-out"></i>
		</a>
		<?php endif; ?>
    </div>
</div>
