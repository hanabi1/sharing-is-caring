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
        return $query->fetch();
    }

    public function getMovieFromDBById($id)
    {
        $sql = "SELECT * FROM movies where id = :id limit 1";
        $query = $this->db->prepare($sql);
        $query->execute(array('id' => $id));

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // libs/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change libs/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetch();
    }

    public function getMovieFromDBByTitle($machineTitle)
    {
        $sql = "SELECT * FROM movies where machinetitle = :machinetitle limit 1";
        $query = $this->db->prepare($sql);
        $query->execute(array('machinetitle' => $machineTitle));

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // libs/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change libs/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
    }

    //Get all movies by its description
    //Converts both the search string and descriptions searched to upper case.
    //So that the search becomes case insensitive
    public function searchMoviesForString($searchString='')
    {
        //Convert search string to uppercase
        $searchString = strtoupper($searchString);

        //Convert the all descriptions to uppercase
        $sql = "SELECT * FROM movies where UPPER(description) LIKE :searchstring";
        $query = $this->db->prepare($sql);
        $query->execute(array('searchstring' => '%' . $searchString . '%'));

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // libs/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change libs/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
    }

    //Get all movies
    public function getAllMoviesFromDB()
    {
        $sql = "SELECT * FROM movies ORDER BY RAND()";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // libs/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change libs/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
    }

    public function addMovieToDB($movie){
        if(!isset($movie)){
            return false;
        }

        //Insert all the freshmovies into DB
        //We use placeholders :example that we populate before execution
        $sql = "INSERT INTO movies (title,machinetitle,description,link,thumbnailres,youtubeid,userid)
               VALUES (:title,:machinetitle,:description,:link,:thumbnailres,:youtubeid,:userid)";

        //Load up the statement we just used
        $query = $this->db->prepare($sql);

        //Loop over all the movies in the variable $freshMovies
        //Send them off one by one in the transaction

        $query->execute(array('title'=>$movie['title'],
                              'machinetitle'=>$movie['machinetitle'],
                              'description'=>$movie['description'],
                              'link'=>$movie['link'],
                              'thumbnailres'=>$movie['thumbnailres'],
                              'userid'=>$movie['userid'],
                              'youtubeid'=>$movie['youtubeid']
                        ));

    }

    public function deleteMovieFromDB($id=''){
        if(!$id){
            return false;
        }

        //Insert all the freshmovies into DB
        //We use placeholders :example that we populate before execution
        $sql = "DELETE FROM movies WHERE id = :id";

        //Load up the statement we just used
        $query = $this->db->prepare($sql);

        //Loop over all the movies in the variable $freshMovies
        //Send them off one by one in the transaction

        $query->execute(array('id' => $id));

    }


    /*
        For future purposes!!

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
    */


    //Get the most recently added movies
    public function getMostRecentMovies($numberOfMovies = 5)
    {
        $sql = "SELECT * FROM movies ORDER BY timestamp DESC LIMIT 0, :numberofmovies";
        $query = $this->db->prepare($sql);
        $query->bindParam(':numberofmovies', $numberOfMovies, PDO::PARAM_INT);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // libs/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change libs/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
    }


    //Get all user added movies in time-ascending order
    public function getAscOrderUserAddedMovies($userid = '')
    {
        $sql = "SELECT * FROM movies WHERE userid = :userid ORDER BY timestamp DESC";
        $query = $this->db->prepare($sql);
        $query->execute(array('userid'=> $userid));

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // libs/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change libs/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
    }

    public function insertMovieToDB($movie = array())
    {
        if(!count($movie)){
            return array();
        }

        $sql = "INSERT INTO movies SET
                                        link = :link,
                                        description = :description, 
                                        thumbnailres = :thumbnailres, 
                                        title = :title, 
                                        machinetitle = :machinetitle, 
                                        youtubeid = :youtubeid, 
                                        userid = :userid";
        $query = $this->db->prepare($sql);
        $query->execute(array('link' => $movie ['link'],
                              'description' => $movie ['description'],
                              'thumbnailres' => $movie ['thumbnailres'],
                              'title' => $movie ['title'],
                              'machinetitle' => $movie ['machinetitle'],
                              'youtubeid' => $movie ['youtubeid'],
                              'userid' => $movie ['userid']
            )); 
        
        return $generatedID;
    }


}


