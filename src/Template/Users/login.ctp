<?= $this->Form->create(null,
	['class'=>'form-signin']
) ?>
<h2 class="form-signin-heading">sign in now</h2>
<div class="login-wrap">
	<?= $this->Form->input('email',[
		'id'=>'login_input_username'
		,'class'=>'login_input form-control'
		,'autofocus'
		,'placeholder'=>'Email'
		,'label'=>false
	]) ?>
	<?= $this->Form->input('password',[
		'label'=>false
		,'class'=>'form-control'
		,'placeholder'=>'Password'
	]) ?>
	<?= $this->Form->button('sign in',[
		'class'=>'btn btn-lg btn-login btn-block btn-primary'
	]) ?>
	<?= $this->Form->end() ?>
	<div class="registration">
		Don't have an account yet?
		<?php
		echo $this->Html->link('Create an account',
		[
			'controller'=>'register'
			,'action'=>'client'
		]);
		?>
	</div>
</div>
