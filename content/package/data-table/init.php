<?php

$apiResponsePath = 'content/package/api-response';

$apiResponse = require_once $apiResponsePath.'/init.php';

echo 'this data in datatable:';

var_dump($apiResponse);