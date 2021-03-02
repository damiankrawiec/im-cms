<?php
//First operation
if($session->getSession('transaction') == '')
    $session->setSession('transaction', array());

//Alert bottom default set to not display (to show success - 1 or fail - 0, index of system translation)
$alert0 = $alert1 = false;

//Operations
if(!in_array($p_transaction, $session->getSession('transaction'))) {

    if($p_event) {

        $eventPath = 'php/run/'.$p_event.'/init.php';

        if($addition->fileExists($eventPath)) {

            require_once $eventPath;

        }

    }

}

//SAVE CURRENT TRANSACTION (do not unset in logout, user may login one more time without close browser)

//No repeat
if($p_transaction and !in_array($p_transaction, $session->getSession('transaction')))
    $session->pushSession('transaction', $p_transaction);

//---
//Save to logs...