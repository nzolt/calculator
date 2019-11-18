<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
Use App\Data;

class DecimalTest extends TestCase
{
    /**
     * A basic unit test .
     *
     * @return void
     */
    public function testDecimalAdd()
    {
        $calc = Data\DataFactory::make(['valuea' => '10', 'valueb' => '10', 'operator' => 'add']);
        $this->assertSame('20', $calc->calculate());

        $calc = Data\DataFactory::make(['valuea' => '10', 'valueb' => '-10', 'operator' => 'add']);
        $this->assertSame('0', $calc->calculate());

        $calc = Data\DataFactory::make(['valuea' => '-10', 'valueb' => '10', 'operator' => 'add']);
        $this->assertSame('0', $calc->calculate());

        $calc = Data\DataFactory::make(['valuea' => '-10', 'valueb' => '11', 'operator' => 'add']);
        $this->assertSame('1', $calc->calculate());
    }

    /**
     * A basic unit test .
     *
     * @return void
     */
    public function testDecimalSub()
    {
        $calc = Data\DataFactory::make(['valuea' => '10', 'valueb' => '10', 'operator' => 'sub']);
        $this->assertSame('0', $calc->calculate());

        $calc = Data\DataFactory::make(['valuea' => '10', 'valueb' => '-10', 'operator' => 'sub']);
        $this->assertSame('20', $calc->calculate());

        $calc = Data\DataFactory::make(['valuea' => '-10', 'valueb' => '10', 'operator' => 'sub']);
        $this->assertSame('-20', $calc->calculate());

        $calc = Data\DataFactory::make(['valuea' => '-10', 'valueb' => '11', 'operator' => 'sub']);
        $this->assertSame('-21', $calc->calculate());
    }

    /**
     * A basic unit test .
     *
     * @return void
     */
    public function testDecimalMul()
    {
        $calc = Data\DataFactory::make(['valuea' => '10', 'valueb' => '10', 'operator' => 'mul']);
        $this->assertSame('100', $calc->calculate());

        $calc = Data\DataFactory::make(['valuea' => '10', 'valueb' => '-10', 'operator' => 'mul']);
        $this->assertSame('-100', $calc->calculate());

        $calc = Data\DataFactory::make(['valuea' => '-10', 'valueb' => '10', 'operator' => 'mul']);
        $this->assertSame('-100', $calc->calculate());

        $calc = Data\DataFactory::make(['valuea' => '-10', 'valueb' => '11', 'operator' => 'mul']);
        $this->assertSame('-110', $calc->calculate());
    }

    /**
     * A basic unit test .
     *
     * @return void
     */
    public function testDecimalDiv()
    {
        $calc = Data\DataFactory::make(['valuea' => '10', 'valueb' => '10', 'operator' => 'div']);
        $this->assertSame('1', $calc->calculate());

        $calc = Data\DataFactory::make(['valuea' => '10', 'valueb' => '-10', 'operator' => 'div']);
        $this->assertSame('-1', $calc->calculate());

        $calc = Data\DataFactory::make(['valuea' => '-10', 'valueb' => '10', 'operator' => 'div']);
        $this->assertSame('-1', $calc->calculate());

        $calc = Data\DataFactory::make(['valuea' => '-10', 'valueb' => '11', 'operator' => 'div']);
        $this->assertSame('0', $calc->calculate());
    }

    /**
     * A basic unit test .
     *
     * @return void
     */
    public function testDecimalOperator()
    {
        $calc = Data\DataFactory::make(['valuea' => '1111', 'valueb' => '1111', 'operator' => 'x']);
        $this->assertNull($calc);


        $calc = Data\DataFactory::make(['valuea' => '1111', 'valueb' => '', 'operator' => 'add']);
        $this->assertSame(0.0, $calc->getValueB());


        $calc = Data\DataFactory::make(['valuea' => '', 'valueb' => '1111', 'operator' => 'add']);
        $this->assertSame(0.0, $calc->getValueA());
    }
}
