<div class="news form">
<?php 
	echo $this->Form->create('News', array(
		'type' => 'file',
		'class' => 'well'
	)); 
?>
	<fieldset>
		<legend><?php echo __('Add News'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->file('photo');
		echo $this->Form->input('content');
		echo $this->Form->input('published');
	?>
<?php 
	echo $this->Form->button(__('Save'), array(
		'class' => 'btn btn-primary'
	));
	echo $this->Form->button(__('Cancel'), array(
		'class' => 'btn'
	));?>
	</fieldset>
<?php
	echo $this->Form->end(); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List News'), array('action' => 'index')); ?></li>
	</ul>
</div>
