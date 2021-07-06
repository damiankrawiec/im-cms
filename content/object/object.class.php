<?php

//class language is parent to every element in section content
require_once 'php/class/icon.class.php';

//class language is parent to every element in section content
require_once 'php/class/language.class.php';

class ObjectContent extends Language {

    private $label;

    private $objectCounter;

    private $objectCounterLabel;

    private $path = '';

    private $row;//check if starting object has class and class is "col"

    private $admin;

    private $setting = false;

    private $addition;

    private $auth;

    private $session;//only variables (no method)

    private $allowObject;

    private $domain;

    private $currentSection;

    protected $systemName;

    public $mapArray;

    public function __construct($systemName, $db, $currentLanguage, $defaultLanguage, $admin, $setting = false, $domain, $addition, $auth, $session, $path, $currentSection) {

        parent::__construct($db, $currentLanguage, $defaultLanguage);

        $this->systemName = $systemName;

        $this->label = 'label';

        $this->objectCounter = 0;

        $this->path = $path;//Not to server side, only front like img

        $this->row = false;

        $this->admin = $admin;

        $this->mapArray = array();

        $this->addition = $addition;

        $this->auth = $auth;

        $this->session = $session;

        $this->allowObject = array(0);

        $this->domain = $domain;

        $this->currentSection = $currentSection;

        $this->translationSource = $this->getTranslationSource($systemName, $addition);

        if($setting)
            $this->setting = $setting;

        $this->setAllowObject();

    }

    private function getParameterFromArray($parameterArray) {

        $parameterArrayOut = array();
        foreach ($parameterArray as $pa) {

            $paClear = str_replace(':', '', $pa['name']);

            array_push($parameterArrayOut, $paClear);

        }

        return $parameterArrayOut;

    }

    private function whereOrAnd($sql) {

        if(stristr($sql, 'where')) {

            $whereOrAnd = ' and';

        }else{

            $whereOrAnd = ' where';
        }

        return $whereOrAnd;

    }

    //For logged user (if is)
    private function setAllowObject() {

       if(isset($this->session['id'])) {

           if($this->auth->checkAuthData($this->db, array('id' => $this->session['id'], 'timestamp' => $this->session['timestamp']), $this->addition->token($this->session['session_id'], $this->session['id']))) {

               $sql = 'select object_id as id from im_user_object where sha1(user_id) = :id';

               $this->db->prepare($sql);

               $parameter = array(
                   array('name' => ':id', 'value' => $this->session['id'], 'type' => 'string')
               );

               $this->db->bind($parameter);

               $allowObjectData = $this->db->run('all');

               if ($allowObjectData)
                   $this->allowObject = $this->addition->implode3d($allowObjectData, 'id');

           }

       }

    }

    private function getObject($parameter = false) {

        $isParameter = false;
        if($parameter and is_array($parameter) and count($parameter) > 0) {

            //Set parameters to flat array
            $parameterArray = $this->getParameterFromArray($parameter);

            $isParameter = true;

        }

        //Name of aliases need to be the same as system_name of property fixed to type of object
        $sql = $this->getObjectSql();

        //Field from joining tables
        //if($isParameter) {}

        if($isParameter) {

            //Join (do not show where not exists - "inner join")
            if(in_array('section', $parameterArray))
                $sql .= ' join im_section_object so on so.object_id = o.object_id';

            if(in_array('label', $parameterArray))
                $sql .= ' join im_label l on l.label_id = o.label_id';

            //Where (or and)
            if(in_array('section', $parameterArray)) {

                $sql .= $this->whereOrAnd($sql);

                $sql .= ' so.section_id = :section';

            }

            if(in_array('label', $parameterArray)) {

                $sql .= $this->whereOrAnd($sql);

                $sql .= ' l.system_name = :label';

            }

            if(in_array('free', $parameterArray)) {

                $sql .= $this->whereOrAnd($sql);

                $sql .= ' o.status_free = :free';

            }

        }

        $sql .= $this->whereOrAnd($sql);

        $sql .= ' o.status like "on"';

        $sql .= ' order by o.position';

        $this->db->prepare($sql);

        if($isParameter)
            $this->db->bind($parameter);

        return $this->db->run('all');

    }

