<?php

require_once 'app/composer/vendor/autoload.php'; // Autoload files using Composer autoload

require_once 'config/setting.class.php';

require_once 'php/class/system.class.php';

require_once 'php/class/session.class.php';

//If there is no "domain system", switch on "default", when default is not exists then stop app

$system = new System();

//Go on (no stop) - database of system domain setting
require_once $system->systemName().'/setting.php';

require_once 'php/class/database.class.php';

$db = new Database();

//Get start section in system (no current section)
require_once 'php/script/start-section.php';

//Grab all "get" variables
require_once 'php/script/get.php';

//Grab all "post" variables
require_once 'php/script/post.php';

$system->setSection($g_url, $db);

//Redirect to home when section does not exists
if(!$system->getSection())
    $system->link($s_startSection);

$system->setStartSection($s_startSection);

//All settings from database for system (like logo, system name, etc.)
$system->setting($db);

//Get setting in array
$setting = $system->getSetting();

$session = new Session();

$sessionVariable = $session->getSession();