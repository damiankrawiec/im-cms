<?php


class System {

    private $system;//system/[name]

    public function __construct($domain) {

        $this->system = $this->systemName($domain);

    }

    private function systemName($name = false) {

        if(is_dir('../system/'.$name)) {

            return $name;

        }else{

            return 'default';

        }

    }
    public function getSystemName() {

        return $this->system;

    }
}