<?php
//fahrenheit kelvin celsius
include "./convertTemperature.php";
include "./form.php";
$errorMsgs = valivateForm();
$output = null;
if (count($errorMsgs) === 0) {
  $output = convertTemperature(
    $_POST["input_unit"],
    $_POST["output_unit"],
    $_POST["input_temp_value"]
  );
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Temperature Conversion</title>
</head>
<body>
    <div class="wrapper">
        <p class="title">
            Temperature Conversion
        </p>
        <form action="<?php $_PHP_SELF; ?>" method="post">
            <div class="container">
                <p>Input temperature Unit</p>
                
                <input type="radio" name="input_unit" id="input_fahrenheit" value="fahrenheit"> 
                <label for="input_fahrenheit">fahrenheit</label>

                <input type="radio" name="input_unit" id="input_kelvin" value="kelvin"> 
                <label for="input_kelvin">kelvin</label>

                <input type="radio" name="input_unit" id="input_celsius" value="celsius"> 
                <label for="input_celsius">celsius</label>

            </div>
            <div class="container">
                <p>Input temperature value</p>
                <input type="text" name="input_temp_value" id="">
            </div>
            <div class="container">
                <p>Out temperature Unit</p>

                <input type="radio" name="output_unit" id="output_fahrenheit" value="fahrenheit"> 
                <label for="output_fahrenheit">fahrenheit</label>

                <input type="radio" name="output_unit" id="output_kelvin" value="kelvin"> 
                <label for="output_kelvin">kelvin</label>

                <input type="radio" name="output_unit" id="output_celsius" value="celsius"> 
                <label for="output_celsius">celsius</label>

            </div>
            <div class="container">
                <input type="submit" value="submit">
                <a href="./index.php">reset</a>
            </div>
        </form>
        <div class="error">
            <?php foreach ($errorMsgs as $key => $value): ?>
               <p><?= $value ?></p>
            <?php endforeach; ?>
        </div>
        <?php if (!is_null($output)): ?>
            <div class="success">
                <p> <?php echo "{$_POST["input_temp_value"]} {$_POST["input_unit"]} to {$_POST["output_unit"]} is {$output}"; ?> </p>
            </div> 
        <?php endif; ?>
    </div>
</body>
</html>
