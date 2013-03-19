<div class="slides index">
	<h2><?php echo __('Slides'); ?></h2>
	<?php 
		echo $this->Html->link(
			'<span id="add-action">New Slide</span>', 
			array('action' => 'add'), 
			array('escape' => false, 'title' => 'Add a news article')); 
	?>
	<?php
	$slideCnt = 0;
	echo '<ul id="slide-list">';
	foreach ($slides as $slide):
		$slideCnt++;
		if($slideCnt % 2 == 1){
			echo '<li class="slide-row">';
		}
		echo $this->Html->link(
			$this->upload->image($slide, 'Slide.photo', array(
				'style' => 'thumb'),
				array(
					'class' => 'slide',
					'alt' => $slide['Slide']['title']
				)
			), 
			array('action' => 'edit', $slide['Slide']['id']),
			array(
				'escape' => false,
				'title' => $slide['Slide']['title']
			)
		);
		if($slideCnt% 2 == 0) {
			echo '</li>';
		}
	endforeach;
	if($slideCnt%2 == 1) echo '</li>';
	echo '</ul>';
	?>
</div>