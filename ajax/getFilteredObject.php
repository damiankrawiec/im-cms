<?php

require_once '../php/script/post.php';

if($p_systemName and $p_section and $p_label and isset($p_category)) {

    //It is the same, but...
    if($p_category == 0)
        $p_category = false;

    require_once '../'.$p_systemName.'/setting.php';

    require_once '../php/class/database.class.php';

    $db = new Database();

    //init require element on the content in section (object)
    require_once '../content/object/object.class.php';

    $objectContent = new ObjectContent($p_systemName, $db);

    $objectContent->setPath('../');

    //Init gallery effect after the end of ajax data
    echo '<script>
        $(function(){
            $(\'a[data-rel^=lightcase]\').lightcase();
        })
    </script>';

    exit($objectContent->display($p_section, $p_label, $p_category));

}