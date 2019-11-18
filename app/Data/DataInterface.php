<?php


namespace App\Data;


interface DataInterface
{
    public function setData(array $data);
    public function getValueA();
    public function getValueB();
    public function calculate();
}