    //Field of object in sql query - getObject()
    private function getObjectSql() {

        return 'select 
            o.object_id as id, 
            o.name as name, 
            o.date as date, 
            o.type_id as type, 
            o.content as content, 
            o.short as short, 
            o.section as section,
            o.section_name as section_name, 
            o.link as link,
            o.link_name as link_name,
            o.email as email,
            o.form as form,
            o.attachment as attachment, 
            o.icon as icon,
            o.map as map,
            o.package as package,
            o.spec as spec,
            o.status_protected as status_protected
            from im_object o';

    }

    private function getPropertyFromType($type) {

        $sql = 'select property_id as id, class, class_field from im_type_property where type_id = :type and status like "on" order by position';

        $this->db->prepare($sql);

        $parameter = array(
            array('name' => ':type', 'value' => $type, 'type' => 'int')
        );

        $this->db->bind($parameter);

        $properties = $this->db->run('all');

        $sql = 'select system_name from im_property where property_id = :property';

        $this->db->prepare($sql);

        $propertiesArray = array();
        foreach($properties as $p) {

            $parameter = array(
                array('name' => ':property', 'value' => $p['id'], 'type' => 'int')
            );

            $this->db->bind($parameter);

            array_push($propertiesArray, array('name' => $this->db->run('one')->system_name, 'class' => $p['class'], 'class_field' => $p['class_field']));

        }

        return $propertiesArray;

    }

    //Section is used in require (do not remove)
    private function displayProperty($property, $data, $section, $classRow, $packageData, $formData) {

        echo '<div class="'.$classRow.'row">';

        foreach ($property as $p) {

            if ($p['name'] == 'package') {

                if(($packageData['transaction'] and isset($this->session['transaction_package'])) and in_array($packageData['transaction'], $this->session['transaction_package'])) {

                    echo $this->addition->message($this->makeTranslationSystem('transaction_package_done'));

                    continue;
                }

            }

            $path = 'content/object/field/'.$p['name'].'.php';

            if($this->addition->fileExists($path)) {

                if(isset($data[$p['name']])) {

                    $dataDisplay = $data[$p['name']];

                    if($p['name'] == 'section' or $p['name'] == 'link')
                        $dataDisplay .= '|'.$data[$p['name'].'_name'];

                    if($p['name'] == 'form')
                        $dataDisplay .= '|'.$data['attachment'];

                    //id of current object (can be used in field file, e.g. in translation)
                    $dataId = $data['id'];

                    if ($this->checkDataDisplay($dataDisplay) and isset($dataId)) {

                        $class = $classField = '';
                        if($p['class'] != '')
                            $class = ' class="' . $p['class'] . '"';

                        if($p['class_field'] != '')
                            $classField = ' class="' . $p['class_field'] . '"';

                        echo '<div'.$class.'>';

                            require $path;

                        echo '</div>';

                    }

                }

            }

        }

        echo '</div>';

    }

    //Do not remove! Check data in field files
    private function checkDataDisplay($dataDisplay, $type = false) {

        $check = false;
        if(isset($dataDisplay) and $dataDisplay and $dataDisplay != '') {

            if($type) {

                if ($type == 'string') {

                    if (is_string($dataDisplay))
                        $check = true;

                }

                if ($type == 'array') {

                    if (is_array($dataDisplay) and count($dataDisplay) > 0)
                        $check = true;

                }

                if ($type == 'package') {

                    if (is_string($dataDisplay)) {

                        $this->addition->jsonArray($dataDisplay);

                        if (json_last_error() === JSON_ERROR_NONE)
                            $check = true;

                    }

                }

            }else{

                $check = true;

            }

        }

        return $check;

    }

    private function getTypeClass($type) {

        $sql = 'select class from im_type where type_id = :type';

        $this->db->prepare($sql);

        $parameter = array(
            array('name' => ':type', 'value' => $type, 'type' => 'int')
        );

        $this->db->bind($parameter);

        return $this->db->run('one');

    }

    private function getObjectClass($object) {

        $sql = 'select class from im_object where object_id = :object';

        $this->db->prepare($sql);

        $parameter = array(
            array('name' => ':object', 'value' => $object, 'type' => 'int')
        );

        $this->db->bind($parameter);

        return $this->db->run('one');

    }

