<?php

//class language is parent to every element in section content
require_once 'php/class/icon.class.php';

//class language is parent to every element in section content
require_once 'php/class/language.class.php';

class ObjectContent extends Language {

    private $label;

    private $objectCounter;

    private $path;

    private $row;//check if starting object has class and class is "col"

    private $admin;

    private $setting = false;

    public $mapArray;

    protected $systemName;

    public function __construct($systemName, $db, $languageCurrent, $admin, $setting = false) {

        parent::__construct($db, $languageCurrent);

        $this->systemName = $systemName;

        $this->label = 'label';

        $this->objectCounter = 0;

        $this->path = '';

        $this->row = false;

        $this->admin = $admin;

        $this->mapArray = array();

        if($setting)
            $this->setting = $setting;

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

    private function getObject($parameter = false) {

        $isParameter = false;
        if($parameter and is_array($parameter) and count($parameter) > 0) {

            //Set parameters to flat array
            $parameterArray = $this->getParameterFromArray($parameter);

            $isParameter = true;

        }

        //Name of aliases need to be the same as system_name of property fixed to type of object
        $sql = 'select 
            o.object_id as id, 
            o.name as name, 
            o.date as date, 
            o.type_id as type, 
            o.content as content, 
            o.section as section,
            o.section_name as section_name, 
            o.link as link,
            o.link_name as link_name,
            o.email as email,
            o.form as form,
            o.attachment as attachment, 
            o.icon as icon,
            o.map as map';

        //Field from joining tables
        //if($isParameter) {}

        $sql .= ' from im_object o';

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

        }

        $sql .= $this->whereOrAnd($sql);

        $sql .= ' o.status like "on"';

        $sql .= ' order by o.position';

        $this->db->prepare($sql);

        if($isParameter)
            $this->db->bind($parameter);

        return $this->db->run('all');

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

    private function displayProperty($property, $data, $section) {

        echo '<div class="row">';

        foreach ($property as $p) {

            $path = $this->path.'content/object/field/'.$p['name'].'.php';

            if(is_file($path)) {

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

    //Do not remove! Check data in in field files
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

    private function getObjectImage($objectId) {

        $sql = 'select i.image_id as id, i.name as name, i.content as content, i.url as url, i.section as section
                from im_image i
                join im_object_image oi on (oi.image_id = i.image_id)
                where oi.object_id = :object
                and i.status like "on"
                order by oi.position';

        $this->db->prepare($sql);

        $parameter = array(
            array('name' => ':object', 'value' => $objectId, 'type' => 'int')
        );

        $this->db->bind($parameter);

        return $this->db->run('all');

    }

    private function getObjectFile($objectId) {

        $sql = 'select f.file_id as id, f.name as name, f.content as content, f.url as url
                from im_file f
                join im_object_file obf on (obf.file_id = f.file_id)
                where obf.object_id = :object
                and f.status like "on"
                order by obf.position';

        $this->db->prepare($sql);

        $parameter = array(
            array('name' => ':object', 'value' => $objectId, 'type' => 'int')
        );

        $this->db->bind($parameter);

        return $this->db->run('all');

    }

    private function getObjectSource($objectId) {

        $sql = 'select s.source_id as id, s.name as name, s.content as content, s.link as url
                from im_source s
                join im_object_source obs on (obs.source_id = s.source_id)
                where obs.object_id = :object
                and s.status like "on"
                order by obs.position';

        $this->db->prepare($sql);

        $parameter = array(
            array('name' => ':object', 'value' => $objectId, 'type' => 'int')
        );

        $this->db->bind($parameter);

        return $this->db->run('all');

    }

    private function getObjectMovie($objectId) {

        $sql = 'select m.movie_id as id, m.name as name, m.content as content, m.url as url, m.status_loop as status_loop, m.status_controls as status_controls, m.status_autoplay as status_autoplay
                from im_movie m
                join im_object_movie obm on (obm.movie_id = m.movie_id)
                where obm.object_id = :object
                and m.status like "on"
                order by obm.position';

        $this->db->prepare($sql);

        $parameter = array(
            array('name' => ':object', 'value' => $objectId, 'type' => 'int')
        );

        $this->db->bind($parameter);

        return $this->db->run('all');

    }

    private function getSection($parent, $submenu) {

        $sql = 'select section_id as id, name, name_second, name_url, icon, status_link
                from im_section
                where status like "on"
                and parent = :parent';

        $sql .= ' order by position';

        $this->db->prepare($sql);

        $parentData = 0;
        if($parent)
            $parentData = $parent;

        $parameter = array(
            array('name' => ':parent', 'value' => $parentData, 'type' => 'int')
        );

        $this->db->bind($parameter);

        $sectionData = $this->db->run('all');

        $sectionDataArray = array();
        if($sectionData) {

            foreach ($sectionData as $i => $sd) {

                $sectionDataArray[$i] = array('id' => $sd['id'], 'name' => $sd['name'], 'name_second' => $sd['name_second'], 'icon' => $sd['icon'], 'url' => $sd['name_url'], 'status_link' => $sd['status_link']);

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

        $sql = 'select class, class_row
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

        return '!cms/'.$toolUrlRest;

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

    public function setPath($addPath = false) {

        if($addPath) {

            $this->path = $addPath.$this->path;

        }
    }

    public function display($section = false, $label = false, $option = false) {

        if($section and $label) {

            $this->label = $label;

            $parameter = array(
                array('name' => ':section', 'value' => $section, 'type' => 'int'),
                array('name' => ':label', 'value' => $label, 'type' => 'string')
            );

            $objectRecord = $this->getObject($parameter);

            if($objectRecord) {

                $classLabelDisplay = $classLabelRowDisplay = '';

                $classLabel = $this->getClassLabel($section);

                if($classLabel) {

                    if($classLabel->class != '')
                        $classLabelDisplay = $classLabel->class.' ';

                    if($classLabel->class_row != '')
                        $classLabelRowDisplay = $classLabel->class_row.' ';

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

                        foreach ($objectRecord as $i => $or) {

                            $classAdd = $this->getTypeClass($or['type'])->class;

                            $class = 'object';
                            if ($classAdd != '')
                                $class .= ' ' . $classAdd;

                            if ($this->admin)
                                $class .= ' im-preview';

                            echo '<div class="'.$this->getCategoryObject($or['id']).$class.'">';

                            if($this->admin) {

                                //Many different methods to get from object to cms section

                                echo '<div class="edit-tool">';

                                    //edit object when login like admin. In edit status you can change rest property
                                    echo '<a href="' . $this->getToolUrl('object,'.$or['type'].',edit,'.$or['id'].','.$this->getSectionUrl($section)) . '">' . $this->icon['tool']['edit'] . '</a>';

                                echo '</div>';

                            }

                            $property = $this->getPropertyFromType($or['type']);

                            $displayPropertyData = $or;

                            foreach ($property as $p) {

                                if ($p['name'] == 'image') {

                                    $displayPropertyData['image'] = $this->getObjectImage($or['id']);

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
                                if ($p['name'] == 'menu') {

                                    $sectionParent = $submenu = false;
                                    if($this->checkDisplayOption($option, 'parent'))
                                        $sectionParent = $section;

                                    if($this->checkDisplayOption($option, 'submenu'))
                                        $submenu = true;

                                    $displayPropertyData['menu'] = $this->getSection($sectionParent, $submenu);

                                }
                                if ($p['name'] == 'section') {

                                    if(is_numeric($or['section']) and $or['section'] > 0) {

                                        $displayPropertyData['section'] = $this->getSectionUrl($or['section']);

                                    }else $displayPropertyData['section'] = false;

                                }

                            }

                            $this->displayProperty($property, $displayPropertyData, $section);

                            echo '</div>';

                            $this->objectCounter++;

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

}