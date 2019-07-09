<?php

require_once 'app/composer/vendor/autoload.php'; // Autoload files using Composer autoload

//layout debug, warning, error
require_once 'php/whoops.php';

require_once 'config/setting.class.php';

require_once 'php/class/system.class.php';

require_once 'php/class/session.class.php';

require_once 'php/class/language.class.php';

//There is no "domain system", switch on "default", when default is not exists then stop app

$system = new System();

//Go on (no stop)
require_once $system->systemName().'/setting.php';

require_once 'php/class/database.class.php';

$db = new Database();

$session = new Session();

$sessionVariables = $session->getSession();

//Get start section in system (no current section)
require_once 'php/script/startSection.php';

//Grab all "get" variables
require_once 'php/script/get.php';

//Grab all "post" variables
require_once 'php/script/post.php';

//Labeled all "session" variables
require_once 'php/script/session.php';

$system->setSection($g_url, $db);

$system->setStartSection($s_startSection);

//All settings from database for system (like logo, system name, etc.)
$system->setting($db);

//Get setting in array
$setting = $system->getSetting();

//Init language
$language = new Language();

if($sessionVariables['language']) {

    $languageDefault = $sessionVariables['language'];

}else{

    $languageDefault = $language->default($db);

}