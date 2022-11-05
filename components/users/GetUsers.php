<?php

/**
 * FILE NAME: GETUSERS.PHP
 * DEVELOPER NAME: ASHRAF DIAB
 * DESCRIPTION: GET THE USERS FROM THE FILE AND THE DATABASE
 */

class GetUsers
{
    /**
     * @method readUsersFromFile()
     * @description read users data from users file
     * @return array
     */
    public function readUsersFromFile()
    {
        $file = file_get_contents('data/users.json');
        $data = json_decode($file, true);
        return $data;
    }

    /**
     * @method readUsersFromDatabase()
     * @description read users data from database
     * @return array
     */
    public function readUsersFromDatabase()
    {
        global $conn;
        $users = [];
        
        $query = "SELECT * FROM `users`";
        $queryExecute = mysqli_query($conn, $query);
        while($row = mysqli_fetch_array($queryExecute)) {
            array_push($users, $row);
        }
        return $users;
    }
}

?>