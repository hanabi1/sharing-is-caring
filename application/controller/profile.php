<?php

/**
 * Class Profile
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Profile extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
        echo $this->dressTemplate('/_templates/head', array('title'=> $this->pageTitle));     
        echo $this->dressTemplate('/_templates/header', array('title'=> $this->pageTitle));    
        require 'application/views/profile/index.php';
        require 'application/views/_templates/footer.php';
    }

    public function mymovies()
    {
        $movieModel = $this->loadModel('MoviesModel');       

        echo $this->dressTemplate('/_templates/head', array('title'=> $this->pageTitle)); 
        echo $this->dressTemplate('/_templates/header', array('title'=> $this->pageTitle));  
        echo $this->dressTemplate('/profile/mymovies', array('myMovies'=> $movieModel->getAllMoviesFromDB()));
        require 'application/views/_templates/footer.php';
    }

    public function messages()
    {
        echo $this->dressTemplate('/_templates/head', array('title'=> $this->pageTitle));     
        echo $this->dressTemplate('/_templates/header', array('title'=> $this->pageTitle));  
        require 'application/views/profile/messages.php';
        require 'application/views/_templates/footer.php';
    }

    public function logout()
    {
        $_SESSION = array();
        session_destroy();
        
        $this->redirectToPage('home');
    }

    public function login()
    {
        echo $this->dressTemplate('/_templates/head', array('title'=> $this->pageTitle));     
        echo $this->dressTemplate('/_templates/header', array('title'=> $this->pageTitle));  
        require 'application/views/profile/login.php';
        require 'application/views/_templates/footer.php';
    }

    public function callbackHandler(){

        require 'application/tools/oneall/oneall_callbackhandler.php';
    }
}
