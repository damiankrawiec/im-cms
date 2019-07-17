<?php

class ObjectContent extends Language {

    private $label;

    private $objectCounter;

    private $path;

    protected $systemName;

    public function __construct($systemName, $db, $languageCurrent) {

        parent::__construct($db, $languageCurrent);

        $this->systemName = $systemName;

        $this->label = 'label';

        $this->objectCounter = 0;

        $this->path = '';

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
        $sql = 'select o.object_id as id, o.name as name, o.date as date, o.type_id as type, o.content as text, o.link as link';

        //Field from joining tables
//        if($isParameter) {
//
//
//
//        }

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

        $sql .= ' order by so.position';

        $this->db->prepare($sql);

        if($isParameter)
            $this->db->bind($parameter);

        return $this->db->run('all');

    }

    private function getPropertyFromType($type) {

        $sql = 'select property_id as id, class, class_field from im_type_property where type_id = :type order by position';

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

    private function displayProperty($property, $data) {

        echo '<div class="row">';

        foreach ($property as $p) {

            $path = $this->path.'content/object/field/'.$p['name'].'.php';

            if(is_file($path)) {

                $data = $this->makeTranslation($data);

                if(isset($data[$p['name']])) {

                    $dataDisplay = $data[$p['name']];

                    if (isset($dataDisplay)) {

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
    private function checkDataDisplay($dataDisplay, $type) {

        $check = false;
        if(isset($dataDisplay) and $dataDisplay and $dataDisplay != '') {

            if($type == 'string')
                $check = true;

            if($type == 'array') {

                if(is_array($dataDisplay) and count($dataDisplay) > 0)
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

        $sql = 'select i.image_id as id, i.name as name, i.content as content, i.url as url, i.link as link
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

    private function getMenu() {

        $sql = 'select section_id as id, name, url
                from im_section
                where status like "on"
                order by position';

        $this->db->prepare($sql);

        return $this->db->run('all');

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

    public function setPath($addPath = false) {

        if($addPath) {

            $this->path = $addPath.$this->path;

        }
    }

    public function display($section = false, $label = false) {

        if($section and $label) {

            $parameter = array(
                array('name' => ':section', 'value' => $section, 'type' => 'int'),
                array('name' => ':label', 'value' => $label, 'type' => 'string')
            );

            $objectRecord = $this->getObject($parameter);

            if($objectRecord) {

                echo '<div class="' . $label . '">';

                echo '<div class="row">';

                foreach ($objectRecord as $or) {

                    $classAdd = $this->getTypeClass($or['type'])->class;

                    $class = 'object';
                    if ($classAdd != '')
                        $class .= ' ' . $classAdd;

                    echo '<div class="'.$this->getCategoryObject($or['id']).'' . $class . '">';

                    $property = $this->getPropertyFromType($or['type']);

                    $displayPropertyData = $or;

                    foreach ($property as $p) {

                        if ($p['name'] == 'image') {

                            $displayPropertyData['image'] = $this->getObjectImage($or['id']);

                        }
                        if ($p['name'] == 'file') {

                            $displayPropertyData['file'] = $this->getObjectFile($or['id']);

                        }
                        if ($p['name'] == 'section') {

                            $displayPropertyData['section'] = $this->getMenu();

                        }

                    }

                    $this->label = $label;

                    $this->displayProperty($property, $displayPropertyData);

                    echo '</div>';

                    $this->objectCounter++;

                }

                echo '<div class="im-hide col-12 no-data"><i class="fal fa-exclamation-triangle"></i> '.$this->translationSystem['no-data'].'</div>';

                echo '</div>';

                echo '</div>';

            }

        }

    }

    public function displayCategory($label = false) {

        if($label) {

            $category = $this->getCategoryLabel($label);

            if($category) {

                echo '<div class="row">';

                    echo '<div class="col-12">';

                        echo '<div class="form-group">';

                        echo '<select class="form-control object-category" id="'.$label.'">';

                            echo '<option value="0">'.$this->translationSystem['show-all'].'</option>';

                            foreach ($category as $c) {

                                echo '<option value="'.$c['id'].'">' . $c['name'] . '</option>';

                            }

                        echo '</select>';

                        echo '</div>';

                    echo '</div>';

                echo '</div>';

            }

        }

    }

}