<?php

//Set all post variables
$p_systemName = $p_section = $p_label = $p_language = $p_category = false;

if(isset($_POST['systemName']))
    $p_systemName = $_POST['systemName'];

if(isset($_POST['section']))
    $p_section = $_POST['section'];

if(isset($_POST['label']))
    $p_label = $_POST['label'];

if(isset($_POST['category']))
    $p_category = $_POST['category'];

if(isset($_POST['language']))
    $p_language = $_POST['language'];
