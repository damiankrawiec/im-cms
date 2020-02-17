<?php

require_once 'php/class/security.class.php';

require_once 'php/class/session.class.php';

require_once 'php/class/tool.class.php';

require_once 'php/class/addition.class.php';

$addition = new Addition();

$tool = new Tool();

//Set current url
$addition->setUrl();

if($tool->getCheckAuth() and $tool->getCheckAuth() === $tool->getAuthToken()) {

    //In addition class use get to build url
    require 'php/script/get.php';

    require_once 'php/script/post.php';

    require_once 'php/script/logout.php';

    require_once 'php/class/system.class.php';

    if($p_currentSystem)
        $tool->setSession('system', $p_currentSystem);

    if($tool->getSession('system') == '')
        $tool->setSession('system', 'default');

    //Path is need because many files in structure call system class
    $system = new System($tool->getSession('system'), '../');

    if($tool->getSession('system') == $system->getSystemName()) {

        if($tool->getSession('url')) {

            $currentUrl = $tool->getSession('url');

            $tool->setSession('url', 0);

            $addition->link($currentUrl);

        }

        require_once 'content/index.php';

    }

}else{

    $tool->setSession('url', $addition->getUrl());

    $addition->link('auth');

}