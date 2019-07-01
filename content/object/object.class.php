<?php

class ObjectContent {

    private $systemName;

    private $db;

    private $label;

    private $objectCounter;

    public function __construct($systemName, $db) {

        $this->systemName = $systemName;

        $this->db = $db;

        $this->label = 'label';

        $this->objectCounter = 0;

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
        $sql = 'select o.object_id as id, o.name as name, o.date as date, o.type_id as type, o.content as text';

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

        $sql = 'select property_id as id, class from im_type_property where type_id = :type order by position';

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

            array_push($propertiesArray, array('name' => $this->db->run('one')->system_name, 'class' => $p['class']));

        }

        return $propertiesArray;

    }

    private function displayProperty($property, $data) {

        echo '<div class="row">';

        foreach ($property as $p) {

            $path = 'content/object/field/'.$p['name'].'.php';

            if(is_file($path)) {

                if(isset($data[$p['name']])) {

                    $dataDisplay = $data[$p['name']];

                    if (isset($dataDisplay)) {

                        $class = '';
                        if($p['class'] != '')
                            $class= ' class="' . $p['class'] . '"';

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

        $sql = 'select i.name as name, i.content as content, i.url as url, i.link as link
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

    private function getCategoryLabel($label) {

        $sql = 'select c.name as name
                from im_category c
                join im_label l on (l.label_id = c.label_id)
                where l.system_name = :label';

        $this->db->prepare($sql);

        $parameter = array(
            array('name' => ':label', 'value' => $label, 'type' => 'string')
        );

        $this->db->bind($parameter);

        return $this->db->run('all');

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

                    echo '<div class="' . $class . '">';

                    $property = $this->getPropertyFromType($or['type']);

                    $displayPropertyData = $or;

                    foreach ($property as $p) {

                        if ($p['name'] == 'image') {

                            $displayPropertyData['image'] = $this->getObjectImage($or['id']);

                            break;

                        }

                    }

                    $this->label = $label;

                    $this->displayProperty($property, $displayPropertyData);

                    echo '</div>';

                    $this->objectCounter++;

                }

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

                echo '<select class="form-control">';

                    echo '<option>Show all</option>';

                    foreach ($category as $c) {

                        echo '<option>' . $c['name'] . '</option>';

                    }

                echo '</select>';

                echo '</div>';

                echo '</div>';

                echo '</div>';

            }

        }

    }

}