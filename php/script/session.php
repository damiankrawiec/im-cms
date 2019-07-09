<?php

//Label of all session variables in system
$sessionLabel = array('news', 'company-skill');

$session = new Session();

$session->setSessionLabel($sessionLabel);