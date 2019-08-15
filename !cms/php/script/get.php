<?php
$g_system = $g_variable = false;

if(isset($_GET['system'])) {

    $g_system = $_GET['system'];

}else{

    $g_system = '';

}

if(isset($_GET['section'])) {

    $g_section = $_GET['section'];

}else{

    $g_section = 'dashboard';

}

if(isset($_GET['variable'])) {

    $g_variable = $_GET['variable'];

}else{

    $g_variable = '';

}