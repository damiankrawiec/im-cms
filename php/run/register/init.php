<?php

if($auth->register($formData, $db)) {

    $alert1 = 'register-success';

}else $alert0 = 'register-fail';