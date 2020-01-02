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

            $eventData = array();

            if(count($formData) > 0)
                $eventData['data'] = $formData;

            if($p_event_table)
                $eventData['table'] = $p_event_table;

            if($p_event_id)
                $eventData['id'] = $p_event_id;

            if($p_event_supplement)
                $eventData['supplement'] = $p_event_supplement;

            if($p_field_supplement)
                $eventData['field_supplement'] = $p_field_supplement;

            if($p_restriction)
                $eventData['restriction'] = $p_restriction;

            if($p_path)
                $eventData['path'] = $p_path;

            if($p_permitted)
                $eventData['permitted'] = $p_permitted;

            if($p_current)
                $eventData['current'] = $p_current;

            if($p_file_delete)
                $eventData['file_delete'] = $p_file_delete;

            if($p_event_collection)
                $eventData['collection'] = $p_event_collection;

            $fileName = false;
            if($fileData) {

                $eventData['data']['url'] = $fileData['url']['name'];

                $tmpName = $fileData['url']['tmp_name'];

                require_once 'php/run/file/init.php';

            }

            require_once $eventPath;

            //Message top information (fail, success)
            if($alert1)
                echo $addition->alert1($alert1, $icon['message']['success']);

            if($alert0)
                echo $addition->alert0($alert0, $icon['message']['fail']);

        }

    }

}

//SAVE CURRENT TRANSACTION (do not unset in logout, user may login one more time without close browser)

//No repeat
if(!in_array($p_transaction, $tool->getSession('transaction')))
    $tool->pushSession('transaction', $p_transaction);

//---
//Save to logs...