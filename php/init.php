<?php
require_once 'app/composer/vendor/autoload.php'; // Autoload files using Composer autoload

require_once 'config/setting.class.php';

require_once 'php/class/system.class.php';

//W przypadku braku systemu domenowego, przelaczenie na "default", gdy brak default zatrzymanie aplikacji

$system = new System();

//Zatrzymanie nie nastąpilo

require_once $system->systemName().'/setting.php';

require_once 'php/class/database.class.php';

$db = new Database();