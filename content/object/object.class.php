<?php

class ObjectContent extends systemSetting
{

    private $db;

    public function __construct($db) {

        $this->db = $db;

    }

    public function getObject($parameter = false) {

        $sql = 'select o.name, o.date_create as date
                from im_object o
                join im_section_object so on so.object_id = o.object_id
                where so.section_id = :id';

        $this->db->prepare($sql);

        if($parameter)
            $this->db->bind($parameter);

        $record = $this->db->run('all');

        var_dump($record);

    }

}