<!-- Navigation Bar -->
<div id="nav-bar">
	<ul class="grid_3">
		<li>
			<?php echo $this->Html->link('Home', '/pages/home'); ?>
		</li>
	</ul>
	<ul class="grid_4">
		<li><a class="dropdown" href="#">In The Classroom</a></li>
		<li class="sublinks">
			<?php
				echo $this->Html->link('Courses', array(
					'controller' => 'courses', 
					'action' => 'view'
				));
				echo $this->Html->link('Projects', array(
					'controller' => 'projects',
					'action' => 'view'
				));
			?>
		</li>
	</ul>
	<ul class="grid_4">
		<li><a class="dropdown" href="#">Out of The Classroom</a></li>
		<li class="sublinks">
			<?php
				echo $this->Html->link('Resources', array(
					'controller' => 'pages',
					'action' => 'display',
					'resources'
				));
				echo $this->Html->link('Entrepreneurship Lab', 
					'http://www.pace.edu/lubin/departments-and-research-centers/entrepreneurship-lubin/entrepreneurship-lab'
				);
				echo $this->Html->link('News', array(
					'controller' => 'news',
					'action' => 'view'
				));
			?>
		</li>
	</ul>
	<ul class="grid_2">
		<li><?php
			echo $this->Html->link('Log In', array(
				'controller' => 'users',
				'action' => 'log_in'
			));
		?></li>
	</ul>
	<ul class="grid_3">
		<li><?php
			echo $this->Html->link('Contact Us', array(
				'controller' => 'pages',
				'action' => 'display',
				'contact-us'
			));
		?></li>
	</ul>
</div>