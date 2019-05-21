<?php
require_once 'app/composer/vendor/autoload.php'; // Autoload files using Composer autoload

require_once 'config/setting.php';

require_once 'php/class/App.php';

$app = new App();

/** @var $appData
 Tablica przechowujaca wszystkie dane systemowe wczytane w czasie renderingu
 */
$appData = array();

$appData['domain'] = $app->getServer('HTTP_HOST');

if($app->dirExists($s_path['domain'].'/'.$appData['domain'])) {

    $appData['domain_system'] = $s_path['domain'].'/'.$appData['domain'];

}else{

    $appData['domain_system'] = 'default';

}