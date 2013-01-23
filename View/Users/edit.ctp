<div class="users form">
<?php echo $this->Form->create('User', array(
		'class' => 'well',
		'id' => 'users-edit'
	  )); ?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('email');
				echo $this->Form->input('group', array(
				'type' => 'radio',
				'legend' => false,
				'options' => array(
					'Administrator' => 'Administrator',
					'Member' => 'Regular Member'
				)
		));
		if(isset($this->data['User']['activated'])) {
			if($this->data['User']['activated'] == 'No')
				echo $this->Html->link(__('Activate User?'), array('action' => 'activate', $this->data['User']['id']));
			else {
				echo "This user's account has already been activated.";
			}
		}
	?>
	<div class="form-actions">
	<?php
		echo $this->Form->button(__('Save Changes'), array(
			'class'=>'btn btn-primary',
			'div' => false
		));
		echo $this->Form->button(__('Cancel'), array(
			'class' => 'btn',
			'div' => false,
			'style' => 'margin-left: 5px;'
		));
		echo $this->Form->end();
	?>
	</div>
	</fieldset>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('User.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
	</ul>
</div>
