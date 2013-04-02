<?php //load WYSIHTML5 code and stylesheet:
	echo $this->Html->script('wysihtml5/parser_rules/advanced.js');
	echo $this->Html->script('wysihtml5/dist/wysihtml5-0.3.0.min.js');
	echo $this->Html->css('wysihtml5/toolbar.css');
?>
<div class="news form">
<?php 
	echo $this->Form->create('News', array('type' => 'file', 'class' => 'form-horizontal')); 
?>
	<fieldset>
		<legend><?php echo __('Edit News Article'); ?></legend>
	<?php
		// display Title input using twitter bootstrap syntax:
		echo '<div class="control-group">';
		echo $this->Form->label('title', 'Title', array('class' => 'control-label'));
		echo '<div class="controls">';
		echo $this->Form->input('title', array('label' => '', 'class' => 'input-xlarge'));
		echo '</div></div>';
		
		// do the same for Photo:
		echo '<div class="control-group">';
		echo $this->Form->label('photo', 'Image', array('class' => 'control-label'));
		echo '<div class="controls">';
		// must use Form->input() (not file()), so validation errors can be displayed:
		echo $this->Form->input('News.photo', array(
			'type' => 'file', 
			'accept' => 'image/*',
			'label' => '',
			'class' => 'input-xlarge'));
		echo '<p class="help-block">Images must be smaller than 400 KB and will be resized to 170x125 px.</p>';
		echo '</div></div>';
	?>
	<!-- wysihtml5 toolbar start -->
	<div id="wysihtml5-toolbar" style="display: none;">
	  <div id="wysihtml5-header">
		<div class="commands">
			<a class="command" title="Make text bold (CTRL + B)" data-wysihtml5-command="bold" href="javascript:;" unselectable="on"></a>
			<a class="command" title="Make text italic (CTRL + I)" data-wysihtml5-command="italic" href="javascript:;" unselectable="on"></a>
			<a class="command" title="Insert an unordered list" data-wysihtml5-command="insertUnorderedList" href="javascript:;" unselectable="on"></a>
			<a class="command" title="Insert an ordered list" data-wysihtml5-command="insertOrderedList" href="javascript:;" unselectable="on"></a>
			<a class="command" title="Insert a link" data-wysihtml5-command="createLink" href="javascript:;" unselectable="on"></a>
			<a class="command" title="Insert an image" data-wysihtml5-command="insertImage" href="javascript:;" unselectable="on"></a>
			<a class="command" title="Insert headline 1" data-wysihtml5-command-value="h1" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on"></a>
			<a class="command" title="Insert headline 2" data-wysihtml5-command-value="h2" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on"></a>
			<a class="fore-color" title="Color the selected text" data-wysihtml5-command-group="foreColor">
				<ul>
					<li data-wysihtml5-command-value="silver" data-wysihtml5-command="foreColor" href="javascript:;" unselectable="on"></li>
					<li data-wysihtml5-command-value="gray" data-wysihtml5-command="foreColor" href="javascript:;" unselectable="on"></li>
					<li data-wysihtml5-command-value="maroon" data-wysihtml5-command="foreColor" href="javascript:;" unselectable="on"></li>
					<li data-wysihtml5-command-value="red" data-wysihtml5-command="foreColor" href="javascript:;" unselectable="on"></li>
					<li data-wysihtml5-command-value="purple" data-wysihtml5-command="foreColor" href="javascript:;" unselectable="on"></li>
					<li data-wysihtml5-command-value="green" data-wysihtml5-command="foreColor" href="javascript:;" unselectable="on"></li>
					<li data-wysihtml5-command-value="olive" data-wysihtml5-command="foreColor" href="javascript:;" unselectable="on"></li>
					<li data-wysihtml5-command-value="navy" data-wysihtml5-command="foreColor" href="javascript:;" unselectable="on"></li>
					<li data-wysihtml5-command-value="blue" data-wysihtml5-command="foreColor" href="javascript:;" unselectable="on"></li>
				</ul>
			</a>
			<a class="command" title="Insert speech" data-wysihtml5-command="insertSpeech" href="javascript:;" unselectable="on" style="display: none;"></a>
			<a class="action" title="Show HTML" data-wysihtml5-action="change_view" href="javascript:;" unselectable="on"></a>
			<!-- create link input box below -->
			<div data-wysihtml5-dialog="createLink" style="display: none;">
				<label>
					Link:
					<input data-wysihtml5-dialog-field="href" value="http://" class="text">
				</label>
				<a data-wysihtml5-dialog-action="save">OK</a>
				<a data-wysihtml5-dialog-action="cancel">Cancel</a>
			</div>
			<!-- insert image input box -->
			<div style="display: none;" data-wysihtml5-dialog="insertImage">
				<label>
					Image:
					<input value="http://" data-wysihtml5-dialog-field="src">
				</label>
				<a data-wysihtml5-dialog-action="save">OK</a>
				<a data-wysihtml5-dialog-action="cancel">Cancel</a>
			</div>
		</div>
	</div>
	<!-- wysihtml5 toolbar end -->
	
	<?php
		echo $this->Form->input('content', array(
			'type' => 'textarea',
			'id' => 'wysihtml5-textarea',
			'placeholder' => 'Enter your content...',
			'label' => false,
			'style' => 'margin: 0 25px 20px; font-size: 1.1em; line-height: 130%; height: 300px; width: 90%'
		));
		// Published?:
		echo '<div class="control-group">';
		echo $this->Form->label('published', 'Publish?', array('class' => 'control-label'));
		echo '<div class="controls">';
		echo $this->Form->input('published', array(
			'type' => 'select',
			'options' => array(
				'No' => 'No',
				'Yes' => 'Yes'
			),
			'default' => 'No',
			'label' => '',
			'class' => 'input-small'
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
		echo $this->Form->button(__('Delete'), array(
			'class' => 'btn red',
			'name' => 'action',
			'onclick' => "return confirm('Are you sure you want to delete this slide?');",
			'value' => 'delete'
		));
		echo $this->Form->button(__('List News'), array(
			'class' => 'btn green',
			'name' => 'action',
			'value' => 'index'
		));
		echo '</span>';
		echo '</div>';
	?>

	</fieldset>
<?php
	echo $this->Form->end(); ?>
</div>
<script>
	var editor = new wysihtml5.Editor("wysihtml5-textarea", { // id of textarea element
		toolbar:      "wysihtml5-toolbar", // id of toolbar element
		stylesheets:  ["../../webroot/css/wysihtml5/toolbar.css", "../../webroot/css/wysihtml5/editor.css"],	// stylesheet
		parserRules:  wysihtml5ParserRules // defined in parser rules set 
		});
</script>
