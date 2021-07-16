<?php

require_once '../php/script/post.php';

if(isset($p_system) and isset($p_string)) {

    require_once '../!cms/php/class/system.class.php';

    $system = new System($p_system, '../');

    //Init setting and $db object
    $pathUp = '';
    require_once '../!cms/php/script/system.php';

    $sql = 'select o.name as name, o.short as short, o.content as content from im_object o
            join im_type t on(t.type_id = o.type_id)
            where o.status like :status
            and o.status_protected like :status_protected
            and t.status_search like :status_search
            order by o.position';

    $db->prepare($sql);

    $parameter = array(
        array('name' => ':status', 'value' => 'on', 'type' => 'string'),
        array('name' => ':status_protected', 'value' => 'off', 'type' => 'string'),
        array('name' => ':status_search', 'value' => 'on', 'type' => 'string')
    );

    $db->bind($parameter);

    $object = $db->run('all');

    $searchArray = array($p_string);
    if (stristr($p_string, ' '))
        $searchArray = explode(' ', $p_string);

    $exit = '';
    if($object) {

        foreach ($object as $i => $o) {

            $findCount = 0;
            foreach ($searchArray as $s) {

                if(stristr($o['name'], $s) or stristr($o['short'], $s) or stristr($o['content'], $s))
                    $findCount++;

            }

            $find = false;
            if($findCount === count($searchArray))
                $find = true;

            if(!$find)
                unset($object[$i]);

        }

        $exit = json_encode($object);

    }

    exit($exit);

}