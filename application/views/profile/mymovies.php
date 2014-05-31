<div class="row">
    <div class="col-sm-8 col-sm-offset-1">
	    <h2>My Movies</h2>
	    <?php foreach ($myMovies as $myMovie):?>
	    	<div class="col-sm-8">
	    		<?php if(isset($youtubeid,$thumbnailres,$title)):?>
	    			<a href="http://www.youtube.com/watch?v=<?php echo $videoID?>">
	    				<img src="http://img.youtube.com/vi/<?php echo $videoID?>/<?php echo $thumbnailres?>" alt="<?php echo $title?>" target="_blank">
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