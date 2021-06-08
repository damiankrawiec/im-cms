<?php

//Set all get variables

$g_url = $s_startSection;
if(isset($_GET['url']))
    $g_url = $_GET['url'];

$g_var1 = '';
if(isset($_GET['var1']))
    $g_var1 = $_GET['var1'];

$g_language = '';
if(isset($_GET['language']))
    $g_language = $_GET['language'];