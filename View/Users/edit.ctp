<div class="users form">
<?php echo $this->Form->create('User', array(
		'class' => 'well',
		'id' => 'users-edit'
	  )); ?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name', array(
			'required' => false
		));
		echo $this->Form->input('email', array(
			'required' => false
		));
		echo $this->Form->input('group', array(
				'type' => 'radio',
				'legend' => false,
				'required' => false,
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
	
		// Form Actions:		
		echo '<div class="form-actions">';
		// Save/Cancel buttons:
		echo '<span id="primary-actions">';
		echo $this->Form->button(__('Save'), array(
			'class' => 'btn btn-primary',
			'name' => 'action',
			'value' => 'save'
		));
		echo $this->Form->button(__('Cancel'), array(
			'class' => 'btn',
			'name' => 'action',
			'onclick' => "return confirm('Are you sure you want to cancel?');",
			'value' => 'cancel'
		));
		echo '</span>';
		//Index button:
		echo '<span id="secondary-actions">';
		echo $this->Form->button(__('Delete'), array(
			'class' => 'btn red',
			'name' => 'action',
			'onclick' => "return confirm('Are you sure you want to delete this user?');",
			'value' => 'delete'
		));
		echo $this->Form->button(__('List Users'), array(
			'class' => 'btn green',
			'name' => 'action',
			'value' => 'index'
		));
		echo '</span>';
		echo '</div>';
		echo $this->Form->end();
	?>
</div>
