<div class="news index">
		<h2><?php echo __('News'); ?></h2>
		<?php
			if($loggedIn){
				echo $this->Html->link(
					'<span id="add-action">New Article</span>', 
					array('action' => 'add'), 
					array('escape' => false, 'title' => 'Add a news article')); 
			}
		?>
	<ul id="news">
	<?php 
		if (!empty($news)){
			$news = array_reverse($news);
			foreach ($news as $news) {
				echo '<li class="news-item">';
				echo $this->Html->link($this->upload->image($news, 'News.photo', array(
								'style' => 'medium'
							), array(
								'class'=>'thumb',
								'alt' => $news['News']['title']
						)), array(
						'action' => 'view',
						$news['News']['id']
					), array(
						'escape' => false
					)
				);
				echo '<span class="date">'.date('M. j, Y', strtotime($news['News']['created'])).'</span>';
				if($loggedIn){
					echo '<span class="actions">';
					echo '&nbsp'.$this->Html->link(
						$this->Html->image("icons/edit.png", array( 
							'alt' => 'Edit', 
							'title' => 'Edit '.$news['News']['title'],
							'class' => 'edit-icon top')),									
								array(
									'controller' => 'news', 
									'action' => 'edit', 
									$news['News']['id']
								), array('escape' => false));
					//echo icon for deleting the news item
					echo '&nbsp'.$this->Html->link(
						$this->Html->image("icons/remove.png", array(
							'alt' => 'Delete', 
							'title' => 'Delete '.$news['News']['title'],
							'class' => 'edit-icon')),
								array('action' => 'delete', $news['News']['id']), array('escape'=>false),
									"Are you sure you want to delete ".$news['News']['title']."?");
					echo '</span>';
				}
				echo '<div class="title">'.$this->Html->link(
					$news['News']['title'], array(
						'action' => 'view',
						$news['News']['id']
					)).'</div>';
				echo '<div class="content"><span>'.$news['News']['content'].'</span></div>';
				echo '</li>';
			}
	?>
	</ul>
	<?php 
		}
		else {
			echo 'There are no news items at this time.';
		}
	?>
</div>
<script type="text/javascript">
			$(document).ready(function () {
				$("div.content").ellipsis();
			});
</script>