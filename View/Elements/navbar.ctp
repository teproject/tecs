<!-- Navigation Bar -->
<div id="nav-bar">
	<ul class="grid_3">
		<li>
			<?php echo $this->Html->link('Home', '/pages/home'); ?>
		</li>
	</ul>
	<ul class="grid_3">
		<li><?php
			echo $this->Html->link('About Us', array(
				'controller' => 'pages',
				'action' => 'display',
				'about'
			));
		?></li>
	</ul>
	<ul class="grid_3">
		<li><?php
				echo $this->Html->link('Courses', array(
					'controller' => 'pages', 
					'action' => 'display',
					'courses'
				));
		?></li>
	</ul>
	<ul class="grid_4">
		<li><a class="dropdown" href="#">Resources</a></li>
		<li class="sublinks">
			<?php
				echo $this->Html->link('News', array(
					'controller' => 'news', 
					'action' => 'index'
				));
				echo $this->Html->link('Entrepreneurship Lab',
					'http://www.pace.edu/lubin/departments-and-research-centers/entrepreneurship-lubin/entrepreneurship-lab'
				);
			?>
		</li>
	</ul>
	<ul class="grid_3">
		<li><?php
			echo $this->Html->link('Contact Us', array(
				'controller' => 'pages',
				'action' => 'display',
				'contact'
			));
		?></li>
	</ul>
</div>