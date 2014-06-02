<div class="col-sm-2 sidebar-right">
	<h3>Recent movies</h3>
    <?php foreach ($recentMovies as $recentMovie):?>
    	<div class="col-sm-12 pull-center">
    		<?php if(isset($recentMovie['youtubeid'],$recentMovie['title'],$recentMovie['thumbnailres'],$recentMovie['link'])):?>
    			<h4><?php echo $recentMovie['title']?></h4>
    			<a href="<?php echo $recentMovie['link']?>">
    				<img class="video-thumbnail" src="<?php echo $recentMovie['thumbnailres']?>" alt="<?php echo $recentMovie['thumbnailres']?>" target="_blank">
    			</a>
    		<?php endif;?>
    	</div>
    <?php endforeach;?>
</div>