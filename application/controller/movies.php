<?php

/**
 * Class Videos
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Movies extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
        $movieModel = $this->loadModel('MoviesModel');
     
        echo $this->dressTemplate('/_templates/head', array('title'=> 'Home'));  
        echo $this->dressTemplate('/_templates/header', array('title'=> $this->pageTitle, 
                                                              'isUserLoggedIn' => $this->userModel->isUserLoggedIn()));

        echo $this->dressTemplate('/movies/index', array('myMovies'=> $movieModel->getAllMoviesFromDB()));
        echo $this->dressTemplate('/_templates/sidebar-right', array('recentMovies'=> $movieModel->getMostRecentMovies())); 
        require 'application/views/_templates/footer.php';
    }

    public function search()
    {
        if(!isset($_POST['searchfield']) || !$_POST['searchfield']){
            $this->redirectToPage('');
            exit;
        }

        $movieModel = $this->loadModel('MoviesModel');

        echo $this->dressTemplate('/_templates/head', array('title'=> 'Home'));   
        echo $this->dressTemplate('/_templates/header', array('title'=> $this->pageTitle, 
                                                              'isUserLoggedIn' => $this->userModel->isUserLoggedIn()));
                                                               
        echo $this->dressTemplate('/movies/search', array('myMovies'=> $movieModel->searchMoviesForString($_POST['searchfield'])));
        echo $this->dressTemplate('/_templates/sidebar-right', array('recentMovies'=> $movieModel->getMostRecentMovies())); 
        require 'application/views/_templates/footer.php';
    }

    public function addMovie()
    {

        if($this->userModel->isUserLoggedIn() === false){
            $this->redirectToPage('');
            return false;
        }

        if(isset($_POST['link'])){
            $this->addYoutubeMovie();
        }
        
        if(isset($_FILES,$_POST['title'],$_POST['description'])){
            $this->uploadMovie();
        }
        $this->redirectToPage('profile/mymovies');
        return false;

    }
    public function delete($id='')
    {
        if(!$id || $this->userModel->isUserLoggedIn() === false){
            $this->redirectToPage('');
        }

        $movieModel = $this->loadModel('MoviesModel');
        $movie = $movieModel->getMovieFromDBByID($id);

        if($movie['userid'] === $_SESSION['user_id']){
            $movieModel->deleteMovieFromDB($id);
            $this->redirectToPage('profile/mymovies');
        }else{
            echo '<h1>DELETING OTHER PEOPLES...SHAME ON YOU!!!</h1>';
            echo '<p>Click this link to return to the homepage</p>';
            echo '<a href="'. URL . '">I\'m a bad person....but I promise to behave</a>';

        }

        
    }
    /*
    private function uploadMovie(){
        $movie = array();
                echo $this->dressTemplate('/_templates/head', array('title'=> 'Home'));   
        $movieModel = $this->loadModel('MoviesModel');

     
        
        $file = $_FILES['filepenctype=”multipart/form-data”_ath'];
        var_dump($file);   
        
        $target_path = UPLOAD_DIR . basename($file['name']);  
        
        if(!move_uploaded_file($file['tmp_name'], $target_path)) {
            $this->redirectToPage('');
        }

        shell_exec('ffmpeg -i ' . $target_path . ' -ss 0 -s 120x90 -vframes 1 ' . $target_path .'-thumb.jpg');    

        $movie['link']         = $target_path;
        $movie['description']  = nl2br($_POST['description']);
        $movie['youtubeid']    = mt_rand(10000000, 99999999);
        $movie['title']        = nl2br($_POST['title']);
        $movie['machinetitle'] = $this->addMachineTitle($movie['title']);
        
        $movie['thumbnailres'] = URL . $target_path .'-thumb.jpg';        
        $movie['userid']       = $_SESSION['user_id'];   

        $movieModel->addMovieToDB($movie);
        $this->redirectToPage('profile/mymovies'); 
    }
*/
    private function addYoutubeMovie(){
        $movie = array();
        
        $movieModel = $this->loadModel('MoviesModel');
        $youtubeModel = $this->loadModel('YoutubeModel');
        
        $youtubeData = $youtubeModel->getYoutubeDataFromURL($_POST['link']);

        if(!$youtubeData){
            $this->redirectToPage('profile/mymovies');
            return false;

        }

        $movie['link']         = $youtubeData['entry']['link'][0]['href'];
        $movie['description']  = nl2br($youtubeData['entry']['media$group']['media$description']['$t']);
        $movie['youtubeid']    = $youtubeData['entry']['media$group']['yt$videoid']['$t'];
        $movie['thumbnailres'] = 'http://i1.ytimg.com/vi/' . $movie['youtubeid'] . '/1.jpg';        
        $movie['title']        = nl2br($youtubeData['entry']['media$group']['media$title']['$t']);
        $movie['machinetitle'] = $this->addMachineTitle($movie['title']);
        $movie['userid']       = $_SESSION['user_id'];

        $movieModel->addMovieToDB($movie);

        $this->redirectToPage('profile/mymovies');        
    }

    private function addMachineTitle($title=''){
        if(!$title){
            return false;
        }

        //Here follows a string example with what is happening.
        //
        //Original exampĺe string.
        //'Överväg_Nu    Denna Titel!'
           
        //Transform all chars into lowercase
        //String now becomes 'överväg_nu    denna titel!'
        $title = strtolower($title);
        
        //Set the chars set to change
        $charsToChange = array('å' => 'a',
                               'ä' => 'a',
                               'ö' => 'o',
                               ' ' => '-',
                               '_' => '-');
        //String now becomes 'overvag-nu----denna-titel!'
        $title = strtr($title,$charsToChange);

        //Removes all special chars not 'a-z' '0-9' and '-'
        //String now becomes  'overvag-nu----denna-titel'
        $title = preg_replace('/[^a-z0-9\-]/', '', $title);
        
        //Remove multiple dashes with one dash
        //String now becomes  'overvag-nu-denna-titel'
        $title = preg_replace('/(-)\1+/', '-', $title);

        //Valid MachineTitel for URL purposes!

        //Return movie array with valid Machinenames!
        return $title;
    }

