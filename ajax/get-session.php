<?php

require_once '../php/class/security.class.php';

require_once '../php/class/session.class.php';

$session = new Session();

$sessionVariable = $session->getSession();

exit(json_encode($sessionVariable));