<div class="col-sm-7 col-sm-offset-1">
    <h2>Movies</h2>
    <?php foreach ($myMovies as $myMovie):?>
    	<div class="col-sm-12">
    		<div class="col-sm-3">
	    		<?php if(isset($myMovie['youtubeid'],$myMovie['title'],$myMovie['thumbnailres'],$myMovie['link'])):?>
	    			<a href="<?php echo $myMovie['link']?>">
	    				<img class="video-thumbnail" src="<?php echo $myMovie['thumbnailres']?>" alt="<?php echo $myMovie['thumbnailres']?>" target="_blank">
	    			</a>
	    		<?php endif;?>
	    	</div>
	    	<div class="col-sm-8">
	    		<h4><a href="<?php echo $myMovie['link']?>"><?php echo ucfirst($myMovie['title'])?></a></h4>
	    		<?php if(isset($myMovie['description'])):?>
	    			<p><?php echo ucfirst($myMovie['description'])?></p>
	    		<?php endif;?>		    		
	    	</div>
    	</div>	
    <?php endforeach ?>
</div>