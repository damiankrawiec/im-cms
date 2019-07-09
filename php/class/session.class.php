<?php


class Session
{

    public $sessionLabel;

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

            if($value > 0) {

                $_SESSION[$name] = $value;

            }else{

                unset($_SESSION[$name]);

            }




        }

    }

}