<?php

class System
{
    public $domain;

    private $system;

    public function __construct() {

        $this->domain = $this->getServer('HTTP_HOST');

        $this->system = $this->dirExists('domain/'.$this->domain);

    }
    private function getServer($name = false) {

        if($name) {

            return $_SERVER[$name];

        }else{

            return $_SERVER;

        }

    }
    private function dirExists($path = false) {

        if($path) {

            if(is_dir($path)) {

                return $path;

            }else{

                return 'domain/default';

            }

        }else{

            return 'domain/default';

        }

    }

    public function getContent() {

        require_once $this->system.'/content.php';

    }
}