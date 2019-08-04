<?php


class Session
{

    public function __construct() {

        session_start();

    }

    public function getSession() {

        return $_SESSION;

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