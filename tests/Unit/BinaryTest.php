<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
Use App\Data;

class BinaryTest extends TestCase
{
    /**
     * A basic unit test .
     *
     * @return void
     */
    public function testBinaryAnd()
    {
        $calc = Data\DataFactory::make(['valuea' => '1111', 'valueb' => '1111', 'operator' => 'and']);
        $this->assertSame('1111', $calc->calculate());

        $calc = Data\DataFactory::make(['valuea' => '1111', 'valueb' => '0000', 'operator' => 'and']);
        $this->assertSame('0', $calc->calculate());

        $calc = Data\DataFactory::make(['valuea' => '0000', 'valueb' => '0000', 'operator' => 'and']);
        $this->assertSame('0', $calc->calculate());

        $calc = Data\DataFactory::make(['valuea' => '1001', 'valueb' => '1000', 'operator' => 'and']);
        $this->assertSame('1000', $calc->calculate());

        $calc = Data\DataFactory::make(['valuea' => '1001', 'valueb' => '12', 'operator' => 'and']);
        $this->assertSame('1000', $calc->calculate());
    }

    /**
     * A basic unit test .
     *
     * @return void
     */
    public function testBinaryOr()
    {
        $calc = Data\DataFactory::make(['valuea' => '1111', 'valueb' => '1111', 'operator' => 'or']);
        $this->assertSame('1111', $calc->calculate());

        $calc = Data\DataFactory::make(['valuea' => '1111', 'valueb' => '0000', 'operator' => 'or']);
        $this->assertSame('1111', $calc->calculate());

        $calc = Data\DataFactory::make(['valuea' => '0000', 'valueb' => '0000', 'operator' => 'or']);
        $this->assertSame('0', $calc->calculate());

        $calc = Data\DataFactory::make(['valuea' => '1001', 'valueb' => '1000', 'operator' => 'or']);
        $this->assertSame('1001', $calc->calculate());

        $calc = Data\DataFactory::make(['valuea' => '1001', 'valueb' => '12', 'operator' => 'or']);
        $this->assertSame('1101', $calc->calculate());
    }

    /**
     * A basic unit test .
     *
     * @return void
     */
    public function testBinaryXor()
    {
        $calc = Data\DataFactory::make(['valuea' => '1111', 'valueb' => '1111', 'operator' => 'xor']);
        $this->assertSame('0', $calc->calculate());

        $calc = Data\DataFactory::make(['valuea' => '1111', 'valueb' => '0000', 'operator' => 'xor']);
        $this->assertSame('1111', $calc->calculate());

        $calc = Data\DataFactory::make(['valuea' => '0000', 'valueb' => '0000', 'operator' => 'xor']);
        $this->assertSame('0', $calc->calculate());

        $calc = Data\DataFactory::make(['valuea' => '1001', 'valueb' => '1000', 'operator' => 'xor']);
        $this->assertSame('1', $calc->calculate());

        $calc = Data\DataFactory::make(['valuea' => '1001', 'valueb' => '12', 'operator' => 'xor']);
        $this->assertSame('101', $calc->calculate());
    }

    /**
     * A basic unit test .
     *
     * @return void
     */
    public function testBinaryOperator()
    {
        $calc = Data\DataFactory::make(['valuea' => '1111', 'valueb' => '1111', 'operator' => 'x']);
        $this->assertNull($calc);


        $calc = Data\DataFactory::make(['valuea' => '1111', 'valueb' => '', 'operator' => 'and']);
        $this->assertSame('0', $calc->getValueB());


        $calc = Data\DataFactory::make(['valuea' => '', 'valueb' => '1111', 'operator' => 'and']);
        $this->assertSame('0', $calc->getValueA());
    }
}
