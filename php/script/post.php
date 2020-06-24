<?php

//Set all post variables
$p_systemName = $p_section = $p_label = $p_session = $p_category = $p_sendForm = false;

if(isset($_POST['systemName']))
    $p_systemName = $_POST['systemName'];

if(isset($_POST['section']))
    $p_section = $_POST['section'];

if(isset($_POST['label']))
    $p_label = $_POST['label'];

if(isset($_POST['category']))
    $p_category = $_POST['category'];

if(isset($_POST['session']))
    $p_session = $_POST['session'];

if(isset($_POST['sendForm']))
    $p_sendForm = $_POST['sendForm'];

if(isset($_POST['string']))
    $p_string = $_POST['string'];