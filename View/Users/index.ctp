<div class="users index">
	<h2><?php echo __('Users'); ?></h2>
	<?php
		echo $this->Html->link(
			'<span id="add-action">New User</span>', 
			array('action' => 'add'), 
			array('escape' => false, 'title' => 'Add a user')); 
	?>
	<table cellpadding="0" cellspacing="0" class="table table-striped">
	<thead>
		<tr>
			<th><?php echo $this->Paginator->sort('group'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
	</thead>
	<?php
	foreach ($users as $user): ?>
	<tr>
		<td><?php echo h($user['User']['group']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['name']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
		<td class="actions">
			<?php
				echo $this->Html->link(
					$this->Html->image('icons/edit.png', array(
						'alt' =>'Edit', 'class'=>'edit-icon')
					), array(
						'action' => 'edit', $user['User']['id']
					), array('escape' => false)
				); 
				echo $this->Form->postLink(
					$this->Html->image('icons/remove.png', array(
						'alt' =>'Remove', 'class'=>'edit-icon')
					), array(
						'action' => 'delete', $user['User']['id']
					), array('escape' => false), 
					__('Are you sure you want to delete this user?')
				); 
			?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