    private function getObjectGallery($objectId) {

        $sql = 'select i.image_id as id, i.name as name, i.content as content, i.url as url, i.section as section, i.link as link, i.language as language, i.status_description as description
                from im_image i
                join im_object_gallery og on (og.gallery_id = i.image_id)
                where og.object_id = :object
                and i.status like "on"';

        if(!isset($this->session['id']))
            $sql .= ' and i.status_protected like "off"';

        $sql .= ' order by og.position';

        $this->db->prepare($sql);

        $parameter = array(
            array('name' => ':object', 'value' => $objectId, 'type' => 'int')
        );

        $this->db->bind($parameter);

        return $this->db->run('all');

    }

    private function getObjectImage($objectId) {

        $sql = 'select i.image_id as id, i.name as name, i.content as content, i.url as url, i.section as section, i.link as link, i.language as language, i.status_description as description
                from im_image i
                join im_object_image oi on (oi.image_id = i.image_id)
                where oi.object_id = :object
                and i.status like "on"';

        if(!isset($this->session['id']))
            $sql .= ' and i.status_protected like "off"';

        $sql .= ' order by oi.position';

        $this->db->prepare($sql);

        $parameter = array(
            array('name' => ':object', 'value' => $objectId, 'type' => 'int')
        );

        $this->db->bind($parameter);

        return $this->db->run('all');

    }

    private function getObjectFile($objectId) {

        $sql = 'select f.file_id as id, f.name as name, f.content as content, f.url as url, f.language as language
                from im_file f
                join im_object_file obf on (obf.file_id = f.file_id)
                where obf.object_id = :object
                and f.status like "on"';

        if(!isset($this->session['id']))
            $sql .= ' and f.status_protected like "off"';

        $sql .= ' order by obf.position';

        $this->db->prepare($sql);

        $parameter = array(
            array('name' => ':object', 'value' => $objectId, 'type' => 'int')
        );

        $this->db->bind($parameter);

        return $this->db->run('all');

    }

    private function getObjectSource($objectId) {

        $sql = 'select s.source_id as id, s.name as name, s.content as content, s.link as url, s.language as language
                from im_source s
                join im_object_source obs on (obs.source_id = s.source_id)
                where obs.object_id = :object
                and s.status like "on"';

        if(!isset($this->session['id']))
            $sql .= ' and s.status_protected like "off"';

        $sql .= ' order by obs.position';

        $this->db->prepare($sql);

        $parameter = array(
            array('name' => ':object', 'value' => $objectId, 'type' => 'int')
        );

        $this->db->bind($parameter);

        return $this->db->run('all');

    }

    private function getObjectMovie($objectId) {

        $sql = 'select m.movie_id as id, m.name as name, m.content as content, m.url as url, m.status_loop as status_loop, m.status_controls as status_controls, m.status_autoplay as status_autoplay, m.language as language
                from im_movie m
                join im_object_movie obm on (obm.movie_id = m.movie_id)
                where obm.object_id = :object
                and m.status like "on"';

        if(!isset($this->session['id']))
            $sql .= ' and m.status_protected like "off"';

        $sql .= ' order by obm.position';

        $this->db->prepare($sql);

        $parameter = array(
            array('name' => ':object', 'value' => $objectId, 'type' => 'int')
        );

        $this->db->bind($parameter);

        return $this->db->run('all');

    }

    private function getSection($parent, $submenu, $type = 'parent') {

        $sql = 'select section_id as id, parent, name, name_second, name_url, icon, status_link
                from im_section
                where status like "on"';

        if($type == 'parent')
           $sql .= ' and parent = :parent';

        $sql .= ' order by position';

        $this->db->prepare($sql);

        if($type == 'parent') {

            $parentData = 0;
            if ($parent)
                $parentData = $parent;

            $parameter = array(
                array('name' => ':parent', 'value' => $parentData, 'type' => 'int')
            );

            $this->db->bind($parameter);

        }

        $sectionData = $this->db->run('all');

        $sectionDataArray = array();
        if($sectionData) {

            foreach ($sectionData as $i => $sd) {

                $sectionDataArray[$i] = array('id' => $sd['id'], 'parent' => $sd['parent'], 'name' => $sd['name'], 'name_second' => $sd['name_second'], 'icon' => $sd['icon'], 'url' => $sd['name_url'], 'status_link' => $sd['status_link']);

                if($submenu) {

                    $parameter = array(
                        array('name' => ':parent', 'value' => $sd['id'], 'type' => 'int')
                    );

                    $this->db->bind($parameter);

                    $sectionDataSubmenu = $this->db->run('all');

                    if($sectionDataSubmenu) {

                        $sectionDataSubmenuArray = array();

                        foreach ($sectionDataSubmenu as $j => $sds) {

                            $sectionDataSubmenuArray[$j] = array('id' => $sds['id'], 'name' => $sds['name'], 'name_second' => $sds['name_second'], 'icon' => $sds['icon'], 'url' => $sds['name_url'], 'status_link' => $sds['status_link']);

                        }

                        $sectionDataArray[$i]['submenu'] = $sectionDataSubmenuArray;

                    }else $sectionDataArray[$i]['submenu'] = false;

                }

            }

            return $sectionDataArray;

        }else return false;

    }

