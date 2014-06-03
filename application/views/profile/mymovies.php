<div class="col-sm-8 col-sm-offset-1">
    <h2>My Movies</h2>
    <h3>My Recently added movies</h3>
    <?php foreach ($movies as $myMovie):?>
    	<div class="col-sm-12">
    		<div class="col-sm-3">
	    		<?php if(isset($myMovie['youtubeid'],$myMovie['title'],$myMovie['thumbnailres'],$myMovie['link'])):?>
	    			<a href="<?php echo $myMovie['link']?>">
	    				<img class="video-thumbnail" src="<?php echo $myMovie['thumbnailres']?>" alt="<?php echo $myMovie['thumbnailres']?>" target="_blank">
	    			</a>
	    		<?php endif;?>
	    	</div>
	    	<div class="col-sm-8">
	    		<?php if(isset($myMovie['title'],$myMovie['description'],$myMovie['id'])):?>
	    			<h4><?php echo $myMovie['title']?></h4>
	    			<p><?php echo $myMovie['description']?></p>
	    		<?php endif;?>		    		
	    	</div>
	    	<div class="col-sm-1">
	    		<a href="<?php echo URL;?>movies/delete/<?php echo $myMovie['id'];?>" alt="Remove" title="Remove This Movie">(X)</a>
	    	</div>
    	</div>	
    <?php endforeach ?>


	<div class="row">
		<div class="col-sm-8 col-sm-offset-1">
			<h3>Add a Youtube Movie</h3>
			<form action="<?php echo URL?>movies/addMovie" method="post">
			    <div class="form-group has-error">
			        <label for="inputLink">Link</label>
			        <input type="text" class="form-control" id="inputLink" name="link" placeholder="Movie Link...." required="require">
			    </div>
			    <button type="submit" class="btn btn-primary">Add</button>
			</form>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-8 col-sm-offset-1">
			<h3>Upload a movie</h3>
			<form enctype="multipart/form-data" action="<?php echo URL?>movies/addMovie" method="post">
					<label for="inputLink">Title</label>
			        <input type="text" class="form-control" id="inputTitle" name="title" placeholder="Movie Title...." required="require">					

					<label for="inputLink">Description</label>
			        <textarea type="text" class="form-control" id="inputDescription" name="description" placeholder="Movie Description...." required="require"></textarea>			        
			        
			        <label for="inputLink">Filepath</label>
			        <input type="file" class="form-control" name="filepenctype=”multipart/form-data” ath" placeholder="Filepath...." required="require"/>
		
			    <button type="submit" class="btn btn-primary">Upload</button>
			</form>
		</div>
		<div class="col-sm-8 col-sm-offset-1">
			<h3>Upload a movie with resumable_js</h3>
			<a href="#" id="browseButton">Select files</a>
		</div>
	</div>
</div>