<?php

class System {

    private $path;

    private $system;//system/[name]

    private $allSystem = false;

    public function __construct($domain, $pathUp) {

        $this->path = $pathUp.'system';

        $this->systemName($domain);

        $this->allSystem();

    }

    private function systemName($name = false) {

        if($name and $name !== '') {

            if(is_dir($this->path.'/'.$name)) {

                $this->system = $name;

            }else $this->system = 'default';

        }else{

            $domain = $_SERVER['HTTP_HOST'];

            if(is_dir($this->path.'/'.$domain)) {

                $this->system = $domain;

            }else $this->system = 'default';

        }

    }
    private function allSystem() {

        $systemPath = scandir($this->path);

        $systemArray = array();
        foreach ($systemPath as $system) {

            if($system == '.' or $system == '..')
                continue;

            if(is_dir($this->path.'/'.$system))
                array_push($systemArray, $system);

        }

        $this->allSystem = $systemArray;

    }
    public function getSystemName() {

        return $this->system;

    }
    public function getAllSystem() {

        return $this->allSystem;

    }
}