    //Build tree from all sections (children, parent)
    private function getSectionTree($sectionAll, $parent = 0) {

        $branch = array();
        foreach ($sectionAll as $sectionOne) {

            if ($sectionOne['parent'] == $parent) {

                $children = $this->getSectionTree($sectionAll, $sectionOne['id']);

                if ($children)
                    $sectionOne['children'] = $children;

                $branch[$sectionOne['id']] = $sectionOne;
            }

        }

        return $branch;

    }

    //Display tree from sections build in getSectionTree
    private function displaySectionTree($sectionTree) {

        $display = '<ul>';
        foreach ($sectionTree as $sectionBranch) {

            $active = '';
            if($sectionBranch['url'] === $this->currentSection)
                $active = ' class="font-weight-bold"';

            $display .= '<li><a href="'.$this->translationMark('im_section-name_url-'.$sectionBranch['id'], $sectionBranch['url']).'" title="'.$this->translationMark('im_section-name-'.$sectionBranch['id'], $sectionBranch['name']).'"'.$active.'>'.$this->translationMark('im_section-name-'.$sectionBranch['id'], $sectionBranch['name']).'</a>';

            if (isset($sectionBranch['children']))
                $display .= $this->displaySectionTree($sectionBranch['children']);

            $display .= '</li>';

        }
        $display .= '</ul>';

        return $display;

    }

    private function getSectionUrl($id) {

        $sql = 'select name_url
                from im_section
                where section_id = :id';

        $this->db->prepare($sql);

        $parameter = array(
            array('name' => ':id', 'value' => $id, 'type' => 'int')
        );

        $this->db->bind($parameter);

        $sectionUrl = $this->db->run('one');

        if($sectionUrl) {

            return $sectionUrl->name_url;

        }else return false;

    }
    private function getSectionId($url) {

        $sql = 'select section_id as id
                from im_section
                where name_url like :url';

        $this->db->prepare($sql);

        $parameter = array(
            array('name' => ':url', 'value' => $url, 'type' => 'string')
        );

        $this->db->bind($parameter);

        $sectionId = $this->db->run('one');

        if($sectionId) {

            return $sectionId->id;

        }else return false;

    }

    private function getCategoryLabel($label) {

        $sql = 'select c.category_id as id, c.name as name
                from im_category c
                join im_label l on (l.label_id = c.label_id)
                where l.system_name = :label
                and c.status like "on"
                order by c.position
                ';

        $this->db->prepare($sql);

        $parameter = array(
            array('name' => ':label', 'value' => $label, 'type' => 'string')
        );

        $this->db->bind($parameter);

        return $this->db->run('all');

    }

    private function getCategoryObject($object) {

        $sql = 'select category_id as id
                from im_object_category
                where object_id = :object';

        $this->db->prepare($sql);

        $parameter = array(
            array('name' => ':object', 'value' => $object, 'type' => 'int')
        );

        $this->db->bind($parameter);

        $category = $this->db->run('all');

        if($category) {

            $categoryArray = array();
            foreach ($category as $c) {

                array_push($categoryArray, $c['id']);

            }

            return implode(' ', $categoryArray).' ';

        }else return '';

    }

