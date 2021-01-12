<?php

if($userId = $auth->checkAuthForm($formData['email'], $formData['password'], $db)) {

    //Token sessionId, clientIp, userId
    $auth->initAuthData($userId, $addition->getDate(), $addition->transaction(), $addition->token($session->sessionId(), sha1($userId)), $db, $session);

    $session->setSession('email', $formData['email']);

    $alert1 = 'login-success';

}else $alert0 = 'auth-fail';