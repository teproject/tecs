
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<?php echo $this->Html->charset(); ?>
		<title>
			<?php echo $title_for_layout; ?>
		</title>
		<?php
			echo $this->Html->css('main');
			echo $this->Html->css('960-16-col-layout');
			echo $this->Html->css('nav-bar');
			echo $this->Html->css('bootstrap');
			
			echo $this->Html->script('jquery-1.8.2.min');
			echo $this->Html->script('easySlider1.7');
			echo $this->Html->script('jquery.autoellipsis-1.0.10.min');
			
			echo $this->fetch('meta');
			echo $this->fetch('css');
			echo $this->fetch('script');
		?>
	</head>
	<body>
		<div id="container" class="container_16">
			<?php 
				echo $this->element('header');
				echo $this->element('navbar');
			?>
			<div id="wrap">
				<!-- Left Container -->
				<div id="left-container" class="grid_11">
					<?php echo $this->Session->flash(); ?>
					<?php echo $this->Session->flash('auth'); ?>
					<?php echo $this->fetch('content'); ?>
				</div>
				<!-- right Container -->
				<div id="right-container" class="grid_5">
					<?php echo $this->element('right-col'); ?>
				</div>
			
			</div>
			<?php echo $this->element('footer'); ?>
		</div>
		<script type="text/javascript">
			// handle navbar submenus
			$(function() {
				$('.dropdown').mouseenter(function() {
					$('.sublinks').stop(false, true).hide();
					submenu = $(this).parent().next();
					width = $(this).parent().width();
					outerWidth = $(this).parent().outerWidth(true);
					submenu.css({
						width: width,
						position: 'absolute',
						top: ($(this).height() + 3) + 'px',
						//marginLeft: (outerWidth-width)/2,
						//marginRight: (outerWidth-width)/2,
						zIndex: 1000
					});
					submenu.stop().slideDown(300);
					submenu.mouseleave(function(){
						$(this).slideUp(300);
					});
				});
			});
		</script>
	</body>
</html>