    private function getClassLabel($section) {

        $sql = 'select label_id as id
                from im_label
                where system_name = :label';

        $this->db->prepare($sql);

        $parameter = array(
            array('name' => ':label', 'value' => $this->label, 'type' => 'string')
        );

        $this->db->bind($parameter);

        $labelOne = $this->db->run('one');

        $sql = 'select class, class_row, class_row_second
                from im_label_section
                where label_id = :label
                and section = :section';

        $this->db->prepare($sql);

        $parameter = array(
            array('name' => ':label', 'value' => $labelOne->id, 'type' => 'int'),
            array('name' => ':section', 'value' => $section, 'type' => 'int')
        );

        $this->db->bind($parameter);

        $classLabel = $this->db->run('one');

        if($classLabel) {

            return $classLabel;

        }else{

            $parameter = array(
                array('name' => ':label', 'value' => $labelOne->id, 'type' => 'int'),
                array('name' => ':section', 'value' => 0, 'type' => 'int'),
            );

            $this->db->bind($parameter);

            $classLabelAll = $this->db->run('one');

            if($classLabelAll) {

                return $classLabelAll;

            }else return false;

        }

    }

    private function displayStyleLabel()
    {

        $sql = 'select style
                from im_label
                where system_name = :label';

        $this->db->prepare($sql);

        $parameter = array(
            array('name' => ':label', 'value' => $this->label, 'type' => 'string')
        );

        $this->db->bind($parameter);

        $labelProperty = $this->db->run('one');

        if($labelProperty->style != '') {

            echo '<style>';

                echo '.'.$this->label.' .object {';

                    echo $labelProperty->style;

                echo '}';

            echo '</style>';

        }

    }

    private function checkDisplayOption($option = false, $type = '') {

        if($option and is_string($option) and $option != '' and $type != '') {

            if(stristr($option, ',')) {

                $optionArray = explode(',', $option);

            }else $optionArray = array($option);

            if(count($optionArray) > 0) {

                $findOption = false;
                foreach ($optionArray as $oa) {

                    if(stristr($oa, $type)) {

                        if(stristr($oa, ':')) {

                            $oaArray = explode(':', $oa);

                            $findOption = $oaArray[1];

                        }else $findOption = true;

                        break;

                    }

                }

                return $findOption;

            }else return false;

        }else return false;

    }

    private function setBreadcrumb($currentSectionId) {

        $breadcrumbArray = array();

        $sql = 'select name, name_url, parent
            from im_section
            where section_id = :section';

        do {

            $this->db->prepare($sql);

            $parameter = array(
                array('name' => ':section', 'value' => $currentSectionId, 'type' => 'int')
            );

            $this->db->bind($parameter);

            $currentSectionBreadcrumb = $this->db->run('one');

            array_push($breadcrumbArray, array('id' => $currentSectionId, 'url' => $currentSectionBreadcrumb->name_url, 'name' => $currentSectionBreadcrumb->name));

            $currentSectionId = $currentSectionBreadcrumb->parent;

        }while($currentSectionBreadcrumb->parent > 0);

        $sql = 'select section_id as id, name, name_url
            from im_section
            where position = :position and parent = :parent';

        $this->db->prepare($sql);

        $parameter = array(
            array('name' => ':position', 'value' => 1, 'type' => 'int'),
            array('name' => ':parent', 'value' => 0, 'type' => 'int')
        );

        $this->db->bind($parameter);

        $startSection = $this->db->run('one');

        array_push($breadcrumbArray, array('id' => $startSection->id, 'url' => $startSection->name_url, 'name' => $startSection->name));

        $returnBreadcrumb = '';
        if(count($breadcrumbArray) > 1)
            $returnBreadcrumb = array_reverse($breadcrumbArray);

        return $returnBreadcrumb;

    }

    private function getToolUrl($toolUrlRest) {

        return $this->path.'!cms/'.$toolUrlRest;

    }

    //Build section's name to menu
    private function getSectionName($sectionData) {

        $sectionName = $sectionData['name'];
        if($sectionData['name_second'] != '')
            $sectionName .= '<p>'.$sectionData['name_second'].'</p>';

        return $sectionName;

    }

    public function getAllLabel() {

        $sql = 'select system_name
                from im_label';

        $this->db->prepare($sql);

        $label = $this->db->run('all');

        $labelArray = array();
        if($label) {

            foreach ($label as $l) {

                $labelArray[$l['system_name']] = $l['system_name'];

            }

        }
        return $labelArray;

    }

