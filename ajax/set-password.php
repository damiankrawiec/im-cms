<?php

require_once '../php/script/post.php';

if(isset($p_system) and isset($p_email) and isset($p_path)) {

    require_once '../php/class/addition.class.php';

    $addition = new Addition();

    require_once '../!cms/php/class/system.class.php';

    $system = new System($p_system, '../');

    //Init setting and $db object
    $pathUp = '';
    require_once '../!cms/php/script/system.php';

    $sql = 'select user_id as id from im_user where email like :email and password_url like :path';

    $db->prepare($sql);

    $parameter = array(
        array('name' => ':email', 'value' => $p_email, 'type' => 'string'),
        array('name' => ':path', 'value' => $p_path, 'type' => 'string')
    );

    $db->bind($parameter);

    $user = $db->run('one');

    $exit = 'false';
    if($user) {

        $password = $addition->password();

        if($password) {

            $sql = 'update im_user set password = :password, status = :status, status_confirmation = :status_confirmation, password_url = :path where user_id = :id';

            $db->prepare($sql);

            $parameter = array(
                array('name' => ':password', 'value' => password_hash(sha1($password), PASSWORD_DEFAULT), 'type' => 'string'),
                array('name' => ':status', 'value' => 'on', 'type' => 'string'),
                array('name' => ':status_confirmation', 'value' => 'on', 'type' => 'string'),
                array('name' => ':path', 'value' => '', 'type' => 'string'),
                array('name' => ':id', 'value' => $user->id, 'type' => 'int')
            );

            $db->bind($parameter);

            if ($db->run())
                $exit = $password;

        }

    }

    exit($exit);

}