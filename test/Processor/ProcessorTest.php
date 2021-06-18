<?php


namespace Test\Processor;


use App\Payment\Model\TransactionData;
use App\Payment\Processor\Processor;
use App\Payment\Processor\ProcessorFactory;
use PHPUnit\Framework\TestCase;

class ProcessorTest extends TestCase
{
    private $SUT;

    public function setUp(): void
    {
        parent::setUp();
        $processorFactory = new ProcessorFactory();
        $this->SUT = new Processor($processorFactory);
    }

    public function testPaysafeAuthorizeCapture()
    {
        $transactionData = new TransactionData([
            'userId' => 1234,
            'processorName' => 'Paysafe',
            'operation' => 'authorizeCapture',
            'token' => 'ABC123',
            'last4Digits' => '1234',
            'expiration' => '0123',
            'amount' => 1000
        ]);

        $result = $this->SUT->process($transactionData);
        $this->assertSame('SUCCESS', $result->status);
        $this->assertSame('Paysafe', $result->processedBy);

    }

    public function testStripeAuthorizeCapture()
    {
        $transactionData = new TransactionData([
            'userId' => 1234,
            'processorName' => 'Stripe',
            'operation' => 'authorizeCapture',
            'token' => 'ABC123',
            'last4Digits' => '1234',
            'expiration' => '0123',
            'amount' => 1000
        ]);

        $result = $this->SUT->process($transactionData);
        $this->assertSame('SUCCESS', $result->status);
        $this->assertSame('Stripe', $result->processedBy);
    }

}