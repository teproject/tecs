<!-- News -->
<h3>News &lt; Noteworthy</h3>
<ul id="news"><?php 
	foreach($news as $news){
		echo '<li>';
		echo $this->Html->link($this->upload->image($news, 'News.photo', array(
						'style' => 'medium'
					), array(
						'class'=>'thumb',
						'alt' => $news['News']['title']
				)), array(
				'controller' => 'news',
				'action' => 'view',
				$news['News']['id']
			), array(
				'escape' => false
			)
		);
		echo '<span class="date">'.date('M. j, Y', strtotime($news['News']['created'])).'</span>';
		echo '<div class="title">'.$this->Html->link(
			$news['News']['title'], array(
				'controller' => 'news',
				'action' => 'view',
				$news['News']['id']
			)).'</div>';
		echo '<div class="content">'.'<span>'.$news['News']['content'].'</span></div>';
		echo '</li>';
	}
?></ul>