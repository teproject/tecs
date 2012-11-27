<div class="slides index">
	<h2><?php echo __('Slides'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('photo_file_name'); ?></th>
			<th><?php echo $this->Paginator->sort('link'); ?></th>
			<th><?php echo $this->Paginator->sort('order'); ?></th>
			<th><?php echo $this->Paginator->sort('published'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('created_by'); ?></th>
			<th><?php echo $this->Paginator->sort('modified_by'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($slides as $slide): ?>
	<tr>
		<td><?php echo h($slide['Slide']['id']); ?>&nbsp;</td>
		<td><?php echo h($slide['Slide']['title']); ?>&nbsp;</td>
		<td><?php echo h($slide['Slide']['photo_file_name']); ?>&nbsp;</td>
		<td><?php echo h($slide['Slide']['link']); ?>&nbsp;</td>
		<td><?php echo h($slide['Slide']['order']); ?>&nbsp;</td>
		<td><?php echo h($slide['Slide']['published']); ?>&nbsp;</td>
		<td><?php echo h($slide['Slide']['created']); ?>&nbsp;</td>
		<td><?php echo h($slide['Slide']['modified']); ?>&nbsp;</td>
		<td><?php echo h($slide['Slide']['created_by']); ?>&nbsp;</td>
		<td><?php echo h($slide['Slide']['modified_by']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $slide['Slide']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $slide['Slide']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $slide['Slide']['id']), null, __('Are you sure you want to delete # %s?', $slide['Slide']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Slide'), array('action' => 'add')); ?></li>
	</ul>
</div>
