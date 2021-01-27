<?php

//Set all post variables

$p_systemName = false;
if(isset($_POST['systemName']))
    $p_systemName = $_POST['systemName'];

$p_system = false;
if(isset($_POST['system']))
    $p_system = $_POST['system'];

$p_section = false;
if(isset($_POST['section']))
    $p_section = $_POST['section'];

$p_label = false;
if(isset($_POST['label']))
    $p_label = $_POST['label'];

$p_category = false;
if(isset($_POST['category']))
    $p_category = $_POST['category'];

$p_session = false;
if(isset($_POST['session']))
    $p_session = $_POST['session'];

$p_sendForm = false;
if(isset($_POST['sendForm']))
    $p_sendForm = $_POST['sendForm'];

$p_string = false;
if(isset($_POST['string']))
    $p_string = $_POST['string'];

$p_event = false;
if(isset($_POST['event']))
    $p_event = $_POST['event'];

$p_transaction = false;
if(isset($_POST['transaction']))
    $p_transaction = $_POST['transaction'];

$p_transaction_package = false;
if(isset($_POST['transaction_package']))
    $p_transaction_package = $_POST['transaction_package'];

$p_path = false;
if(isset($_POST['path']))
    $p_path = $_POST['path'];

$p_email = false;
if(isset($_POST['email']))
    $p_email = $_POST['email'];

$p_package = false;
if(isset($_POST['package']))
    $p_package = $_POST['package'];

$p_id = false;
if(isset($_POST['id']))
    $p_id = $_POST['id'];

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