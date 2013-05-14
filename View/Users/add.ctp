<div class="users form">
<?php echo $this->Form->create('User', array('class' => 'well')); ?>
	<fieldset>
		<legend><?php echo __('Add User'); ?></legend>
	<?php
		echo $this->Form->input('name', array(
			'required' => false
		));
		echo $this->Form->input('email', array(
			'required' => false
		));
		echo $this->Form->input('password', array(
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
	?>
	<div class="form-actions">
	<?php
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
		echo $this->Form->button(__('List Users'), array(
			'class' => 'btn green',
			'name' => 'action',
			'value' => 'index'
		));
		echo '</span>';
		echo '</fieldset></div>';
		echo $this->Form->end();
	?>
</div>
