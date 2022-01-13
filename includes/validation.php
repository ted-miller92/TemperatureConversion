<?php
// validation.php

// function validateForm will check if server method is POST, then check for an input, then check that input is numeric
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

// stickify for text input makes text input sticky on refresh/submit
// takes the input name as parameter
function stickify_text($postElement){
    if(isset($_POST[$postElement])){
        echo htmlspecialchars($_POST[$postElement]);
    }
}

// stickify for select options makes select options sticky on refresh/submit
// takes input name as parameter1, input value as parameter2
function stickify_select($inputName, $inputValue){
    if(isset($_POST[$inputName]) && $_POST[$inputName] == $inputValue){
        echo 'selected';
    }
}