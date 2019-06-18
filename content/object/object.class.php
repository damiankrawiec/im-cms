<?php

class ObjectContent extends systemSetting
{

    private $db;

    public function __construct($db) {

        $this->db = $db;

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

    public function getObject($parameter = false) {

        $isParameter = false;
        if($parameter and is_array($parameter) and count($parameter) > 0) {

            //Set parameters to flat array
            $parameterArray = $this->getParameterFromArray($parameter);

            $isParameter = true;

        }

        $sql = 'select o.name, o.date_create as date, o.type_id as type';

        //Field/column from joining tables
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

        $sql .= ' order by position';

        $this->db->prepare($sql);

        if($isParameter)
            $this->db->bind($parameter);

        return $this->db->run('all');

    }

    public function getPropertyFromType($type) {

        $sql = 'select property_id as id from im_type_property where type_id = :type';

        $this->db->prepare($sql);

        $parameter = array(
            array('name' => ':type', 'value' => $type, 'type' => 'int')
        );

        $this->db->bind($parameter);

        $properties = $this->db->run('all');

        $propertiesArray = array();
        foreach($properties as $p) {

            array_push($propertiesArray, $p['id']);

        }

        $propertiesArray = array_unique($propertiesArray);

        $propertiesString = implode(',', $propertiesArray);

        $sql = 'select system_name from im_property where property_id in(:property)';

        $this->db->prepare($sql);

        $parameter = array(
            array('name' => ':property', 'value' => $propertiesString, 'type' => 'string')
        );

        $this->db->bind($parameter);

        return $this->db->run('all');

    }

    public function displayProperty($property) {

        foreach ($property as $p) {

            $path = 'content/object/field/'.$p['system_name'].'.php';

            if(is_file($path))
                require $path;

        }

    }

    public function getTypeClass($type) {

        $sql = 'select class from im_type where type_id = :type';

        $this->db->prepare($sql);

        $parameter = array(
            array('name' => ':type', 'value' => $type, 'type' => 'int')
        );

        $this->db->bind($parameter);

        return $this->db->run('one');

    }

}