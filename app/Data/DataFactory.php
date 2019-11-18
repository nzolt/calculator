<?php


namespace App\Data;


class DataFactory
{
    /**
     * Create a new Data instance.
     *
     * @param  array  $data
     * @return \App\Data\DecimalData|BinaryData
     */
    public static function make(array $data): ?DataInterface
    {
        if (in_array($data['operator'], BinaryData::OPERATORS)){
            return new BinaryData($data);
        } elseif (in_array($data['operator'], DecimalData::OPERATORS)){
            return new DecimalData($data);
        } else {
            return null;
        }
    }
}
