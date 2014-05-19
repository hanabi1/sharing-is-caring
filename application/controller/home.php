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
        echo $this->dressTemplate('/_templates/head', array('title'=> 'Home'));     
        echo $this->dressTemplate('/_templates/header', array('title'=> 'Home'));  
        require 'application/views/home/index.php';
        require 'application/views/_templates/footer.php';
    }
}
