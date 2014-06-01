<div class="col-sm-8 col-sm-offset-1">
    <h2>My Movies</h2>
    <h3>My Recently added movies</h3>
    <?php foreach ($movies as $myMovie):?>
    	<div class="col-sm-8">
    		<div class="col-sm-3">
	    		<?php if(isset($myMovie['youtubeid'],$myMovie['thumbnailres'],$myMovie['title'])):?>
	    			<a href="http://www.youtube.com/watch?v=<?php echo $myMovie['youtubeid']?>">
	    				<img class="video-thumbnail" src="http://img.youtube.com/vi/<?php echo $myMovie['youtubeid']?>/1.jpg" title="<?php echo $myMovie['title']?>" alt="<?php echo $myMovie['title']?>" target="_blank">
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


	<div class="row">
		
		<div class="col-sm-8 col-sm-offset-1">
			<h3>Add a movie</h3>
			<form action="<?php echo URL?>movies/addMovie" method="post">
			    <div class="form-group has-error">
			        <label for="inputTitle">Title</label>
			        <input type="text" class="form-control" id="inputTitle" name="title" placeholder="Movie Titel..." required="require">
			    </div>
			    <div class="form-group has-error">
			        <label for="inputLink">Link</label>
			        <input type="text" class="form-control" id="inputLink" name="link" placeholder="Movie Link...." required="require">
			    </div>
			    <button type="submit" class="btn btn-primary">Upload</button>
			</form>
		</div>
	</div>
</div>