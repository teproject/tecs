<?php
	if($loggedIn){
		echo '<div id="admin-panel">';
		if($isAdmin) {
			echo '<span id="greeting" class="grid_3">Welcome, Admin!</span>';
		} else {
			echo '<span id="greeting" class="grid_3">Welcome, Member!</span>';
		} 
		echo '<ul>';
		echo '<li class="grid_3">'.$this->Html->link(
			$this->Html->image('icons/manage-news.png', array(
				'alt' => '',
				'class' => 'action-icon'
			)).'Manage Articles', array(
				'controller' => 'news', 
				'action' => 'index'
			), array(
				'escape' => false
		)).'</li>';
		echo '<li class="grid_3">'.$this->Html->link(
			$this->Html->image('icons/manage-slides.png', array(
				'alt' => '',
				'class' => 'action-icon'
			)).'Manage Slides', array(
				'controller' => 'slides', 
				'action' => 'index'
			), array(
				'escape' => false
		)).'</li>';
		if($isAdmin){
			echo '<li class="grid_4">'.$this->Html->link(
				$this->Html->image('icons/manage-users.png', array(
					'alt' => '',
					'class' => 'action-icon'
				)).'Manage Users', array(
					'controller' => 'users', 
					'action' => 'index'
				), array(
					'escape' => false
			)).'</li>';
		} else {
			echo '<li class="grid_4">&nbsp;</li>';
		}
		echo '<li class="grid_3">'.$this->Html->link(
			$this->Html->image('icons/logout.png', array(
				'alt' => '',
				'class' => 'action-icon'
			)).'Logout', array(
				'controller' => 'users', 
				'action' => 'logout'
			), array(
				'escape' => false
		)).'</li>';
		echo '</ul>';
		echo '</div>';
	}
?>	
