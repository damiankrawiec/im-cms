<?php

class System extends Setting
{
    public $domain;

    private $system;

    private $checkSystemStructure;

    public function __construct() {

        $this->domain = $this->getServer('HTTP_HOST');

        $this->system = $this->pathSystem('system/'.$this->domain);

        $this->checkSystemStructure = true;

        $this->scanSystemStructure();

        if(!$this->checkSystemStructure) {

            var_dump('Require system structure fault in: '.$this->domain);

            exit();

        }

    }
    private function getServer($name = false) {

        if($name) {

            return $_SERVER[$name];

        }else{

            return $_SERVER;

        }

    }
    private function pathSystem($path = false) {

        if($path) {

            if(is_dir($path)) {

                return $path;

            }else{

                return 'system/default';

            }

        }else{

            return 'system/default';

        }

    }

    private function fileExists($path = false) {

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

    private function dirExists($path = false) {

        if($path) {

            if(is_dir($path)) {

                return true;

            }else{

                return false;

            }

        }else{

            return false;

        }

    }

    private function scanSystemStructure() {

        foreach ($this->systemStructure as $type => $path) {

            foreach ($path as $p) {

                if($type == 'file') {

                    if(!$this->fileExists($this->system.'/'.$p)) {

                        $this->checkSystemStructure = false;

                    }

                }

                if($type == 'dir') {

                    if(!$this->dirExists($this->system.'/'.$p)) {

                        $this->checkSystemStructure = false;

                    }

                }

            }

        }

    }

    public function systemName() {

        return $this->system;

    }

    public function getHead() {

        if($this->checkSystemStructure) {

            echo '<link rel="stylesheet" href="' . $this->system . '/css/main.css">';

        }

    }

    public function getContent($db = false) {

        if($this->checkSystemStructure and $db) {

            require_once $this->system . '/content.php';

        }

    }

    public function getBody() {

        if($this->checkSystemStructure) {

            $file = scandir($this->system . '/js');

            if (count($file) > 2) {

                foreach ($file as $f) {

                    if ($f == '.' or $f == '..' or $f == '.htaccess')
                        continue;

                    echo '<script src="' . $this->system . '/js/' . $f . '"></script>';

                }

            }

        }

    }
}