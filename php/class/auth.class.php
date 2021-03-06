<?php


class Auth
{

    public function __construct() {

    }

    private function getUserByEmail($email, $db) {

        $sql = 'select user_id as id, password from im_user where email like :email and status like :status and status_confirmation like :status_confirmation';

        $db->prepare($sql);

        $parameter = array(
            array('name' => ':email', 'value' => $email, 'type' => 'string'),
            array('name' => ':status', 'value' => 'on', 'type' => 'string'),
            array('name' => ':status_confirmation', 'value' => 'on', 'type' => 'string')
        );

        $db->bind($parameter);

        return $db->run('one');

    }

    private function initAuthSession($userId, $timestamp, $session) {

        $session->setSession('id', $userId);

        $session->setSession('timestamp', $timestamp);

    }

    private function removeAuthSession($session) {

        $session->setSession('id', false);

        $session->setSession('timestamp', false);

        $session->setSession('email', false);

    }

    private function compareServerSession($serverData, $sessionData) {

        $return = false;
        if($serverData['token'] === $sessionData['token'] and $serverData['timestamp'] === $sessionData['timestamp'])
            $return = true;

        return $return;

    }

    public function checkAuthForm($email, $password, $db) {

        $user = $this->getUserByEmail($email, $db);

        $return = false;
        if($user) {

            if(password_verify($password, $user->password)) {

                $return = $user->id;

            }

        }

        return $return;

    }

    public function initAuthData($userId, $datetime, $timestamp, $token, $db, $session) {

        $sql = 'update im_user set 
                   token = :token, 
                   timestamp = :timestamp,
                   date_login = :datetime where user_id = :id';

        $db->prepare($sql);

        $parameter = array(
            array('name' => ':token', 'value' => $token, 'type' => 'string'),
            array('name' => ':timestamp', 'value' => $timestamp, 'type' => 'string'),
            array('name' => ':datetime', 'value' => $datetime, 'type' => 'string'),
            array('name' => ':id', 'value' => $userId, 'type' => 'int')
        );

        $db->bind($parameter);

        $db->run('one');

        $this->initAuthSession(sha1($userId), $timestamp, $session);//mask user id (insert another id)

    }

    //Is used in client side, object class
    public function checkAuthData($db, $sessionArray, $token) {

        $sql = 'select token, timestamp from im_user where sha1(user_id) = :id';

        $db->prepare($sql);

        $parameter = array(
            array('name' => ':id', 'value' => $sessionArray['id'], 'type' => 'string')
        );

        $db->bind($parameter);

        $server = $db->run('one');

        return $this->compareServerSession(
            array('token' => $server->token, 'timestamp' => $server->timestamp),
            array('token' => $token, 'timestamp' => $sessionArray['timestamp'])
        );

    }

    public function removeAuthData($db, $session) {

        $sql = 'update im_user set
                   token = :token,
                   timestamp = :timestamp where sha1(user_id) = :id';

        $db->prepare($sql);

        $parameter = array(
            array('name' => ':token', 'value' => '', 'type' => 'string'),
            array('name' => ':timestamp', 'value' => '', 'type' => 'string'),
            array('name' => ':id', 'value' => $session->getSession('id'), 'type' => 'string')
        );

        $db->bind($parameter);

        $db->run('one');

        $this->removeAuthSession($session);

    }

    public function register($data, $db) {

        $return = false;
        if($data['captcha_text'] !== '' and $data['captcha_text'] === $data['captcha']) {

            $sql = 'insert im_user (first_name, last_name, email) values (:firstname, :lastname, :email)';

            $db->prepare($sql);

            $parameter = array(
                array('name' => ':firstname', 'value' => $data['firstname'], 'type' => 'string'),
                array('name' => ':lastname', 'value' => $data['lastname'], 'type' => 'string'),
                array('name' => ':email', 'value' => $data['email'], 'type' => 'string')
            );

            $db->bind($parameter);

            $db->run();

            $return = true;

        }

        return $return;

    }

}