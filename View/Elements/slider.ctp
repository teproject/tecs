<!-- Slider -->
<div id="slider">
	<ul>
		<?php 
		foreach ($slides as $slide) {
			echo '<li>';
			echo $this->Html->link(
				$this->upload->image(
					$slide, 'Slide.photo', array(
						'style' => 'slide')),
				'http://'.$slide['Slide']['link'],
				array(
					'escape' => false,
					'target' => '_blank',
					'title' => $slide['Slide']['title']
			));
			echo '</li>';
		}
		?>
	</ul>
</div>