<?php
// validation.php

function validateForm(){
    $errors = [];

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        if(empty($_POST['input_value'])){
            array_push($errors, 'Please enter a temperature');
        }elseif(!is_numeric($_POST['input_value'])){
            array_push($errors, 'Please enter a numeric value');
        }
    }
    return $errors;
}

// stickify for text input
// takes the input name  as argument
function stickify_text($postElement){
    if(isset($_POST[$postElement])){
        echo htmlspecialchars($_POST[$postElement]);
    }
}

// stickify for select options
// takes input name as arg1, input value as arg2
function stickify_select($inputName, $inputValue){
    if(isset($_POST[$inputName]) && $_POST[$inputName] == $inputValue){
        echo 'selected';
    }
}