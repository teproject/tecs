<!-- Navigation Bar -->
<div id="nav-bar">
	<ul class="grid_3">
		<li>
			<?php echo $this->Html->link('Home', '/pages/home'); ?>
		</li>
	</ul>
	<ul class="grid_4">
		<li><a class="dropdown" href="#">TE Program</a></li>
		<li class="sublinks">
			<?php
				echo $this->Html->link('Courses', array(
					'controller' => 'courses', 
					'action' => 'index'
				));
				echo $this->Html->link('Projects', array(
					'controller' => 'projects',
					'action' => 'index'
				));
				echo $this->Html->link('Promotion', array(
					'controller' => 'courses', 
					'action' => 'index'
				));
				echo $this->Html->link('Resources', array(
					'controller' => 'projects',
					'action' => 'index'
				));
			?>
		</li>
	</ul>
	<ul class="grid_4">
		<li><a class="dropdown" href="#">Out of The Classroom</a></li>
		<li class="sublinks">
			<?php
				echo $this->Html->link('Entrepreneurship Lab', 
					'http://www.pace.edu/lubin/departments-and-research-centers/entrepreneurship-lubin/entrepreneurship-lab'
				);
				echo $this->Html->link('News', array(
					'controller' => 'news',
					'action' => 'index'
				));
			?>
		</li>
	</ul>
	<ul class="grid_2">
		<li><?php
			if($loggedIn){
				echo $this->Html->link('Logout', array(
					'controller' => 'users',
					'action' => 'logout'
				));
			} else {
				echo $this->Html->link('Login', array(
					'controller' => 'users',
					'action' => 'login'
				));
			}
		?></li>
	</ul>
	<ul class="grid_3">
		<li><?php
			echo $this->Html->link('Information', array(
				'controller' => 'pages',
				'action' => 'display',
				'information'
			), array('class' => 'dropdown'));
		?></li>
		<li class="sublinks">
			<?php
				echo $this->Html->link('News', array(
					'controller' => 'pages',
					'action' => 'display',
					'resources'
				));
				echo $this->Html->link('About Us', array(
					'controller' => 'pages',
					'action' => 'display',
					'resources'
				));
				echo $this->Html->link('Contact Us', array(
					'controller' => 'news',
					'action' => 'index'
				));
			?>
		</li>
	</ul>
</div>