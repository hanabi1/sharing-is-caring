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
}
