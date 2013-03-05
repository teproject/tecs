<!-- News -->
<ul id="news">
	<h3>News & Noteworthy</h3>
	<?php 
		foreach($news as $news){
			echo '<li>';
			echo $this->upload->image($news, 'News.photo', array(
				'style' => 'medium'
			), array(
				'class'=>'thumb'));
			echo '<span class="date">'.date('M. j, Y', strtotime($news['News']['created'])).'</span>';
			echo '<div class="title">'.$news['News']['title'].'</div>';
			echo '<div class="content">'.$news['News']['content'].'</div>';
			echo '</li>';
		}
	?>
</ul>