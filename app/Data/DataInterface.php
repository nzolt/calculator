<?php


namespace App\Data;


interface DataInterface
{
    /**
     * @param array $data
     * @return Data
     */
    public function setData(array $data): Data;

    /**
     * @return mixed
     */
    public function getValueA();

    /**
     * @return mixed
     */
    public function getValueB();

    /**
     * @return string
     */
    public function calculate(): string ;
}
