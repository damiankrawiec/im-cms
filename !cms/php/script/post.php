<?php

//Set all post variables

$p_email = false;
if(isset($_POST['email']))
    $p_email = $_POST['email'];

$p_password = false;
if(isset($_POST['password']))
    $p_password = $_POST['password'];

$p_password = false;
if(isset($_POST['password']))
    $p_password = $_POST['password'];

$p_transaction = false;
if(isset($_POST['transaction']))
    $p_transaction = $_POST['transaction'];

$p_event = false;
if(isset($_POST['event']))
    $p_event = $_POST['event'];

$p_restriction = false;
if(isset($_POST['restriction'])) {

    $p_restrictionJson = str_replace('\'', '"', $_POST['restriction']);

    $p_restriction = json_decode($p_restrictionJson);

}

$p_event_table = false;
if(isset($_POST['event_table']))
    $p_event_table = $_POST['event_table'];

$p_event_id = false;
if(isset($_POST['event_id']))
    $p_event_id = $_POST['event_id'];

//Get "form_" variables from POST array
$keyPost = array_keys($_POST);
$formData = array();
foreach ($keyPost as $post) {

    if(stristr($post, 'form_')){

        $formData[$addition->cleanText($post, 'form_')] = $_POST[$post];

    }

}

unset($_POST);