    public function display($section = false, $label = false, $option = false) {

        if($label) {

            //Grab all "post" variables (it can use in fields, e.g. package)
            $addition = $this->addition;
            require 'php/script/post.php';

            $this->label = $label;

            $parameter = array(
                array('name' => ':free', 'value' => 'on', 'type' => 'string'),
                array('name' => ':label', 'value' => $label, 'type' => 'string')
            );

            $objectRecordFree = $this->getObject($parameter);

            $parameter[0]['value'] = 'off';
            array_push($parameter, array('name' => ':section', 'value' => $section, 'type' => 'int'));

            $objectRecordSection = $this->getObject($parameter);

            //Join array of objects free and hook to section (first free)
            $objectRecord = array();
            if($objectRecordFree) {

                foreach ($objectRecordFree as $orf)
                    array_push($objectRecord, $orf);

            }
            if($objectRecordSection) {

                foreach ($objectRecordSection as $ors)
                    array_push($objectRecord, $ors);

            }

            $runPackage = false;
            if($p_id) {

                foreach ($objectRecord as $or) {

                    if($or['id'] == $p_id) {

                        $objectRecord = array($or);
                        $runPackage = true;
                        break;

                    }

                }

            }
            if(count($objectRecord) > 0) {

                $classLabelDisplay = $classLabelRowDisplay = $classLabelRowSecondDisplay = '';

                $classLabel = $this->getClassLabel($section);

                if($classLabel) {

                    if($classLabel->class != '')
                        $classLabelDisplay = $classLabel->class.' ';

                    if($classLabel->class_row != '')
                        $classLabelRowDisplay = $classLabel->class_row.' ';

                    if($classLabel->class_row_second != '')
                        $classLabelRowSecondDisplay = $classLabel->class_row_second.' ';

                    if(stristr($classLabel->class, 'col') and $this->checkDisplayOption($option, 'begin')) {

                        echo '<div class="row">';

                        $this->row = true;

                    }

                }

                $pagination = false;
                $number = '';
                if($this->checkDisplayOption($option, 'pagination')) {

                    $number = $this->checkDisplayOption($option, 'pagination');

                    $pagination = true;

                }

                if($this->checkDisplayOption($option, 'scroll'))
                    echo '<a class="scroll"></a>';

                echo '<div class="'.$classLabelDisplay.'objects '.$label.'">';

                    echo '<div class="'.$classLabelRowDisplay.'row">';

                        $this->displayCategory();

                        if($pagination) {

                            echo '<div class="col-12 pagination-arrow" id="'.$label.':'.$number.'">';

                                echo $this->icon['arrow']['light-left'];

                                echo $this->icon['arrow']['light-right'];

                            echo '</div>';

                        }

                        $this->objectCounterLabel = 0;
                        foreach ($objectRecord as $i => $or) {

                            if ($or['status_protected'] == 'off' or ($or['status_protected'] == 'on' and in_array($or['id'], $this->allowObject))) {

                                $classType = $this->getTypeClass($or['type'])->class;
                                $classObject = $this->getObjectClass($or['id'])->class;
                                $class = 'object';
                                if ($classType != '')
                                    $class .= ' ' . $classType;
                                if ($classObject != '')
                                    $class .= ' ' . $classObject;
                                if ($this->admin)
                                    $class .= ' im-preview';
                                if ($runPackage) {

                                    $class = $this->addition->cleanText($class, 'col-');

                                    $class .= ' col-12';

                                }

                                echo '<div class="' . $this->getCategoryObject($or['id']) . $class . '">';
                                if ($this->admin) {

                                    //Many different methods to get from object to cms section

                                    echo '<div class="edit-tool">';

                                    //edit object when login like admin. In edit status you can change rest property
                                    echo '<a href="' . $this->getToolUrl('object,' . $or['type'] . ',edit,' . $or['id']) . '">' . $this->icon['tool']['edit'] . '</a>';

                                    echo '</div>';

                                }
                                $property = $this->getPropertyFromType($or['type']);
                                $displayPropertyData = $or;

                                foreach ($property as $p) {

                                    if ($p['name'] == 'image') {

                                        $displayPropertyData['image'] = $this->getObjectImage($or['id']);

                                    }
                                    if ($p['name'] == 'gallery') {

                                        $displayPropertyData['gallery'] = $this->getObjectGallery($or['id']);

                                    }
                                    if ($p['name'] == 'file') {

                                        $displayPropertyData['file'] = $this->getObjectFile($or['id']);

                                    }
                                    if ($p['name'] == 'source') {

                                        $displayPropertyData['source'] = $this->getObjectSource($or['id']);

                                    }
                                    if ($p['name'] == 'movie') {

                                        $displayPropertyData['movie'] = $this->getObjectMovie($or['id']);

                                    }
                                    if ($p['name'] == 'language') {

                                        $displayPropertyData['language'] = $this->getLanguage($or['id']);

                                    }
                                    if ($p['name'] == 'breadcrumb') {

                                        $displayPropertyData['breadcrumb'] = $this->setBreadcrumb($section);

                                    }
                                    if ($p['name'] == 'form-auth') {

                                        $displayPropertyData['form-auth'] = $or['name'];

                                    }
                                    if ($p['name'] == 'form-register') {

                                        $displayPropertyData['form-register'] = $or['name'];

                                    }

                                    if ($p['name'] == 'menu') {

                                        $sectionParent = $submenu = false;
                                        if ($this->checkDisplayOption($option, 'parent'))
                                            $sectionParent = $section;

                                        if ($this->checkDisplayOption($option, 'submenu'))
                                            $submenu = true;

                                        $displayPropertyData['menu']['name'] = $or['name'];

                                        $displayPropertyData['menu']['data'] = $this->getSection($sectionParent, $submenu);

                                    }
                                    if ($p['name'] == 'section') {

                                        if (is_numeric($or['section']) and $or['section'] > 0) {

                                            $displayPropertyData['section'] = $this->getSectionUrl($or['section']);

                                        } else $displayPropertyData['section'] = false;

                                    }

                                }

                                $this->displayProperty($property, $displayPropertyData, $section, $classLabelRowSecondDisplay, array('name' => $p_package, 'transaction' => $p_transaction_package, 'parameter' => $p_string, 'spec' => $or['spec']), $formData);

                                echo '</div>';

                                $this->objectCounterLabel++;

                                $this->objectCounter++;

                            }

                            if($or['status_protected'] == 'on' and !in_array($or['id'], $this->allowObject))
                                echo '<div class="col-12 text-danger">'.$this->icon['warning']['triangle'].' '.$this->makeTranslationSystem('data-protected').'</div>';

                        }

                        echo '<div class="im-hide col-12 no-data">'.$this->icon['warning']['triangle'].' '.$this->makeTranslationSystem('no-data').'</div>';

                    echo '</div>';

                echo '</div>';

                $this->displayStyleLabel();

                if($this->checkDisplayOption($option, 'end') and $this->row) {

                    echo '</div>';

                    $this->row = false;

                }

            }

        }

    }

