<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

class Helper
{
    public static function shout(string $string)
    {
        return strtoupper($string);
    }

    //Convert Percent to Decimal
    static function convertPercentToDecimal($value){
        return floatval($value) / 100.00;
    }    
}