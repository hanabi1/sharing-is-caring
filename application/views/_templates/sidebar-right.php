<div class="col-sm-3 col-sm-offset-1 pull-center sidebar-right">
	<h3>Recent movies</h3>
    <?php foreach ($recentMovies as $recentMovie):?>
		<div class="recentmovierow">
            <?php if(isset($recentMovie['youtubeid'],$recentMovie['title'],$recentMovie['thumbnailres'],$recentMovie['link'])):?>
    			<a href="<?php echo $recentMovie['link']?>">
    				<img class="video-thumbnail" src="<?php echo $recentMovie['thumbnailres']?>" alt="<?php echo $recentMovie['thumbnailres']?>" target="_blank">
    			</a>
                <h4><?php echo $recentMovie['title']?></h4>
    		<?php endif;?>
        </div>
       <?php endforeach;?>
</div>