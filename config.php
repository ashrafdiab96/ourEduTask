<?php

/**
 * FILE NAME: CONFIG.PHP
 * DEVELOPER NAME: ASHRAF DIAB
 * DESCRIPTION: CONFIGURE DATABASE CONNECTION
 */
// ==============================================================================//

$serverName = 'localhost';  /* server name */
$userName = 'root';         /* user name */
$dbName = 'ouredutask';     /* database name */
$password = '';             /* password */

/* create new connection with the database */
$conn = mysqli_connect($serverName, $userName, $password, $dbName);

/* check if there is any connection error stop program and print a message */
if($conn->connect_error) {
    die("Database connection failed: ". $conn->connect_error);
}


?>