<!-- Slider -->
<div id="slider">
	<ul>
		<?php 
		if(isset($slides)){
			foreach ($slides as $slide) {
				echo '<li>';
				echo $this->Html->link(
					$this->upload->image(
						$slide, 'Slide.photo', array(
							'style' => 'slide'), array(
							'alt' => $slide['Slide']['title']
						)),
					$slide['Slide']['link'],
					array(
						'escape' => false,
						'target' => '_blank',
						'title' => $slide['Slide']['title']
				));
				echo '</li>';
			}
		}
		?>
	</ul>
</div>