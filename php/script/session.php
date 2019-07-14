<?php

$session = new Session();

//Label of all session variables in system
$sessionLabel = array('news', 'company-skill', 'language');

$session->setSessionLabel($sessionLabel);

$sessionVariables = $session->getSession();