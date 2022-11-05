<?php

/**
 * FILE NAME: GETTRANSACTIONS.PHP
 * DEVELOPER NAME: ASHRAF DIAB
 * DESCRIPTION: GET THE TRANSACTIONS FROM THE FILE AND THE DATABASE
 */

class GetTransactions
{
    /**
     * @method readTransactionsFromFile()
     * @description read transactions data from users file
     * @return array
     */
    public function readTransactionsFromFile()
    {
        $file = file_get_contents('data/transactions.json');
        $data = json_decode($file, true);
        return $data;
    }

    /**
     * @method readTransactionsFromDatabase()
     * @description read transactions data from database
     * @return array
     */
    public function readTransactionsFromDatabase()
    {
        global $conn;
        $transactions = [];
        
        $query = "SELECT * FROM `transactions`";
        $queryExecute = mysqli_query($conn, $query);
        while($row = mysqli_fetch_array($queryExecute)) {
            array_push($transactions, $row);
        }
        return $transactions;
    }
}

?>