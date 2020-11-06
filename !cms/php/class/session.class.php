<?php


class Session extends Security
{

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

    public function initSession($name = false) {

        if($name) {

            $_SESSION[$name] = array();

        }

    }

    public function setSession($name = false, $value) {

        if($name) {

            if(is_int($value) and $value > 0) {

                $_SESSION[$name] = $value;

            }else if(is_string($value)){

                $_SESSION[$name] = $value;

            }else if(is_array($value)) {

                $_SESSION[$name] = $value;

            }else{

                unset($_SESSION[$name]);

            }

        }

    }

    public function getSession($name = false) {

        if($name) {

            if(isset($_SESSION[$name])) {

                return $_SESSION[$name];

            }else return '';

        }

    }

    public function pushSession($name = false, $value) {

        if($name) {

            array_push($_SESSION[$name], $value);

        }

    }

    public function removeSession($name, $type = false) {

        if($type) {

            if($type == 'first')
                array_pop($_SESSION[$name]);

            if($type == 'last')
                array_shift($_SESSION[$name]);

        }

    }

}