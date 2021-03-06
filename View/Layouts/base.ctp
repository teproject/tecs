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
			echo $this->Html->css('screen');
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
				echo $this->element('admin-panel');
			?>
			<div id="wrap">
				<!-- Left Container -->
				<div id="left-container" class="grid_11">
					<?php echo $this->Session->flash(); ?>
					<?php echo $this->Session->flash('auth'); ?>
					<?php echo $this->element('slider'); ?>
					<?php echo $this->element('news'); ?>
				</div>
				<!-- Right Container -->
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
			// activate slideshow
			$(document).ready(function () {
				$("#slider").easySlider({
					auto: true,
					continuous: true
				});
				$(".title").ellipsis();
				$("div.content").ellipsis(
				//	'div.content', {
					//'ellipsis' : '<a href="#">.................................</a>'
				//}
				);
			});
		</script>
		<script type="text/javascript">
		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-40174191-1']);
		  _gaq.push(['_trackPageview']);
		  (function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();
		</script>
	</body>
</html>