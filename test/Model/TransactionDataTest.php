<?php


namespace Test\Model;


use App\Payment\Model\TransactionData;
use PHPUnit\Framework\TestCase;

class TransactionDataTest extends TestCase
{
    public function testCreateTransactionData()
    {
        $SUT = new TransactionData([
            'userId' => 123,
            'processorName' => 'Paysafe',
            'operation' => 'authorizeCapture',
            'token' => '123456',
            'last4Digits' => '1234',
            'expiration' => '0123',
            'amount' => 1000
        ]);

        $this->assertSame(1000, $SUT->amount);
    }
}