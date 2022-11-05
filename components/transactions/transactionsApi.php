<?php

/**
 * FILE NAME: TRANSACTIONSAPI.PHP
 * DEVELOPER NAME: ASHRAF DIAB
 * DESCRIPTION: SHOW THE TRANSACTIONS FROM THE DATABASE
 */

require('../../config.php');

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$transactions = [];

mysqli_select_db($conn,"ajax_demo");

$query = "SELECT * FROM `transactions`";
$queryExecute = mysqli_query($conn, $query);

while($row = mysqli_fetch_array($queryExecute)) {
    array_push($transactions, $row);
}

echo json_encode($transactions, true);

?>