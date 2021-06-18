<?php


namespace App\Payment\Model;


use InvalidArgumentException;

class TransactionData
{
    public $userId;
    public $processorName;
    public $operation;
    public $token;
    public $last4Digits;
    public $expiration;
    public $amount;

    public function __construct(array $transactionData)
    {
        $this->processData($transactionData);
    }

    /**
     * @throws \Exception
     */
    protected function processData(array $transactionData)
    {
        $properties = get_class_vars(get_class($this));
        foreach($properties as $property => $value) {
            if (! array_key_exists($property, $transactionData)) {
                throw new InvalidArgumentException("missing field {$property}");
            }
            $this->$property = $transactionData[$property];
        }
    }

}