<?php

if($userId = $auth->checkAuthForm($formData['email'], $formData['password'], $db)) {

    $auth->initAuthData($userId, $addition->getDate(), $addition->transaction(), $addition->token($session->sessionId(), sha1($userId)), $db, $session);

    $session->setSession('email', $formData['email']);

    $alert1 = 'Logowanie poprawne';

}else $alert0 = 'Złe dane';