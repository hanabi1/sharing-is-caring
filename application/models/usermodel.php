<?php

class UserModel
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

    public function isUserLoggedIn(){
        return false;  
    }
    
    private function GetUserIdForUserToken($user_token){
        // Execute the query: SELECT user_id FROM user_social_link WHERE user_token = <user_token>
        // Return the user_id or null if none found.
   
        $sql = "SELECT user_id FROM user_social_link WHERE user_token = :usertoken";
        $query = $this->db->prepare($sql);
        $query->execute(array('usertoken' => $user_token));

        // fetchAll() is the PDO method that gets all result rows.
        return $query->fetchAll();
    }

    private function GetUserTokenForUserId($user_id){
        // Execute the query: SELECT user_token FROM user_social_link WHERE user_id = <user_id>
        // Return the user_token or null if none found.
        
        $sql = "SELECT user_token FROM user_social_link WHERE user_id = :userid";
        $query = $this->db->prepare($sql);
        $query->execute(array('userid' => $user_id));

        // fetchAll() is the PDO method that gets all result rows.
        return $query->fetchAll();    

    }

    private function LinkUserTokenToUserId($user_token, $user_id){
        // Execute the query: INSERT INTO user_social_link SET user_token = <user_token>, user_id = <user_id>
        // Nothing has to be returned
        $sql = "INSERT INTO user_social_link SET user_token = :usertoken , user_id = :userid";
        $query = $this->db->prepare($sql);
        $query->execute(array('usertoken' => $user_token,
                              'userid' => $user_id)); 
    }

    private function UnlinkUserTokenFromUserId($user_token, $user_id){
        // Execute the query: DELETE FROM user_social_link WHERE user_token = <user_token> AND user_id = <user_id>
        // Nothing has to be returned
        $sql = "DELETE FROM user_social_link WHERE user_token = :usertoken AND user_id = :userid";
        $query = $this->db->prepare($sql);
        $query->execute(array('usertoken' => $user_token,
                              'userid' => $user_id));     

    }
    private function createUserId(){
        $sql = "INSERT INTO user_social_link SET user_id = :userid";
        $query = $this->db->prepare($sql);
        $query->execute(array('userid' => rand(7, 7))); 
        
        return $query->fetchAll();
    }
}
