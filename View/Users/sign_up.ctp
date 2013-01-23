<div class="users form">
<?php 
	echo $this->Form->create('User', array(
		'class' => 'well'
	)); 
?>
	<fieldset>
		<legend><?php echo __('Sign Up'); ?></legend>
	<?php
		echo $this->Form->input('name', array(
			'label' => 'Full Name',
			'class'=>'span4'
		));
		echo $this->Form->input('email', array(
			'label' => 'Email',
			'class'=>'span4'
		));
		echo $this->Form->input('password', array(
			'label' => 'Password',
			'class' => 'span4'
		));
	?>
	</fieldset>
<?php 
	echo $this->Form->end(array(
		'label' => __('Sign Up'),
		'class' => 'btn'
	));
?>
</div>
