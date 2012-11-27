<div class="slides view">
<h2><?php  echo __('Slide'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($slide['Slide']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($slide['Slide']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Photo File Name'); ?></dt>
		<dd>
			<?php echo h($slide['Slide']['photo_file_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Link'); ?></dt>
		<dd>
			<?php echo h($slide['Slide']['link']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Order'); ?></dt>
		<dd>
			<?php echo h($slide['Slide']['order']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Published'); ?></dt>
		<dd>
			<?php echo h($slide['Slide']['published']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($slide['Slide']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($slide['Slide']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($slide['Slide']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified By'); ?></dt>
		<dd>
			<?php echo h($slide['Slide']['modified_by']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Slide'), array('action' => 'edit', $slide['Slide']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Slide'), array('action' => 'delete', $slide['Slide']['id']), null, __('Are you sure you want to delete # %s?', $slide['Slide']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Slides'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Slide'), array('action' => 'add')); ?> </li>
	</ul>
</div>
