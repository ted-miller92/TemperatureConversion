<?php
/**
 * convert_temperature
 *
 * @param  string $input_unit  input temperature unit
 * @param  string $output_unit output temperature unit
 * @param  float $val input temperature value
 * @return float
 */
function convertTemperature($input_unit, $output_unit, $val)
{
  $input_unit = strtolower($input_unit);
  $output_unit = strtolower($output_unit);
  $convertion = $input_unit . "_to_" . $output_unit;

  switch ($convertion) {
    case "celsius_to_fahrenheit":
      $val = ($val * 9) / 5 + 32;
      break;
    case "celsius_to_kelvin":
      $val += 273.15;
      break;
    case "fahrenheit_to_celsius":
      $val = (($val - 32) * 5) / 9;
      break;
    case "fahrenheit_to_kelvin":
      $val = (($val - 32) * 5) / 9 + 273.15;
      break;
    case "kelvin_to_celsius":
      $val -= 273.15;
      break;
    case "kelvin_to_fahrenheit":
      $val = (($val - 273.15) * 9) / 5 + 32;
      break;
  }
  return round($val, 2);
}
//test
// echo "<pre>";
// echo convertTemperature("celsius", "fahrenheit", 0) . PHP_EOL;
// echo convertTemperature("celsius", "kelvin", 0) . PHP_EOL;

// echo convertTemperature("fahrenheit", "celsius", 0) . PHP_EOL;
// echo convertTemperature("fahrenheit", "kelvin", 0) . PHP_EOL;

// echo convertTemperature("kelvin", "celsius", 0) . PHP_EOL;
// echo convertTemperature("kelvin", "fahrenheit", 0) . PHP_EOL;
// echo "</pre>";
