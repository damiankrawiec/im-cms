<?php
//First operation
if($tool->getSession('transaction') == '')
    $tool->setSession('transaction', array());

//Operations
if(!in_array($p_transaction, $tool->getSession('transaction'))) {

    if($p_event) {

        $eventPath = 'php/run/'.$p_event.'/init.php';

        if($addition->fileExists($eventPath)) {

            //Alert top default set to not display (to showing success - 1 or fail - 0, init $alert0 or $alert1 variable)
            $alert0 = $alert1 = false;

            $eventData = array(
                'table' => $p_event_table
            );

            if(count($formData) > 0)
                $eventData['data'] = $formData;

            if($p_event_id)
                $eventData['id'] = $p_event_id;

            if($p_restriction)
                $eventData['restriction'] = $p_restriction;

            require_once $eventPath;

            //Message top information (fail, success)
            if($alert0)
                echo $addition->alert0($alert0, $icon['message']['fail']);

            if($alert1)
                echo $addition->alert1($alert1, $icon['message']['success']);

        }

    }

}

//SAVE CURRENT TRANSACTION (do not unset in logout, user may login one more time without close browser)

//No repeat
if(!in_array($p_transaction, $tool->getSession('transaction')))
    $tool->pushSession('transaction', $p_transaction);

//---
//Save to logs...