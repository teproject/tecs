<div class="uploads index">
	<h2><?php echo __('Uploads');?></h2>
	<table cellpadding="0" cellspacing="0" class="table table-striped">
	<tr>
			<th><?php echo $this->Paginator->sort('filename'); ?></th>
			<?php
				if($isAdmin){
					echo '<th>Shared With:</th>';
				}
				echo '<th>'.$this->Paginator->sort('User.name', 'Owner').'</th>';
			?>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($uploads as $upload): ?>
	<tr>
		<td>
			<?php 
				echo $this->Html->link($upload['Upload']['filename'], array(
					'action' => 'download',
					$upload['Upload']['id']
				));	
			?>&nbsp;
		</td>
		<?php if ($isAdmin){ ?>
		<td>
			<?php
				foreach($upload['SharedUser'] as $user){
					echo $user['name'].'<br>';
				}
			?>
		</td>
		<td>
			<?php echo $this->Html->link($upload['Owner']['name'], array('controller' => 'users', 'action' => 'view', $upload['Owner']['id'])); ?>
		</td>
		<?php } ?>
		<td><?php echo h(date('M j, Y', strtotime($upload['Upload']['modified']))); ?>&nbsp;</td>
		<td class="actions">
			<?php
				echo $this->Html->link(
					$this->Html->image('icons/edit.png', array(
						'alt' =>'Edit', 'class'=>'edit-icon')
					), array(
						'action' => 'edit', $upload['Upload']['id']
					), array('escape' => false)
				); 
				echo $this->Form->postLink(
					$this->Html->image('icons/remove.png', array(
						'alt' =>'Remove', 'class'=>'edit-icon')
					), array(
						'action' => 'delete', $upload['Upload']['id']
					), array('escape' => false), 
					__('Are you sure you want to delete this user?')
				); 
			?>
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
		<li><?php echo $this->Html->link(__('New Upload'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
