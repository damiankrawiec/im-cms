<?php

//Set all get variables

$g_url = false;
if(isset($_GET['url'])) {

    $g_url = $_GET['url'];

}else $g_url = $s_startSection;

$g_debug = false;
if(isset($_GET['debug']))
    $g_debug = true;