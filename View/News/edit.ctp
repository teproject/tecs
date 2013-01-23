<div class="news form">
<?php 
	echo $this->Form->create('News', array(
		'type' => 'file',
		'class' => 'well'
	)); ?>
	<fieldset>
		<legend><?php echo __('Edit News'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title', array(
			'class' => 'input-xlarge'
		));
		echo $this->Form->file('photo');
		echo $this->Form->input('content', array(
			'class' => 'input-xlarge'
		));
		echo $this->Form->input('published', array(
			'type' => 'checkbox',
			'label' => 'Published?'
		));
	?>
<?php 
	echo $this->Form->button(__('Save'), array(
		'class' => 'btn btn-primary'
	));
	echo $this->Form->button(__('Cancel'), array(
		'class' => 'btn',
		'style' => 'margin-left: 5px;'
	));?>
	</fieldset>
<?php
	echo $this->Form->end(); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('News.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('News.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List News'), array('action' => 'index')); ?></li>
	</ul>
</div>
