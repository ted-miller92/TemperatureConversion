<?php

include('includes/temperatureConversion.php');
include('includes/validation.php');

$errors = validateForm();
$output_value = null;

if(count($errors) === 0){
    $output_value = convertTemperature(
        $_POST['input_unit'], 
        $_POST['output_unit'], 
        $_POST['input_value']
    );
}

$currentURL = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <title>Temperature Conversion</title>
</head>
<body>
    <main>
        <form action="" method="POST">
            <legend>Temperature Conversion</legend>   
            <p>Temperature to convert: <input type="text" name="input_value" value="<?php stickify_text('input_value');?>"/>&deg;</p>
            <p>From:    
                <select name="input_unit">
                    <option value="F" <?php stickify_select('input_unit', 'F');?> >Fahrenheit</option>
                    <option value="C" <?php stickify_select('input_unit', 'C');?> >Celsius</option>
                    <option value="K" <?php stickify_select('input_unit', 'K');?> >Kelvin</option>
                </select>
                to:
                <select name="output_unit">
                    <option value="F" <?php stickify_select('output_unit', 'F');?> >Fahrenheit</option>
                    <option value="C" <?php stickify_select('output_unit', 'C');?> >Celsius</option>
                    <option value="K" <?php stickify_select('output_unit', 'K');?> >Kelvin</option>
                </select>
            </p>
            <button type="submit">Convert</button>
        </form>
        <div class="errors">
            <?php foreach($errors as $key => $value):?>
                <?= "<p> {$value} </p>}"?>
            <?php endforeach; ?>
        </div>
        <div class="success">
            
            <?php if(isset($_POST['input_value']) && count($errors) === 0){
                // X degrees x is Y degrees y
                echo "<p>{$_POST['input_value']}&deg;{$_POST['input_unit']} is $output_value&deg;{$_POST['output_unit']}</p>";
            }
            ?>
            
        </div>
    </main>
    <footer>
        <p>
            Copyright &copy; <?php
                $date_current = date('Y');
                $date_created = 2021;
                if($date_created == $date_current){
                    echo $date_current;
                }else{
                    echo ''.$date_created.' - '.$date_current.'';
                }
                ?>
            Ted Miller, Clare Swensen & Yingheng He
        </p>
        <p><a href="https://github.com/ted-miller92/TemperatureConversion">Project Github</a></p>
    </footer>
</body>