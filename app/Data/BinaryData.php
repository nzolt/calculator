<?php


namespace App\Data;


class BinaryData extends Data implements DataInterface
{
    /**
     * Allowed operators
     */
    const OPERATORS = [
        'and',
        'or',
        'xor'
    ];

    /**
     * @param $value
     * @return string
     */
    protected function getValue($value): string
    {
        preg_match('|\b[01]+\b|', $value, $matches);
        if(count($matches) > 0){
            return $matches[0];
        } else {
            return strval(decbin($value));
        }
    }

    /**
     * Do calculation
     */
    public function calculate(): string
    {
        if(extension_loaded('gmp')){
            $xor1 = gmp_init($this->getValueA(), 2);
            $xor2 = gmp_init($this->getValueB(), 2);
            switch($this->operator){

                case "and":
                    $xor3 = gmp_and($xor1, $xor2);
                    $result = gmp_strval($xor3, 2);
                    break;

                case "or";
                    $xor3 = gmp_or($xor1, $xor2);
                    $result = gmp_strval($xor3, 2);
                    break;

                case "xor";
                    $xor3 = gmp_xor($xor1, $xor2);
                    $result = gmp_strval($xor3, 2);
                    break;

                default;
                    $result = 'NaN';
                    break;
            }
        } else {
            switch($this->operator){

                case "and":
                    $result = $this->getValueA() & $this->getValueB();
                    break;

                case "or";
                    $result = $this->getValueA() | $this->getValueB();
                    break;

                case "xor";
                    $result = $this->getValueA() ^ $this->getValueB();
                    $bh = bin2hex($result);
                    $bhArray = str_split($bh, 2);
                    $resultStr = [];
                    foreach ($bhArray as $bhe){
                        $resultStr[] = intval($bhe);
                    }
                    $result = implode('', $resultStr);
                    break;

                default;
                    $result = 'NaN';
                    break;
            }
        }


        return $result;
    }
}
