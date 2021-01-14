<?php

//Set all get variables

if(isset($_GET['url'])) {

    $g_url = $_GET['url'];

}else $g_url = $s_startSection;

$g_var1 = '';
if(isset($_GET['var1']))
    $g_var1 = $_GET['var1'];