    public function displayCategory() {

        if($this->label) {

            $category = $this->getCategoryLabel($this->label);

            if($category) {

                echo '<div class="col-12">';

                    echo '<div class="form-group">';

                        if($this->makeTranslationSystem($this->label) != '')
                            echo '<label>'.$this->makeTranslationSystem($this->label).'</label>';

                        echo '<select class="select object-category" id="'.$this->label.'">';

                            echo '<option value="0">'.$this->makeTranslationSystem('show-all').'</option>';

                            foreach ($category as $c) {

                                echo '<option value="'.$c['id'].'">' . $c['name'] . '</option>';

                            }

                        echo '</select>';

                    echo '</div>';

                echo '</div>';

            }

        }

    }

    public function displayStatic($sectionId) {

        if(is_dir($this->systemName.'/static')) {

            $files = scandir($this->systemName.'/static');

            $fileStatic = false;
            if(count($files) > 2) {

                $sectionName = $this->getSectionUrl($sectionId);

                foreach ($files as $f) {

                    if ($f == '.' or $f == '..')
                        continue;

                    if(stristr($f, $sectionName)) {

                        $fileStatic = $this->systemName.'/static/'.$f;

                        break;

                    }

                }

            }

            if($fileStatic) {

                if(stristr($fileStatic, '.php')) {

                    require_once $fileStatic;

                }else{

                    echo file_get_contents($fileStatic);

                }

            }

        }

    }

    public function auth() {

        if(isset($this->session['id'])) {

            echo '<div id="auth-top">';
                echo '<form method="post" class="logout">';
                echo '<input type="hidden" name="event" value="logout"> ';
                echo '<input type="hidden" name="transaction" value="' . $this->addition->transaction() . '">';
                echo '</form>';
                echo '<button class="btn btn-secondary">' . $this->session['email'] . '</button>';
                echo '<button class="btn btn-danger submit" id="logout">'.$this->makeTranslationSystem('logout').'</button>';
            echo '</div>';

        }

    }

}