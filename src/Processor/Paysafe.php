<?php


namespace App\Payment\Processor;


use App\Payment\Model\ProcessorResult;
use App\Payment\Model\TransactionData;

class Paysafe extends CreditCardProcessor
{
    const NAME = 'Paysafe';

    public function authorizeCapture(TransactionData $transactionData): ProcessorResult
    {
        return new ProcessorResult([
            'processedBy' => self::NAME,
            'status' => self::SUCCESS,
            'transactionId' => 1,
        ]);
    }

    public function authorizeOnly(TransactionData $transactionData): ProcessorResult
    {
        // TODO: Implement authorizeOnly() method.
    }

    public function recurAuthorizeCapture(TransactionData $transactionData): ProcessorResult
    {
        // TODO: Implement recurAuthorizeCapture() method.
    }

    public function recurAuthorizeOnly(TransactionData $transactionData): Processor
    {
        // TODO: Implement recurAuthorizeOnly() method.
    }

    public function capture(TransactionData $transactionData): Processor
    {
        // TODO: Implement capture() method.
    }
}