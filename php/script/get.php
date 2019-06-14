<?php

//Set all get variables

if(isset($_GET['url'])) {

    $url = $_GET['url'];

}else{

    $sql = 'select url
        from im_section
        where position = :position';

    $db->prepare($sql);

    $parameter = array(
        array('name' => ':position', 'value' => 1, 'type' => 'int')
    );

    $db->bind($parameter);

    $url = $db->run('one')->url;

}