# Sample server implementation in PHP 
/**
 * This is the implementation of the server side part of
 * Resumable.js client script, which sends/uploads files
 * to a server in several chunks.
 *
 * The script receives the files in a standard way as if
 * the files were uploaded using standard HTML form (multipart).
 *
 * This PHP script stores all the chunks of a file in a temporary
 * directory (`temp`) with the extension `_part<#ChunkN>`. Once all 
 * the parts have been uploaded, a final destination file is
 * being created from all the stored parts (appending one by one).
 *
 * @author Gregory Chris (http://online-php.com)
 * @email www.online.php@gmail.com
 */


////////////////////////////////////////////////////////////////////
// THE FUNCTIONS
////////////////////////////////////////////////////////////////////

/**
 *
 * Logging operation - to a file (upload_log.txt) and to the stdout
 * @param string $str - the logging string
 */
function _log($str) {

    // log to the output
    $log_str = date('d.m.Y').": {$str}\r\n";
    echo $log_str;

    // log to file
    if (($fp = fopen('upload_log.txt', 'a+')) !== false) {
        fputs($fp, $log_str);
        fclose($fp);
    }
}

/**
 * 
 * Delete a directory RECURSIVELY
 * @param string $dir - directory path
 * @link http://php.net/manual/en/function.rmdir.php
 */
function rrmdir($dir) {
    if (is_dir($dir)) {
        $objects = scandir($dir);
        foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
                if (filetype($dir . "/" . $object) == "dir") {
                    rrmdir($dir . "/" . $object); 
                } else {
                    unlink($dir . "/" . $object);
                }
            }
        }
        reset($objects);
        rmdir($dir);
    }
}

/**
 *
 * Check if all the parts exist, and 
 * gather all the parts of the file together
 * @param string $dir - the temporary directory holding all the parts of the file
 * @param string $fileName - the original file name
 * @param string $chunkSize - each chunk size (in bytes)
 * @param string $totalSize - original file size (in bytes)
 */
function createFileFromChunks($temp_dir, $fileName, $chunkSize, $totalSize) {

    // count all the parts of this file
    $total_files = 0;
    foreach(scandir($temp_dir) as $file) {
        if (stripos($file, $fileName) !== false) {
            $total_files++;
        }
    }

    // check that all the parts are present
    // the size of the last part is between chunkSize and 2*$chunkSize
    if ($total_files * $chunkSize >=  ($totalSize - $chunkSize + 1)) {

        // create the final destination file 
        if (($fp = fopen('temp/'.$fileName, 'w')) !== false) {
            for ($i=1; $i<=$total_files; $i++) {
                fwrite($fp, file_get_contents($temp_dir.'/'.$fileName.'.part'.$i));
                _log('writing chunk '.$i);
            }
            fclose($fp);
        } else {
            _log('cannot create the destination file');
            return false;
        }

        // rename the temporary directory (to avoid access from other 
        // concurrent chunks uploads) and than delete it
        if (rename($temp_dir, $temp_dir.'_UNUSED')) {
            rrmdir($temp_dir.'_UNUSED');
        } else {
            rrmdir($temp_dir);
        }
    }

}


    ////////////////////////////////////////////////////////////////////
    // THE SCRIPT
    ////////////////////////////////////////////////////////////////////
    public function uploadMovie(){
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {

            $temp_dir = 'temp/'.$_GET['resumableIdentifier'];
            $chunk_file = $temp_dir.'/'.$_GET['resumableFilename'].'.part'.$_GET['resumableChunkNumber'];
            if (file_exists($chunk_file)) {
                 header("HTTP/1.0 200 Ok");
               } else
               {
                 header("HTTP/1.0 404 Not Found");
               }
            }



        // loop through files and move the chunks to a temporarily created directory
        if (!empty($_FILES)) foreach ($_FILES as $file) {

            // check the error status
            if ($file['error'] != 0) {
                _log('error '.$file['error'].' in file '.$_POST['resumableFilename']);
                continue;
            }

            // init the destination file (format <filename.ext>.part<#chunk>
            // the file is stored in a temporary directory
            $temp_dir = '/public/videos/'.$_POST['resumableIdentifier'];
            $dest_file = $temp_dir.'/'.$_POST['resumableFilename'].'.part'.$_POST['resumableChunkNumber'];

            // create the temporary directory
            if (!is_dir($temp_dir)) {
                mkdir($temp_dir, 0777, true);
            }

            // move the temporary file
            if (!move_uploaded_file($file['tmp_name'], $dest_file)) {
                _log('Error saving (move_uploaded_file) chunk '.$_POST['resumableChunkNumber'].' for file '.$_POST['resumableFilename']);
            } else {

                // check if all the parts present, and create the final destination file
                createFileFromChunks($temp_dir, $_POST['resumableFilename'], 
                        $_POST['resumableChunkSize'], $_POST['resumableTotalSize']);
            }
        }
    }

}
