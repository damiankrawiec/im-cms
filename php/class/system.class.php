<?php

class System extends Setting
{
    public $domain;//server name (without path)

    private $system;//system/[name]

    private $checkSystemStructure;//bool

    private $section;//id from database

    private $currentSection;//url

    private $startSection;//url

    private $setting;//array

    public function __construct() {

        $this->section = false;

        $this->domain = $this->getServer('HTTP_HOST');

        $this->system = $this->pathSystem('system/'.$this->domain);

        $this->checkSystemStructure = true;

        $this->setting = array();

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

    private function settingArray($setting) {

        $settingArray = array();
        foreach ($setting as $s) {

            $settingArray[$s['system_name']] = $s['content'];

        }

        $this->setting = $settingArray;

    }

    public function setSection($url, $db) {

        $this->currentSection = $url;

        $sql = 'select section_id as id, name
                from im_section
                where url = :url';

        $db->prepare($sql);

        $parameter = array(
            array('name' => ':url', 'value' => $this->currentSection, 'type' => 'string')
        );

        $db->bind($parameter);

        $this->section = $db->run('one');

    }

    public function setStartSection($section) {

        $this->startSection = $section;

    }

    public function getSection() {

        return $this->section;

    }

    public function systemName() {

        return $this->system;

    }

    public function getHead() {

        if($this->checkSystemStructure) {

            echo '<link rel="stylesheet" href="' . $this->system . '/css/main.css">';

        }

    }

    public function getContent($db = false, $session) {

        if($db) {

            if ($this->checkSystemStructure and $this->section) {

                require_once $this->system . '/content.php';

                return $label;

            }else return false;

        }else return false;

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

    public function setting($db) {

        $sql = 'select system_name as system_name, content, name
                from im_setting';

        $db->prepare($sql);

        $setting = $db->run('all');

        if($setting) {

            $this->settingArray($setting);

        }

    }

    public function getSetting() {

        return $this->setting;

    }
}