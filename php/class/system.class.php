<?php

class System extends Setting
{
    public $domain;//server name (without path)

    private $system;//system/[name]

    private $checkSystemStructure;//bool

    private $section;//id from database

    private $currentSection;//url

    private $currentLanguage;

    private $startSection;//url

    private $setting;//array

    private $admin = false;//Is admin logged

    public function __construct() {

        $this->section = false;

        $this->currentLanguage = false;

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

    private function checkIsAdmin($session) {

        if(isset($session) and isset($session['admin']) and is_array($session['admin']) and count($session['admin']) > 0) {

            $this->admin = true;

        }

    }

    private function currentLanguage($session) {

        if(isset($session['language'])) {

            $this->currentLanguage = $session['language'];

        }

    }

    public function setSection($url, $db) {

        $this->currentSection = $url;

        $sql = 'select section_id as id, name, name_url as url, meta, class, popup, status_popup
                from im_section
                where name_url = :url';

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

            echo '<link rel="stylesheet" href="section/css/main.css">';

            echo '<link rel="stylesheet" href="' . $this->system . '/css/main.css">';

        }

    }

    public function getContent($db = false, $session) {

        if($db) {

            if ($this->checkSystemStructure and $this->section) {

                $this->currentLanguage($session);

                $this->checkIsAdmin($session);

                require_once $this->system . '/content.php';

                return array('label' => $label, 'translation' => $object->getCurrentTranslation());

            }else return false;

        }else return false;

    }

    public function getBody() {

        if($this->checkSystemStructure) {

            $fileGlobal = scandir('section/js');

            $fileLocal = scandir($this->system . '/js');

            if (count($fileGlobal) > 2) {

                foreach ($fileGlobal as $fg) {

                    if ($fg == '.' or $fg == '..' or $fg == '.htaccess')
                        continue;

                    echo '<script src="section/js/' . $fg . '"></script>';

                }

            }

            if (count($fileLocal) > 2) {

                foreach ($fileLocal as $fl) {

                    if ($fl == '.' or $fl == '..' or $fl == '.htaccess')
                        continue;

                    echo '<script src="' . $this->system . '/js/' . $fl . '"></script>';

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

    public function link($location = false) {

        if($location) {

            header('Location:' . $location);

            exit();

        }

    }
}