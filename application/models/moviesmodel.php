<?php

class MoviesModel
{
    /**
     * Every model needs a database connection, passed to the model
     * @param object $db A PDO database connection
     */
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            try {
                $this->db = $db;
            }catch (PDOException $e) {
                exit;
            }
        }

    }
    

    //Get a single movie by its machineTitle
    public function getMovieFromDB($machineTitle)
    {
        $sql = "SELECT * FROM movies where :machinetitle = machinetitle ";
        $query = $this->db->prepare($sql);
        $query->execute(array('machinetitle' => $machineTitle));

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // libs/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change libs/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
    }

    //Get a single movie by its machineTitle
    public function getAllMoviesFromDB($machineTitle)
    {
        $sql = "SELECT * FROM movies";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // libs/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change libs/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
    }

    public function cacheMoviesToDB($freshMovies){
        if(!isset($freshMovies)){
            return false;
        }
        
        //Clear table
        //TRUNCATE is faster than DELETE
        $sql = "TRUNCATE TABLE movies";
        $query = $this->db->prepare($sql);
        $query->execute();


        //Insert all the freshmovies into DB
        //We use placeholders :example that we populate before execution
        $sql = "INSERT INTO movies (title,machinetitle,description,link,thumbnailres,id)
               VALUES (:title,:machinetitle,:description,:link,:thumbnail,:id)";

        //Load up the statement we just used
        $query = $this->db->prepare($sql);

        //Here we tell PDO we will do a lot of queries after one another
        //so PDO will give us Top Speed!
        $this->db->beginTransaction();

        //Loop over all the movies in the variable $freshMovies
        //Send them off one by one in the transaction
        foreach ($freshMovies as $movie) {
            $query->execute(array('title'=>$movie['title'],
                                  'machinetitle'=>$movie['machinetitle'],
                                  'description'=>$movie['description'],
                                  'link'=>$movie['link'],
                                  'thumbnail'=>$movie['thumbnail'],
                                  'id'=>$movie['id']
                            ));
        }

        //return the status of the transaction
        return $this->db->commit();
    }
}