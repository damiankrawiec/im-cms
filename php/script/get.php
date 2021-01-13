<?php

//Set all get variables

$g_url = $g_var1 = false;

if(isset($_GET['url'])) {

    $g_url = $_GET['url'];

}else $g_url = $s_startSection;

if(isset($_GET['var1']))
    $g_var1 = $_GET['var1'];