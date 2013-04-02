<div class="news view">
	<h2 id="title"><?php echo $news['News']['title']; ?></h2>
	<?php
		// display photo:
		echo $this->upload->image($news, 'News.photo', array(
				'style' => 'medium'
			), array(
				'class' => 'thumb',
				'id' => 'news-image',
				'alt' => $news['News']['title']
			));
		
		// display date:
		echo '<span class="date">'.date('M. j, Y', strtotime($news['News']['created'])).'</span>';
		
		// if applicable, display actions available to administrators:
		if($isAdmin){
			echo '<span class="actions">';
			echo $this->Html->link(
				$this->Html->image("icons/edit.png", array( 
					'alt' => 'Edit', 
					'title' => 'Edit '.$news['News']['title'],
					'class' => 'edit-icon top')) . 'Edit Article',									
						array(
							'controller' => 'news', 
							'action' => 'edit', 
							$news['News']['id']
						), array('escape' => false));
			//echo icon for deleting the news item
			echo $this->Html->link(
				$this->Html->image("icons/remove.png", array(
					'alt' => 'Delete', 
					'title' => 'Delete '.$news['News']['title'],
					'class' => 'edit-icon')) . 'Delete Article',
						array('action' => 'delete', $news['News']['id']), array('escape'=>false),
							"Are you sure you want to delete ".$news['News']['title']."?");
			echo '</span>';
		}
		echo '<div id="news-content">'.$news['News']['content'].'</div>';
	?>
</div>