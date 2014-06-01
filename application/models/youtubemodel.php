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

        if(get_http_response_code('http://img.youtube.com/vi/' . youtubeID . '/maxresdefault.jpg') != '404'){
            return 'maxresdefault.jpg';
        }elseif(get_http_response_code('http://img.youtube.com/vi/' . youtubeID . '/hqdefault.jpg') != '404'){
            return 'hqdefault.jpg';
        }elseif(get_http_response_code('http://img.youtube.com/vi/' . youtubeID . '/mqdefault.jpg') != '404'){
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


    public function getYoutubeDataFromURL($url=''){

        if(!$url){
            return false;
        }

        $youtubeID = $this->youtubeIDFromURL($url);

        if(!$youtubeID){
            return false;
        }

        //Starts cURL 
        $ch = curl_init();
        
        //Sets up the url to get
        curl_setopt($ch, CURLOPT_URL, 'http://gdata.youtube.com/feeds/api/videos/' . $youtubeID . '?v=2&alt=json');
        
        curl_setopt($ch, CURLOPT_HEADER, 0);
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        //Enables ÅÄÖ
        curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');
        
        //If server is slow, only wait 10 sec
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        
        //Variable that recieves RAW data from connection
        $output = curl_exec($ch);
        
        //Close connection, cleaning up...
        curl_close($ch);

        //Return the relevant data as JSON
        return json_decode($output,true);

    }

    public function youtubeIDFromURL($url) {
        $pattern = 
            '%^# Match any youtube URL
            (?:https?://)?  # Optional scheme. Either http or https
            (?:www\.)?      # Optional www subdomain
            (?:             # Group host alternatives
              youtu\.be/    # Either youtu.be,
            | youtube\.com  # or youtube.com
              (?:           # Group path alternatives
                /embed/     # Either /embed/
              | /v/         # or /v/
              | /watch\?v=  # or /watch\?v=
              )             # End path alternatives.
            )               # End host alternatives.
            ([\w-]{10,12})  # Allow 10-12 for 11 char youtube id.
            $%x'
            ;
        $result = preg_match($pattern, $url, $matches);

        if ($result) {
            return $matches[1];
        }
        return false;
    }

}
