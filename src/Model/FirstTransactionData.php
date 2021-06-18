<?php


namespace App\Payment\Model;


class FirstTransactionData extends TransactionData
{


    public function __construct(array $transactionData)
    {
        parent::__construct($transactionData);
    }

}