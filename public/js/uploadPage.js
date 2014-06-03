$( document ).ready(function() {


  var r = new Resumable({
    target:'movies/uploadmovie'
  });
    
  r.assignBrowse(document.getElementById('browseButton'));

  r.on('fileSuccess', function(file){
      console.debug(file);
    });
  r.on('fileProgress', function(file){
      //console.debug(file);
    });
  r.on('fileAdded', function(file, event){
      r.upload();
      //console.debug(file, event);
    });
  r.on('filesAdded', function(array){
      //console.debug(array);
    });
  r.on('fileRetry', function(file){
      //console.debug(file);
    });
  r.on('fileError', function(file, message){
      console.debug(file, message);
    });
  r.on('uploadStart', function(){
      console.log('upploading');

    });
  r.on('complete', function(){
            console.log('complete');
    });
  r.on('progress', function(){
      //console.debug();
    });
  r.on('error', function(message, file){
      console.debug(message, file);
    });
  r.on('pause', function(){
      //console.debug();
    });
  r.on('cancel', function(){
      //console.debug();
    });
});