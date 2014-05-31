<div class="col-sm-2 sidebar-right">
	<h3>Sidebar Right</h3>
	<h2>Most recent movies</h2>
    <?php foreach ($recentMovies as $recentMovie):?>
    	<div class="col-sm-8">
    		<?php if(isset($recentMovie['youtubeid'],$recentMovie['title'])):?>
    			<a href="http://www.youtube.com/watch?v=<?php echo $recentMovie['youtubeid']?>">
    				<img src="http://img.youtube.com/vi/<?php echo $recentMovie['youtubeid']?>/1.jpg" alt="<?php echo $recentMovie['title']?>" target="_blank">
    			</a>
    		<?php endif;?>
    	</div>
    <?php endforeach;?>
</div>