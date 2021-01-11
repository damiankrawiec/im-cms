<?php


class Auth
{

    public function __construct() {

    }

    private function getUserByEmail($email, $db) {

        $sql = 'select user_id as id, password from im_user where email like :email';

        $db->prepare($sql);

        $parameter = array(
            array('name' => ':email', 'value' => $email, 'type' => 'string')
        );

        $db->bind($parameter);

        return $db->run('one');

    }

    private function initAuthSession($userId, $timestamp, $token, $session) {

        $session->setSession('id', $userId);

        $session->setSession('timestamp', $timestamp);

        $session->setSession('token', $token);

    }

    private function removeAuthSession($session) {

        $session->setSession('id', false);

        $session->setSession('timestamp', false);

        $session->setSession('token', false);

        $session->setSession('email', false);

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

        $this->initAuthSession(sha1($userId), $timestamp, $token, $session);//mask user id (insert another id)

    }

    public function checkAuthData() {

        $sql = 'select token, timestamp from im_user where sha1(user_id) = :id';

        $this->db->prepare($sql);

        $parameter = array(
            array('name' => ':id', 'value' => $this->session->getSession(), 'type' => 'string')
        );

        $this->db->bind($parameter);

        $this->db->run('one');

        $this->initAuthSession(sha1($userId), $timestamp, $token);//mask user id (insert another)

    }

    public function removeAuthData($db, $session) {

        $sql = 'update im_user set
                   token = :token,
                   timestamp = :timestamp where sha1(user_id) = :id';

        $db->prepare($sql);

        $parameter = array(
            array('name' => ':token', 'value' => '', 'type' => 'string'),
            array('name' => ':timestamp', 'value' => '', 'type' => 'string'),
            array('name' => ':id', 'value' => $session->getSession('id'), 'type' => 'int')
        );

        $db->bind($parameter);

        $db->run('one');

        $this->removeAuthSession($session);

    }

}