<?php

/**
 * FILE NAME: SAVETRANSACTIONS.PHP
 * DEVELOPER NAME: ASHRAF DIAB
 * DESCRIPTION: SAVE THE TRANSACTIONS IN DATABASE
 */

session_start();

// ==============================================================================//
/* get config fle to connect with the database */
require('./config.php');

class SaveTransactions
{
    /**
     * @method saveNewTransactions()
     * save the transactions
     * @return void
     */
    public function saveNewTransactions()
    {
        global $conn;
        $transactions = new GetTransactions();
        $data = $transactions->readTransactionsFromFile();
        $checkTransaction = $this->checkTransactionExists();

        foreach($data as $allTransactions)
        {
            foreach($allTransactions as $trans)
            {
                $paidAmount = $trans['paidAmount'];
                $Currency = $trans['Currency'];
                $parentEmail = $trans['parentEmail'];
                $statusCode = $trans['statusCode'];
                $date = date('Y-m-d', strtotime(str_replace('/', '-', $trans['paymentDate'])));
                $parentIdentification = $trans['parentIdentification'];

                if($checkTransaction == 'true')
                {
                    $query = "INSERT INTO `transactions`
                                (`paidAmount`, `Currency`, `parentEmail`, `statusCode`, `paymentDate`, `parentIdentification`)
                                VALUES
                                ($paidAmount, '$Currency', '$parentEmail', $statusCode, '$date', '$parentIdentification')";
                    $queryExecute = mysqli_query($conn, $query);
                }
            }
        }
    }

    /**
     * @method checkTransactionExists()
     * check if the transactions are exist or not
     * @return string
     */
    private function checkTransactionExists()
    {
        $transactions = new GetTransactions();
        $data = $transactions->readTransactionsFromDatabase();
        if(!count($data) > 0)
        {
            return 'true';
        }
        return 'false';
    }

}

session_destroy();

?>