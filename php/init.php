<?php

require_once 'app/composer/vendor/autoload.php'; // Autoload files using Composer autoload

require_once 'config/setting.class.php';

require_once 'php/class/system.class.php';

require_once 'php/class/security.class.php';

require_once 'php/class/session.class.php';

require_once 'php/class/addition.class.php';

$addition = new Addition();

//If there is no "domain system", switch on "default", when default is not exists then stop app

$system = new System();

//Global setting
require 'config/setting.php';

//Go on (no stop) - database of system domain setting
require_once $system->systemName().'/setting.php';

require_once 'php/class/database.class.php';

$db = new Database();

//Get start section in system (no current section)
require_once 'php/script/start-section.php';

//Grab all "get" variables
require 'php/script/get.php';

//Grab all "post" variables
require 'php/script/post.php';

//Set default language
$system->setDefaultLanguage($db);

$system->setCurrentLanguage($g_language);

$system->setPagination(($g_var1 === '' ? $s_startPagination : $g_var1), ($g_var2 === '' ? $s_lengthPagination : $g_var2));

$s_path = $system->setPath();

$s_sectionData = array('name' => 'front', 'global-path' => $s_path, 'local-path' => $s_path);

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

require_once 'php/class/auth.class.php';

$auth = new Auth();

//Operation in server side (before grab all session variables, because in run are set session variables)
require_once 'php/run/init.php';

if($g_url) {

    $currentSectionSession = $g_url;
    if($g_language !== '')
        $currentSectionSession = $g_language.'/'.$currentSectionSession;

    $session->setSession('path', $currentSectionSession);

}

if($session->getSession('transaction_package') == '')
    $session->setSession('transaction_package', array());

$sessionVariable = $session->grabSession();