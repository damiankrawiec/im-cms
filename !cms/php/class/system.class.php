<?php


class System
{
    public $domain;//server name (without path)

    private $system;//system/[name]

    public function __construct() {

        $this->domain = $this->getServer('HTTP_HOST');

        $this->system = $this->systemName($this->domain);

    }

    private function getServer($name = false) {

        if($name) {

            return $_SERVER[$name];

        }else{

            return $_SERVER;

        }

    }
    private function systemName($name = false) {

        if('../system/'.$name) {

            if(is_dir('../system/'.$name)) {

                return $name;

            }else{

                return 'default';

            }

        }else{

            return 'default';

        }

    }
    public function getSystemName() {

        return $this->system;

    }
}