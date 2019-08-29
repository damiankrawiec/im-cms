<?php
//First operation
if($tool->getSession('transaction') == '')
    $tool->setSession('transaction', array());

//Operations
if(!in_array($p_transaction, $tool->getSession('transaction'))) {

    $addData = array();

    if($p_event) {

        $eventPath = 'php/run/'.$p_event.'/init.php';

        if($addition->fileExists($eventPath)) {

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

            //Message information...

        }

    }

}

//SAVE CURRENT TRANSACTION (do not unset in logout, user may login one more time without close browser)

//No repeat
if(!in_array($p_transaction, $tool->getSession('transaction')))
    $tool->pushSession('transaction', $p_transaction);

//---
//Save to logs...