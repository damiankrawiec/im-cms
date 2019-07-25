<?php


class Session
{

    public $sessionLabel;

    protected function init() {

        session_regenerate_id();

//        ini_set('session.use_cookies', true);
//
//        ini_set('session.use_only_cookies', true);
//
//        ini_set('session.trans_sid', false);
//
//        ini_set('session.cookie_httponly', true);
//
//        ini_set('session.entropy_file', true);
//
//        ini_set('session.entropy_length', true);

    }

    protected function sessionId() {

        return session_id();

    }

    public function __construct() {

        session_start();

    }

    public function setSessionLabel($sessionLabel) {

        if(is_array($sessionLabel) and count($sessionLabel) > 0) {

            $this->sessionLabel = $sessionLabel;

        }else{

            $this->sessionLabel = false;

        }

    }

    public function getSession() {

        if($this->sessionLabel) {

            $sessionArrayReturn = array();
            foreach ($this->sessionLabel as $sl) {

                if(isset($_SESSION[$sl])) {

                    $sessionArrayReturn[$sl] = $_SESSION[$sl];

                }else{

                    $sessionArrayReturn[$sl] = false;

                }

            }

            return $sessionArrayReturn;

        }

    }

    public function setSession($name = false, $value) {

        if($name) {

            if(is_int($value) and $value > 0) {

                $_SESSION[$name] = $value;

            }else if(is_string($value)){

                $_SESSION[$name] = $value;

            }else{

                unset($_SESSION[$name]);

            }

        }

    }

}