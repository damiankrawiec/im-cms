<?php

require_once 'php/script/post.php';

require_once 'php/class/security.class.php';

require_once 'php/class/session.class.php';

require_once 'php/class/tool.class.php';

require_once 'php/class/addition.class.php';

$addition = new Addition();

$tool = new Tool();

if($tool->getCheckAuth() and $tool->getCheckAuth() === $tool->getAuthToken()) {

    //In addition class use get to built url
    require 'php/script/get.php';

    require_once 'php/script/logout.php';

    require_once 'php/class/system.class.php';

    $system = new System($g_system);

    if($g_system === '' or $g_system !== $system->getSystemName()) {

        $addition->link($system->getSystemName());

    }else{

        //Set current url
        $addition->setUrl();

        require_once 'content/index.php';

    }

}else{

    $addition->link('auth');

}