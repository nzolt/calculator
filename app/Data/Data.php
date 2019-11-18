<?php


namespace App\Data;


class Data
{
    protected $valueA;
    protected $valueB;
    protected $operator = '';
    public function __construct(array $data)
    {
        $this->setData($data);
    }

    /**
     * @param array $data
     * @return Data
     */
    public function setData(array $data): Data
    {
        $this->setValueA($data['valuea']);
        $this->setValueB($data['valueb']);
        $this->setOperator($data['operator']);

        return $this;
    }

    /**
     * @return mixed
     */
    public function getValueA()
    {
        return $this->valueA;
    }

    /**
     * @return mixed
     */
    public function getValueB()
    {
        return $this->valueB;
    }

    /**
     * @param mixed $valueA
     */
    public function setValueA($valueA): void
    {
        $this->valueA = $this->getValue($valueA);
    }

    /**
     * @param mixed $valueB
     */
    public function setValueB($valueB): void
    {
        $this->valueB = $this->getValue($valueB);
    }

    /**
     * @return string
     */
    public function getOperator(): string
    {
        return $this->operator;
    }

    /**
     * @param string $operator
     */
    public function setOperator(string $operator): void
    {
        $this->operator = $operator;
    }

}
