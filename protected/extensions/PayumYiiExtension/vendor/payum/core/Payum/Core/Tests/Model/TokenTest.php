<?php
namespace Payum\Core\Tests\Model;

use Payum\Core\Model\Token;
use Payum\Core\Model\Identificator;

class TokenTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function shouldExtendDetailsAwareInterface()
    {
        $rc = new \ReflectionClass('Payum\Core\Model\Token');

        $this->assertTrue($rc->implementsInterface('Payum\Core\Security\TokenInterface'));
    }

    /**
     * @test
     */
    public function couldBeConstructedWithoutAnyArguments()
    {
        new Token;
    }

    /**
     * @test
     */
    public function shouldAllowGetHashGeneratedInConstructor()
    {
        $token = new Token;

        $this->assertNotEmpty($token->getHash());
    }

    /**
     * @test
     */
    public function shouldGenerateDifferentTokensInConstructor()
    {
        $tokenOne = new Token;
        $tokenTwo = new Token;

        $this->assertNotEquals($tokenOne->getHash(), $tokenTwo->getHash());
    }

    /**
     * @test
     */
    public function shouldAllowSetHash()
    {
        $token = new Token;

        $token->setHash('foo');
    }

    /**
     * @test
     */
    public function shouldAllowGetPreviouslySetHash()
    {
        $token = new Token;

        $token->setHash('theToken');

        $this->assertSame('theToken', $token->getHash());
    }

    /**
     * @test
     */
    public function shouldAllowSetPaymentName()
    {
        $token = new Token;

        $token->setPaymentName('aName');
    }

    /**
     * @test
     */
    public function shouldAllowGetPreviouslySetPaymentName()
    {
        $token = new Token;

        $token->setPaymentName('theName');

        $this->assertSame('theName', $token->getPaymentName());
    }

    /**
     * @test
     */
    public function shouldAllowSetTargetUrl()
    {
        $token = new Token;

        $token->setTargetUrl('anUrl');
    }

    /**
     * @test
     */
    public function shouldAllowGetPreviouslySetTargetUrl()
    {
        $token = new Token;

        $token->setTargetUrl('theUrl');

        $this->assertSame('theUrl', $token->getTargetUrl());
    }

    /**
     * @test
     */
    public function shouldAllowSetAfterUrl()
    {
        $token = new Token;

        $token->setAfterUrl('anUrl');
    }

    /**
     * @test
     */
    public function shouldAllowGetPreviouslySetAfterUrl()
    {
        $token = new Token;

        $token->setAfterUrl('theUrl');

        $this->assertSame('theUrl', $token->getAfterUrl());
    }

    /**
     * @test
     */
    public function shouldAllowSetIdentificatorAsDetails()
    {
        $token = new Token;

        $token->setDetails(new Identificator('anId', 'stdClass'));
    }

    /**
     * @test
     */
    public function shouldAllowGetPreviouslySetDetails()
    {
        $expectedIdentificator = 'theDetails';

        $token = new Token;

        $token->setDetails($expectedIdentificator);

        $this->assertSame($expectedIdentificator, $token->getDetails());
    }

    /**
     * @test
     */
    public function shouldAllowGetIdentificatorPreviouslySetAsDetails()
    {
        $expectedIdentificator = new Identificator('anId', 'stdClass');

        $token = new Token;

        $token->setDetails($expectedIdentificator);

        $this->assertSame($expectedIdentificator, $token->getDetails());
    }
}