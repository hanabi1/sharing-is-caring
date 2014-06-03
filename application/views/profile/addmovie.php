
<div class="col-sm-7 col-sm-offset-1">
	<div class="col-sm-10">
	<h3>Add a Youtube Movie</h3>
	<form action="<?php echo URL?>movies/addMovie" method="post">
	    <div class="form-group has-error">
	        <label for="inputLink">Link</label>
	        <input type="text" class="form-control" id="inputLink" name="link" placeholder="Movie Link...." required="require">
	    </div>
	    <button type="submit" class="btn btn-primary">Add</button>
	</form>
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
</div>
