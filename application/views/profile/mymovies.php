<div class="col-sm-8 col-sm-offset-1">
    <h2>My Movies</h2>
    <?php foreach ($myMovies as $myMovie):?>
    	<div class="col-sm-8">
    		<div class="col-sm-3">
	    		<?php if(isset($myMovie['youtubeid'],$myMovie['thumbnailres'],$myMovie['title'])):?>
	    			<a href="http://www.youtube.com/watch?v=<?php echo $myMovie['youtubeid']?>">
	    				<img src="http://img.youtube.com/vi/<?php echo $myMovie['youtubeid']?>/1.jpg" title="<?php echo $myMovie['title']?>" alt="<?php echo $myMovie['title']?>" target="_blank">
	    			</a>
	    		<?php endif;?>
	    	</div>
	    	<div class="col-sm-8 col-sm-offset-1">
	    		<?php if(isset($myMovie['description'])):?>
	    			<p><?php echo $myMovie['description']?></p>
	    		<?php endif;?>		    		
	    	</div>
    	</div>	
    <?php endforeach ?>
</div>