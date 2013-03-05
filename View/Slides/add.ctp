<div class="slides form">
<?php 
	echo $this->Form->create('Slide', array(
		'type' => 'file',
		'class' => 'form-horizontal'
	)); 
?>
	<fieldset>
		<legend><?php echo __('Add a Slide'); ?></legend>
	<?php
		// display title input using twitter bootstrap syntax:
		echo '<div class="control-group">';
		echo $this->Form->label('title', 'Title', array(
			'class' => 'control-label'
		));
		echo '<div class="controls">';
		echo $this->Form->input('title', array(
			'label' => '',
			'class' => 'input-xlarge'
		));
		echo '</div></div>';
		
		// do the same for photo:
		echo '<div class="control-group">';
		echo $this->Form->label('photo', 'Image', array(
			'class' => 'control-label'
		));
		echo '<div class="controls">';
		// must use Form->input() (not file()), so validation errors can be displayed:
		echo $this->Form->input('Slide.photo', array(
			'type' => 'file', 
			'accept' => 'image/*',
			'label' => '',
			'class' => 'input-xlarge'));
		echo '<p class="help-block">Images will be cropped to 650x240 px.</p>';
		echo '</div></div>';
		
		// link:
		echo '<div class="control-group">';
		echo $this->Form->label('link', 'URL', array(
			'class' => 'control-label'
		));
		echo '<div class="controls">';
		echo $this->Form->input('link', array(
			'label' => '',
			'class' => 'input-xlarge'
		));
		echo '</div></div>';
		
		// published:
		echo '<div class="control-group">';
		echo $this->Form->label('published', 'Publish?', array(
			'class' => 'control-label'
		));
		echo '<div class="controls">';		
		echo $this->Form->input('published', array(
			'type' => 'select',
			'options' => array(
				'No' => 'No',
				'Yes' => 'Yes'
			),
			'default' => 'No',
			'label' => '',
			'class' => 'input-medium'
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
		echo $this->Form->button(__('List Slides'), array(
			'class' => 'btn green',
			'name' => 'action',
			'value' => 'index'
		));
		echo '</span>';
		echo '</div>';
	?>
	</fieldset>
<?php echo $this->Form->end(); ?>
</div>