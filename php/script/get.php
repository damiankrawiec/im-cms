<?php

//Set all get variables
//It must be that, because get.php is required in object class (display)
$g_url = '';
if(isset($_GET['url'])) {

    $g_url = $_GET['url'];

}else{

    if(isset($s_startSection))
        $g_url = $s_startSection;
}

$g_var1 = '';
if(isset($_GET['var1']))
    $g_var1 = $_GET['var1'];

$g_language = '';
if(isset($_GET['language']))
    $g_language = $_GET['language'];