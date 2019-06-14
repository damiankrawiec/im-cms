<?php
require_once 'app/composer/vendor/autoload.php'; // Autoload files using Composer autoload

//layout debug, warning, error
require_once 'php/whoops.php';

require_once 'config/setting.class.php';

require_once 'php/class/system.class.php';

//There is no "domain system", switch on "default", when default is not exists then stop app

$system = new System();

//Go on (no stop)
require_once $system->systemName().'/setting.php';

require_once 'php/class/database.class.php';

$db = new Database();

//Grab get variables
require_once 'php/script/get.php';

$system->setUrl($url);