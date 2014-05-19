<?php

/**
 * Class Videos
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Videos extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
        require 'application/views/_templates/head.php';
        require 'application/views/_templates/header.php';
        require 'application/views/videos/index.php';
        require 'application/views/_templates/footer.php';
    }
}
