<?php
//First operation
if($session->getSession('transaction') == '')
    $session->setSession('transaction', array());

//Operations
if(!in_array($p_transaction, $session->getSession('transaction'))) {

    if($p_event) {

        $eventPath = 'php/run/'.$p_event.'/init.php';

        if($addition->fileExists($eventPath)) {

            //Alert top default set to not display (to show success - 1 or fail - 0, init $alert0 or $alert1 variable)
            $alert0 = $alert1 = false;

            $eventData = array();

            if(count($formData) > 0)
                $eventData['data'] = $formData;

            require_once $eventPath;

            //Message top information (fail, success)
            if($alert1)
                echo $addition->alert1($alert1, '<i class="fad fa-check-square text-success"></i>');

            if($alert0)
                echo $addition->alert0($alert0, '<i class="fad fa-exclamation-square text-danger"></i>');

        }

    }

}

//SAVE CURRENT TRANSACTION (do not unset in logout, user may login one more time without close browser)

//No repeat
if(!in_array($p_transaction, $session->getSession('transaction')))
    $session->pushSession('transaction', $p_transaction);

//---
//Save to logs...