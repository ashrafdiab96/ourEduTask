<?php

/**
 * FILE NAME: TRANSACTIONSAPI.PHP
 * DEVELOPER NAME: ASHRAF DIAB
 * DESCRIPTION: SHOW THE TRANSACTIONS FROM THE DATABASE
 */

require('../config.php');

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$transactions = [];
$action = $_GET['action'];
$value = $_GET['val'];
$value2 = $_GET['val2'] ?? null;

mysqli_select_db($conn,"ajax_demo");

$query = "SELECT transactions.*, users.*
            FROM transactions
            JOIN users
            ON transactions.parentEmail = users.email ";

if($action == 'statusFilter') {
    $query .= "WHERE transactions.statusCode = $value";
} else if($action == 'currencyFilter') {
    $query .= "WHERE transactions.Currency = '$value'";
} else if($action == 'amuntFilter') {
    $query .= "WHERE transactions.paidAmount BETWEEN $value AND $value2";
} else if($action == 'dateFilter') {
    $query .= "WHERE transactions.paymentDate BETWEEN '$value' AND '$value2'";
}

$queryExecute = mysqli_query($conn, $query);

while($row = mysqli_fetch_array($queryExecute)) {
    array_push($transactions, $row);
}

echo json_encode($transactions, true);

?>