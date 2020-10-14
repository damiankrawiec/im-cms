<?php

if(!isset($sectionPath))
    $sectionPath = '../';

if(!isset($sectionPathAdmin))
    $sectionPathAdmin = '';

if(isset($sectionPathAdmin)) {

    require_once $sectionPathAdmin.'config/icon.php';
    require_once $sectionPathAdmin.'config/language/pl.php';
    require_once $sectionPathAdmin.'config/setting.php';

}