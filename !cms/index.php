<?php

require_once 'php/script/post.php';

require_once 'php/class/session.class.php';

require_once 'php/class/tool.class.php';

require_once 'php/class/addition.class.php';

$addition = new Addition();

$tool = new Tool();

if($tool->getCheckAuth()) {

    require_once 'php/script/get.php';

    require_once 'php/script/logout.php';

    require_once 'php/class/system.class.php';

    $system = new System($g_system);

    if(!$g_system) {

        $addition->link($system->getSystemName());

    }else{

        require_once 'content/index.php';

    }

}else{

    $addition->link('auth');

}