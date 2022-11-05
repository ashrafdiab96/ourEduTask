<?php

/**
 * FILE NAME: SAVEUSERS.PHP
 * DEVELOPER NAME: ASHRAF DIAB
 * DESCRIPTION: SAVE THE USERS IN DATABASE
 */

session_start();

// ==============================================================================//
/* get config fle to connect with the database */
require('./config.php');

class SaveUsers
{
    /**
     * @method saveNewUsers()
     * save the users
     * @return void
     */
    public function saveNewUsers()
    {
        global $conn;
        $users = new GetUsers();
        $data = $users->readUsersFromFile();
        $checkUsers = $this->checkUserExists();

        foreach($data as $allUsers)
        {
            foreach($allUsers as $user)
            {
                $balance = $user['balance'];
                $currency = $user['currency'];
                $email = $user['email'];
                $date = date('Y-m-d', strtotime(str_replace('/', '-', $user['created_at'])));
                $id = $user['id'];

                if($checkUsers == 'true')
                {
                    $query = "INSERT INTO `users`
                                (`balance`, `currency`, `email`, `created_at`, `customId`)
                                VALUES
                                ($balance, '$currency', '$email', '$date', '$id')";
                    $queryExecute = mysqli_query($conn, $query);
                }
            }
        }
    }

    /**
     * @method checkUserExists()
     * check if the users are exist or not
     * @return string
     */
    private function checkUserExists()
    {
        $users = new GetUsers();
        $data = $users->readUsersFromDatabase();
        if(!count($data) > 0)
        {
            return 'true';
        }
        return 'false';
    }

}

session_destroy();

?>