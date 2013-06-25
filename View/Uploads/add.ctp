<div class="uploads form">
<?php echo $this->Form->create('Upload', array('type' => 'file', 'class' => 'form-horizontal')); ?>
	<fieldset>
		<legend><?php echo __('Add Upload'); ?></legend>
	<?php
	
		// display title input using twitter bootstrap syntax:
		echo '<div class="control-group">';
		echo $this->Form->label('title', 'Title', array(
			'class' => 'control-label'
		));
		echo '<div class="controls">';
		echo $this->Form->input('title', array(
			'label' => '',
			'class' => 'input-xxlarge',
			'required' => false
		));
		echo '</div></div>';
		
		// display file input using twitter bootstrap syntax:
		echo '<div class="control-group">';
		echo $this->Form->label('file', 'File', array(
			'class' => 'control-label'
		));
		echo '<div class="controls">';
		echo $this->Form->input('file', array(
			'type' => 'file',
			'label' => '',
			'class' => 'input-xxlarge',
			'required' => false
		));
		echo '</div></div>';

		// display description input using twitter bootstrap syntax:
		echo '<div class="control-group">';
		echo $this->Form->label('description', 'Description', array(
			'class' => 'control-label'
		));
		echo '<div class="controls">';
		echo $this->Form->input('description', array(
			'label' => '',
			'class' => 'input-xxlarge',
			'required' => false
		));
		echo '</div></div>';	
		
		// display shared users using twitter bootstrap syntax:
		echo '<div class="control-group">';
		echo $this->Form->label('SharedUser', 'Share With', array(
			'class' => 'control-label'
		));
		echo '<div class="controls">';
		echo $this->Form->input('SharedUser', array(
			'label' => '',
			'class' => 'input-xxlarge',
			'options' => $users,
			'required' => false
		));
		echo '</div></div>';

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
		echo $this->Form->button(__('List Uploads'), array(
			'class' => 'btn green',
			'name' => 'action',
			'value' => 'index'
		));
		echo '</span>';
		echo '</div>';
		
		echo '</div>';
	?>
	</fieldset>
<?php echo $this->Form->end(); ?>
</div>