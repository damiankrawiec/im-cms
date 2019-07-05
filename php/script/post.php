<?php

//Set all post variables

$p_systemName = $p_section = $p_category = $p_label = false;

if(isset($_POST['systemName'])) {

    $p_systemName = $_POST['systemName'];

}
if(isset($_POST['section'])) {

    $p_section = $_POST['section'];

}
if(isset($_POST['label'])) {

    $p_label = $_POST['label'];

}
if(isset($_POST['category'])) {

    $p_category = $_POST['category'];

}