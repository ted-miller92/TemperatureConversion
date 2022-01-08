<?php
// checking that all fields are filled out/set
if(isset($_POST['InputTemp']) && isset($_POST['InputUnit']) && isset($_POST['OutputUnit'])){
    // checking that input temperature is a number
    if(is_numeric($_POST['InputTemp']) == "integer"){
        // echo '<span> Data is correct type, perform calculations</span>';
        // Declare variables
        $InputTemp = number_format($_POST['InputTemp'], 2);
        $InputUnit = $_POST['InputUnit'];
        $OutputUnit = $_POST['OutputUnit'];
        $OutputTemp;

        // calculations go here

        // if InputUnit is F
        if($InputUnit == 'F'){
            if($OutputUnit == 'C'){ 
                // convert F to C
                $OutputTemp = number_format(($InputTemp - 32) * (5/9), 2);
            }elseif($OutputUnit == 'K'){
                // convert to K
                $OutputTemp = number_format(($InputTemp - 32) * (5/9) + 273.15, 2);
            }else{
                // no conversion
                $OutputTemp = number_format($InputTemp, 2);
            }
        }
        // if InputUnit is C
        if($InputUnit == 'C'){
            if($OutputUnit == 'F'){ 
                // convert to C
                $OutputTemp = number_format($InputTemp * (9/5) + 32, 2);
            }elseif($OutputUnit == 'K'){
                // convert to K
                $OutputTemp = number_format($InputTemp + 273.15, 2);
            }else{
                // no conversion
                $OutputTemp = number_format($InputTemp, 2);
            }
        }
        // if InputUnit is K
        if($InputUnit == 'K'){
            if($OutputUnit == 'F'){ 
                // convert to F
                $OutputTemp = number_format($InputTemp - 273.15, 2);
            }elseif($OutputUnit == 'C'){
                // convert to C
                $OutputTemp = number_format(($InputTemp - 273.15) * (9/5), 2);
            }else{
                // no conversion
                $OutputTemp = number_format($InputTemp, 2);
            }
        }    
        
        // $OutputTemp $OutputUnit
    }else{
        // echo number_format($_POST['InputTemp'], 2);
        
        echo '<span>Data is incorrect type. Please enter a number</span>';
    }
}


?>
<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <form action="" method="POST">
            <p>Temp to convert: <input type="text" name="InputTemp"/>
                <select name="InputUnit">
                    <option value="F" selected>F</option>
                    <option value="C">C</option>
                    <option value="K">K</option>
                </select>

            </p>
            <p>Convert to:
                <select name="OutputUnit">
                    <option value="F">F</option>
                    <option value="C">C</option>
                    <option value="K">K</option>
                </select>
            </p>
            <button type="submit">Convert</button>
        </form>
        <div id="results">
            <p>Converted Temperature: <?php 
            if(isset($OutputTemp)){
                echo ''.$OutputTemp.' degrees '.$OutputUnit.'';
            }
            ?></p>
        </div>
    </body>
</html>