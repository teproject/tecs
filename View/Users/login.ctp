<div class="users form"><?php 
	echo $this->Form->create('User', array(
		'class' => 'well',
		'id' => 'login-form'
	)); 
	?>
	<fieldset>
		<legend><?php echo __('Log In'); ?></legend>
		<div class="control-group">
	<?php
		echo $this->Form->input('email', array(
			'label' => array(
				'class' => 'control-label'
			),
			
			'class' => 'input-xlarge'
		));
		echo $this->Form->input('password', array(
			'class' => 'input-xlarge'
		));
	?>
		</div>
	</fieldset>
<?php echo $this->Form->button(__('Log In'), array('class'=>'btn')); ?>
<?php
	echo $this->Html->link('Forgot your password?', array(
			'controller'=>'users', 
			'action'=>'pswdreset'
		), array(
			'id' => 'forgot-password'
	));
	echo $this->Html->link('Not a member? Sign up here.', array(
		'controller'=>'users', 
		'action'=>'sign_up'
		), array(
			'id' => 'not-a-member'
	));
	echo $this->Form->end();
?>
</div>