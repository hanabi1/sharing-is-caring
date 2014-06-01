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
     
        echo $this->dressTemplate('/_templates/head', array('title'=> $this->pageTitle)); 
        echo $this->dressTemplate('/_templates/header', array('title'=> $this->pageTitle));  
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

        echo $this->dressTemplate('/_templates/head', array('title'=> $this->pageTitle)); 
        echo $this->dressTemplate('/_templates/header', array('title'=> $this->pageTitle));  
        echo $this->dressTemplate('/movies/search', array('myMovies'=> $movieModel->searchMoviesForString($_POST['searchfield'])));
        echo $this->dressTemplate('/_templates/sidebar-right', array('recentMovies'=> $movieModel->getMostRecentMovies())); 
        require 'application/views/_templates/footer.php';
    }

    public function addMovie()
    {
        $movie = array();
        
        $movieModel = $this->loadModel('MoviesModel');
        $youtubeModel = $this->loadModel('YoutubeModel');
        
        $youtubeData = $youtubeModel->getYoutubeDataFromURL($_POST['link']);
        
        $movie['link']         = $youtubeData['entry']['link'][0]['href'];
        $movie['description']  = $youtubeData['entry']['media$group']['media$description']['$t'];
        $movie['youtubeid']    = $youtubeData['entry']['media$group']['yt$videoid']['$t'];
        $movie['thumbnailres'] = 'http://i1.ytimg.com/vi/7lCDEYXw3mM/default.jpg';        
        $movie['title']  = $youtubeData['entry']['media$group']['media$title']['$t'];
        $movie['machinetitle']  = $this->addMachineTitle($movie['title']);
        $movie['userid']  = $_SESSION['user_id'];

        $movieModel->addMovieToDB($movie);
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
}
