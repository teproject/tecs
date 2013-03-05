<div id="dashboard">
	<?php 
		echo '<h3>Admin Dashboard</h3>'; 
		echo '<ul>';
		
		echo '<li>'.$this->Html->link('Edit Users', array(
			'controller' => 'users', 
			'action' => 'index'
		)).'</li>';
		echo '<li>'.$this->Html->link('Manage Slides', array(
			'controller' => 'slides', 
			'action' => 'index'
		)).'</li>';
		echo '<li>'.$this->Html->link('Manage News Articles', array(
			'controller' => 'news', 
			'action' => 'index'
		)).'</li>';
		echo '</ul>';
	?>	
</div>