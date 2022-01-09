<?php

function valivateRadio($key, $message, $errorMsgs)
{
  if (!isset($_POST[$key])) {
    array_push($errorMsgs, $message);
  }
  return $errorMsgs;
}

function valivateText($value, $errorMsgs)
{
  if ($value === "") {
    array_push($errorMsgs, "please input temperature value");
  } elseif (!is_numeric($value)) {
    array_push($errorMsgs, "please input a number for temperature value");
  }
  return $errorMsgs;
}

function valivateForm()
{
  $errorMsgs = [];

  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $errorMsgs = valivateRadio(
      "input_unit",
      "please pick a input temperature unit",
      $errorMsgs
    );

    $errorMsgs = valivateRadio(
      "output_unit",
      "please pick a output temperature unit",
      $errorMsgs
    );

    $errorMsgs = valivateText($_POST["input_temp_value"], $errorMsgs);
  } else {
    array_push($errorMsgs, "");
  }

  return $errorMsgs;
}
