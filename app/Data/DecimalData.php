<?php


namespace App\Data;


class DecimalData extends Data implements DataInterface
{
    const OPERATORS = [
        'add',
        'sub',
        'mul',
        'div'
    ];

    protected function getValue($value)
    {
        if(is_numeric($value)){
            return $value;
        } else {
            return floatval($value);
        }
    }

    /**
     *
     */
    public function calculate()
    {
        if($this->operator == 0 && $this->getValueB() == 0){
            return 'Division by 0 attempt! <br/> Next cause black hole!';
        }
        if(extension_loaded('gmp')){
            $xor1 = gmp_init($this->getValueA(), 10);
            $xor2 = gmp_init($this->getValueB(), 10);
            switch($this->operator){

                case "add":
                    $xor3 = gmp_add($xor1, $xor2);
                    $result = gmp_strval($xor3, 10);
                    break;

                case "sub";
                    $xor3 = gmp_sub($xor1, $xor2);
                    $result = gmp_strval($xor3, 10);
                    break;

                case "mul";
                    $xor3 = gmp_mul($xor1, $xor2);
                    $result = gmp_strval($xor3, 10);
                    break;

                case "div";
                    $xor3 = gmp_div($xor1, $xor2);
                    $result = gmp_strval($xor3, 10);
                    break;

                default;
                    $result = 'NaN';
                    break;
            }
        } else {
            switch ($this->operator) {

                case "add":
                    $result = $this->getValueA() + $this->getValueB();
                    break;

                case "sub";
                    $result = $this->getValueA() - $this->getValueB();
                    break;

                case "mul";
                    $result = $this->getValueA() * $this->getValueB();
                    break;

                case "div";
                    $result = $this->getValueA() / $this->getValueB();
                    break;

                default;
                    $result = 'NaN';
                    break;
            }
        }

        return $result;
    }
}
