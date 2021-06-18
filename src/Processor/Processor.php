<?php


namespace App\Payment\Processor;

use App\Payment\Model\TransactionData;

class Processor
{
    private $processorFactory;
    public function __construct(ProcessorFactory $processorFactory)
    {
        $this->processorFactory = $processorFactory;
    }

    public function process(TransactionData $transaction)
    {
        $processor = $this->processorFactory->getInstance($transaction);
        return $processor->process($transaction);
    }
}