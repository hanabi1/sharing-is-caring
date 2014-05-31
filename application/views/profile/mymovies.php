<div class="row">
    <div class="col-sm-8 col-sm-offset-1">
	    <h2>My Movies</h2>
	    <?php foreach ($myMovies as $myMovie):?>
	    	<div class="col-sm-8">
	    		<?php if(isset($myMovie['youtubeid'],$myMovie['thumbnailres'],$myMovie['title'])):?>
	    			<a href="http://www.youtube.com/watch?v=<?php echo $myMovie['youtubeid']?>">
	    				<img src="http://img.youtube.com/vi/<?php echo $myMovie['youtubeid']?>/mqres.jpg" alt="<?php echo $myMovie['title']?>" target="_blank">
	    			</a>
	    		<?php endif;?>
	    	</div>	
	    <?php endforeach ?>
	</div>
	<div class="col-sm-2 sidebar-right">
		<h3>Sidebar Right</h3>
		<p>Does your lorem ipsum text long for something a little meatier? Give our generator a try… it’s tasty!</p>
	</div>
</div>