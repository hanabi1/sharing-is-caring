<?php

class YoutubeModel
{
    /**
     * Every model needs a database connection, passed to the model
     * @param object $db A PDO database connection
     */
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    //Get the highest available thumbnail resolution string
    function getMaximumThumbnailSize($youtubeID=''){
        if(!$youtubeID){
            return false;
        }

        if(get_http_response_code('http://img.youtube.com/vi/' youtubeID '/maxresdefault.jpg') != '404'){
            return 'maxresdefault.jpg';
        }elseif(get_http_response_code('http://img.youtube.com/vi/' youtubeID '/hqdefault.jpg') != '404'){
            return 'hqdefault.jpg';
        }elseif(get_http_response_code('http://img.youtube.com/vi/' youtubeID '/mqdefault.jpg') != '404'){
            return 'mqdefault.jpg';
        }
        
        //Worst case scenario we return the default size 
        return 'default.jpg';
    }
    
    //Gets the header response ex 404
    private function get_http_response_code($url) {
        $headers = get_headers($url);
        return substr($headers[0], 9, 3);
    }
}
