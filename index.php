<?php

/**
 * FILE NAME: INDEX.PHP
 * DEVELOPER NAME: ASHRAF DIAB
 * DESCRIPTION: SHOW THE MAIN PROGRAM FILE
 */
// ============================================================================== //
// get config fle to connect with the database
require('./config.php');
// ============================================================================== //
// get GetUsers class
require('./components/users/GetUsers.php');
// ============================================================================== //
// get SaveUsers class
require('./components/users/SaveUsers.php');
// ============================================================================== //
// get GetTransactions class
require('./components/transactions/GetTransactions.php');
// ============================================================================== //
// get SaveTransactions class
require('./components/transactions/SaveTransactions.php');
// ============================================================================== //

// get users data which stored in the database
$users = new GetUsers();
$usersData = $users->readUsersFromDatabase();

// ============================================================================== //

// save users data in the database
$saveUsers = new SaveUsers();
$saveUsers->saveNewUsers();

// ============================================================================== //

// get transactions data which stored in the database
$transactions = new GetTransactions();
$transactionsData = $transactions->readTransactionsFromDatabase();

// ============================================================================== /

// save transactions data in the database
$saveTransactions = new SaveTransactions();
$test = $saveTransactions->saveNewTransactions();

// ============================================================================== //

// show the home page
include('./views/index.html');

// ============================================================================== //

?>