<?php


namespace App\Payment\Model;


class ProcessorResult
{
    public $processedBy;
    public $transactionId;
    public $status;
    public $errorCode;
    public $errorMessage;

    public function __construct(array $result)
    {
        $this->processData($result);
    }

    protected function processData(array $result)
    {
        $properties = get_class_vars(get_class($this));
        foreach($properties as $property => $value) {
            if (array_key_exists($property, $result)) {
                $this->$property = $result[$property];
            }
        }
    }
}