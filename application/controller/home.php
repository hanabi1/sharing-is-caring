<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Home extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
        $movieModel = $this->loadModel('MoviesModel');               

        echo $this->dressTemplate('/_templates/head', array('title'=> 'Home'));      
        echo $this->dressTemplate('/_templates/header', array('title'=> 'Home', 
                                                              'isUserLoggedIn' => $this->userModel->isUserLoggedIn()));
                                                                
        require 'application/views/home/index.php';
        echo $this->dressTemplate('/_templates/sidebar-right', array('recentMovies'=> $movieModel->getMostRecentMovies())); 
        require 'application/views/_templates/footer.php';
    }
}
