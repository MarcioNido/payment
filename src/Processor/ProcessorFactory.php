<?php


namespace App\Payment\Processor;


use App\Payment\Model\TransactionData;
use InvalidArgumentException;

class ProcessorFactory
{
    public function getInstance(TransactionData $transactionData): CreditCardProcessor
    {
        if (! property_exists($transactionData, 'processorName') || is_null($transactionData->processorName)) {
            throw new InvalidArgumentException('missing processor name');
        }

        if (! class_exists('App\Payment\Processor\\' . $transactionData->processorName)) {
            throw new InvalidArgumentException('invalid processor name');
        }

        $processorClass = 'App\Payment\Processor\\' . $transactionData->processorName;
        return new $processorClass;
    }
}