<?php
//This file is used in a few places - not require once

$g_section = 'dashboard';
if(isset($_GET['section']))
    $g_section = $_GET['section'];

$g_var1 = '';
if(isset($_GET['var1']))
    $g_var1 = $_GET['var1'];

$g_var2 = '';
if(isset($_GET['var2']))
    $g_var2 = $_GET['var2'];

$g_var3 = '';
if(isset($_GET['var3']))
    $g_var3 = $_GET['var3'];

$g_var4 = '';
if(isset($_GET['var4']))
    $g_var4 = $_GET['var4'];

$g_var5 = '';
if(isset($_GET['var5']))
    $g_var5 = $_GET['var5'];

$g_debug = false;
if(isset($_GET['debug']))
    $g_debug = true;