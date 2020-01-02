<?php

//Set all post variables

$p_email = false;
if(isset($_POST['email']))
    $p_email = $_POST['email'];

$p_password = false;
if(isset($_POST['password']))
    $p_password = $_POST['password'];

$p_transaction = false;
if(isset($_POST['transaction']))
    $p_transaction = $_POST['transaction'];

$p_event = false;
if(isset($_POST['event']))
    $p_event = $_POST['event'];

$p_id = false;
if(isset($_POST['id']))
    $p_id = $_POST['id'];

$p_table = false;
if(isset($_POST['table']))
    $p_table = $_POST['table'];

$p_system = false;
if(isset($_POST['system']))
    $p_system = $_POST['system'];

$p_currentSystem = false;
if(isset($_POST['current_system']))
    $p_currentSystem = $_POST['current_system'];

$p_path = false;
if(isset($_POST['path']))
    $p_path = $_POST['path'];

$p_permitted = false;
if(isset($_POST['permitted']))
    $p_permitted = $_POST['permitted'];

$p_current = false;
if(isset($_POST['current']))
    $p_current = $_POST['current'];

$p_back = false;
if(isset($_POST['back']))
    $p_back = $_POST['back'];

$p_restriction = false;
if(isset($_POST['restriction']))
    $p_restriction = $addition->jsonArray($_POST['restriction']);

$p_file_delete = false;
if(isset($_POST['file_delete']))
    $p_file_delete = $_POST['file_delete'];

$p_event_table = false;
if(isset($_POST['event_table']))
    $p_event_table = $addition->jsonArray($_POST['event_table']);

$p_event_id = false;
if(isset($_POST['event_id']))
    $p_event_id = $addition->jsonArray($_POST['event_id']);

$p_event_collection = false;
if(isset($_POST['event_collection']))
    $p_event_collection = $addition->jsonArray($_POST['event_collection']);

$p_event_supplement = false;
if(isset($_POST['event_supplement']))
    $p_event_supplement = $addition->jsonArray($_POST['event_supplement']);

$p_field_supplement = false;
if(isset($_POST['field_supplement']))
    $p_field_supplement = $addition->jsonArray($_POST['field_supplement']);

$formData = array();
if(isset($_POST)) {

    //Get "form_" variables from POST array
    $keyPost = array_keys($_POST);

    foreach ($keyPost as $post) {

        if (stristr($post, 'form_')) {

            $formData[$addition->cleanText($post, 'form_')] = $_POST[$post];

        }

    }

}

$fileData = false;
if(isset($_FILES))
    $fileData = $_FILES;

$collectionData = array();
foreach ($keyPost as $post) {

    if(stristr($post, 'collection_')){

        $collectionData[$addition->cleanText($post, 'collection_')] = $_POST[$post];

    }

}

unset($_POST);