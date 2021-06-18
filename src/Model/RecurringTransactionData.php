<?php


namespace App\Payment\Model;


class RecurringTransactionData extends TransactionData
{
    public $userId;
    public $amount;

    public function __construct(array $transactionData)
    {
        parent::__construct($transactionData);
    }
}