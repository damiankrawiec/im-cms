<?php

//Set all post variables
$p_email = $p_password = false;

if(isset($_POST['email']))
    $p_email = $_POST['email'];

if(isset($_POST['password']))
    $p_password = $_POST['password'];

unset($_POST);