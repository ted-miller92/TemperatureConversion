<?php

function convertTemperature($input_unit, $output_unit, $value){
    $conversion = $input_unit . '_to_' . $output_unit;

    if($input_unit == $output_unit){
        $value = $value;
    }else{
        switch($conversion){
            case 'F_to_C':
                $value = (($value - 32) * 5 / 9);
                break;
            case 'F_to_K':
                $value = (($value - 32) * (5 / 9) + 273.15);
                break;
            case 'C_to_F':
                $value = (($value * (9 / 5)) + 32);
                break;
            case 'C_to_K':
                $value = $value + 273.15;
                break;
            case 'K_to_F':
                $value = (($value - 273.15) * (9/5) + 32);
                break;
            case 'K_to_C':
                $value = $value - 273.15;
                break;    
        }
    }
    return number_format($value, 2);
}