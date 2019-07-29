<?php
$g_system = false;

if(isset($_GET['system'])) {

    $g_system = $_GET['system'];

}else{

    $g_system = '';

}

if(isset($_GET['section'])) {

    $g_section = $_GET['section'];

}else{

    $g_section = '';

}