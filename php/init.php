<?php
require_once 'app/composer/vendor/autoload.php'; // Autoload files using Composer autoload

require_once 'php/class/App.php';

$app = new App();

$appData = array(
    'domain' => $app->getUrl('HTTP_HOST')
);

