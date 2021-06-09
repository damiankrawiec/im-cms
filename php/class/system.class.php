<?php

class System extends Setting
{
    public $domain;//server name (without path)

    private $system;//system/[name]

    private $checkSystemStructure;//bool

    private $section;//id from database

    private $currentSection;//url

    private $defaultLanguage;//Default language from database

    private $currentLanguage;//Set language from database or URL

    private $path = '';

    private $startSection;//url

    private $setting;//array

    private $admin = false;//Is admin logged

    private $parallax = array();//Is parallax view on section

    private $parallaxPointer = 0;//Pointer in parallax array

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

    private function checkIsAdmin($session) {

        $return = false;
        if(isset($session) and isset($session['admin']) and is_array($session['admin']) and count($session['admin']) > 0) {

            $this->admin = true;

            $return = true;

        }

        return $return;

    }

    private function implode3d($data, $index = false) {

        $array2d = array();

        foreach ($data as $i => $d) {

            $array2d[($index ? $d[$index] : $i)] = $d;

        }

        return $array2d;

    }

    private function parallax() {

        //Init modules
        if(count($this->parallax) > 0) {

            if(isset($this->parallax[$this->parallaxPointer])) {

                echo '<div class="parallax-window" data-parallax="scroll" data-image-src="' . $this->system . '/public/' . $this->parallax[$this->parallaxPointer]['url'] . '">';

                if($this->parallax[$this->parallaxPointer]['content'] != '')
                    echo '<span>'.$this->parallax[$this->parallaxPointer]['content'].'</span>';

                echo '</div>';

                $this->parallaxPointer++;

            }

        }

    }

    private function url($url, $db){

        $return = $url;
        if($this->currentLanguage !== $this->defaultLanguage) {

            $sql = 'select target_record as id
                from im_translation
                where target_table like :table
                and target_column like :column
                and content = :content';

            $db->prepare($sql);

            $parameter = array(
                array('name' => ':table', 'value' => 'im_section', 'type' => 'string'),
                array('name' => ':column', 'value' => 'name_url', 'type' => 'string'),
                array('name' => ':content', 'value' => $url, 'type' => 'string')
            );

            $db->bind($parameter);

            if($section = $db->run('one')) {

                $sql = 'select name_url as url
                    from im_section
                    where section_id like :id';

                $db->prepare($sql);

                $parameter = array(
                    array('name' => ':id', 'value' => $section->id, 'type' => 'int')
                );

                $db->bind($parameter);

                $return = $db->run('one')->url;

            }

        }

        return $return;

    }

    public function setDefaultLanguage($db) {

        $sql = 'select system_name as name
                from im_language
                where status like :status
                and status_default = :status_default';

        $db->prepare($sql);

        $parameter = array(
            array('name' => ':status', 'value' => 'on', 'type' => 'string'),
            array('name' => ':status_default', 'value' => 'on', 'type' => 'string')
        );

        $db->bind($parameter);

        $defaultLanguage = $db->run('one');

        $this->defaultLanguage = $defaultLanguage->name;

    }

    public function setCurrentLanguage($language) {

        $this->currentLanguage = $this->defaultLanguage;

        if($language !== '')
            $this->currentLanguage = $language;

    }

    public function setPath() {

        if($this->currentLanguage !== $this->defaultLanguage)
            $this->path = '../';

        return $this->path;

    }

    public function setSection($url, $db) {

        $this->currentSection = $this->url($url, $db);

        $sql = 'select section_id as id, parent, name, name_second, name_url as url, meta, icon, class, popup, status_popup, status_parallax
                from im_section';

        $db->prepare($sql);

        $sectionRecord = $db->run('all');

        $this->section = $this->implode3d($sectionRecord, 'url');

        if($this->section[$this->currentSection]['status_parallax'] == 'on') {

            $sql = 'select i.name as name, i.content as content, i.url as url
                from im_section_image si
                join im_image i on (si.image_id = i.image_id)
                where si.section_id = '.$this->section[$this->currentSection]['id'].'
                and i.status = "on"
                order by si.position';

            $db->prepare($sql);

            $imageSectionRecord = $db->run('all');

            if($imageSectionRecord) {

                $this->parallax = $this->implode3d($imageSectionRecord);

            }

        }

    }

    public function setStartSection($section) {

        $this->startSection = $section;

    }

    public function getSection($url = false, $field = false) {

        if($url and !$field)
            $returnSection = $this->section[$this->currentSection];

        if($url and $field)
            $returnSection = $this->section[$this->currentSection][$field];

        if(!$url and !$field)
            $returnSection = $this->section;

        return $returnSection;

    }

    //Checking url (when type = true then is contain, when type = false then is not contain)
    public function checkSection($url = false, $urls = false, $type = true) {

        if($url and $urls and is_bool($type)) {

            if($type === true) {

                if(stristr($urls, $url)) {

                    return true;

                }else{

                    return false;

                }

            }
            if($type === false) {

                if(!stristr($urls, $url)) {

                    return true;

                }else{

                    return false;

                }

            }

        }

    }

    public function systemName() {

        return $this->system;

    }

    public function getHead($addition) {

        if($this->checkSystemStructure) {

            echo '<link rel="stylesheet" href="'.$this->path.'section/css/main.css">';

            echo '<link rel="stylesheet" href="'.$this->path.$this->system . '/css/main.css">';

            $childStyle = $this->path.$this->system . '/css/child/main.css';
            if($addition->fileExists($childStyle))
                echo '<link rel="stylesheet" href="'.$childStyle.'">';

        }

    }

    public function getContent($db = false, $session, $addition, $auth) {

        if($db) {

            if ($this->checkSystemStructure and $this->section) {

                if($this->checkIsAdmin($session)) {

                    $cmsUrl = '#';
                    if(isset($session['path-admin']))
                        $cmsUrl = $this->path.'!cms/'.$session['path-admin'];

                    echo '<div style="position:fixed; z-index: 1000; opacity:0.8">';

                    echo '<a href="'.$cmsUrl.'" class="btn btn-light m-1 float-left"><i class="fal fa-search fa-flip-horizontal"></i></a>';

                    echo '<a href="'.$this->path.'!cms/section,'.$this->getSection(true, 'parent').',edit,'.$this->getSection($this->currentSection, 'id').','.$this->currentSection.'" class="btn btn-light m-1 float-left"><i class="fal fa-pencil"></i></a>';

                    echo '</div>';

                }

                require_once $this->system . '/content.php';

                return array('label' => $label, 'translation' => $object->getCurrentTranslation(), 'icon' => $object->getCurrentIcon(), 'map-array' => $object->mapArray);

            }else return false;

        }else return false;

    }

    public function getBody() {

        if($this->checkSystemStructure) {

            $fileGlobal = scandir('section/js');

            $fileLocal = scandir($this->system . '/js');

            //Init modules
            if(count($this->parallax) > 0) {

                echo '<script src="'.$this->path.'module/parallax/parallax.min.js"></script>';

            }
            //--

            if (count($fileGlobal) > 2) {

                foreach ($fileGlobal as $fg) {

                    if ($fg == '.' or $fg == '..' or $fg == '.htaccess')
                        continue;

                    echo '<script src="'.$this->path.'section/js/' . $fg . '"></script>';

                }

            }

            if (count($fileLocal) > 2) {

                foreach ($fileLocal as $fl) {

                    if ($fl == '.' or $fl == '..' or $fl == '.htaccess')
                        continue;

                    echo '<script src="'.$this->path.$this->system . '/js/' . $fl . '"></script>';

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