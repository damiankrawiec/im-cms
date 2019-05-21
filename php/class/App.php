<?php


class App
{
    public function __construct() {

    }
    public function getServer($name = false) {

        if($name) {

            return $_SERVER[$name];

        }else{

            return $_SERVER;

        }

    }
    public function fileExists($path = false) {

        if($path) {

            if(file_exists($path)) {

                return true;

            }else{

                return false;

            }

        }else{

            return false;

        }

    }
}