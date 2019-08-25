<?php
//This file is used in a few places - not require once

$g_system = '';
if(isset($_GET['system'])) {

    $g_system = $_GET['system'];

}

$g_section = 'dashboard';
if(isset($_GET['section'])) {

    $g_section = $_GET['section'];

}

$g_var1 = '';
if(isset($_GET['var1'])) {

    $g_var1 = $_GET['var1'];

}

$g_var2 = '';
if(isset($_GET['var2'])) {

    $g_var2 = $_GET['var2'];

}