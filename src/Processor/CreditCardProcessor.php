<?php


namespace App\Payment\Processor;


use App\Payment\Model\ProcessorResult;
use App\Payment\Model\TransactionData;

abstract class CreditCardProcessor
{
    const SUCCESS = 'SUCCESS';
    const FAIL = 'FAIL';

    public function process(TransactionData $transactionData): ProcessorResult
    {
        $operation = $transactionData->operation;
        return $this->$operation($transactionData);
    }

    abstract public function authorizeCapture(TransactionData $transactionData): ProcessorResult;
    abstract public function authorizeOnly(TransactionData $transactionData): ProcessorResult;
    abstract public function recurAuthorizeCapture(TransactionData $transactionData): ProcessorResult;
    abstract public function recurAuthorizeOnly(TransactionData $transactionData): Processor;
    abstract public function capture(TransactionData $transactionData): Processor;
}