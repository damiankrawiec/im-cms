<?php

require_once (isset($pathUp) ? $pathUp : '').'../system/'.$system->getSystemName().'/setting.php';

require_once (isset($pathUp) ? $pathUp : '').'../php/class/database.class.php';

$db = new Database();