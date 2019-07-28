<?php

require_once 'php/script/get.php';

require_once 'php/script/post.php';

require_once 'php/class/session.class.php';

require_once 'php/class/tool.class.php';

require_once 'php/class/addition.class.php';

$addition = new Addition();

$tool = new Tool();

if($tool->getCheckAuth()) {

    if($g_url == 'logout') {

        $tool->logout();

        $addition->link('auth');

    }

    $sectionPath = '../';
    $sectionPathAdmin = '';
    require_once 'php/init.php';

    echo $tool->getSession('admin')['email'];
    echo '<img src="layout/graphic/admin/'.$tool->getSession('admin')['image'].'">';
    echo '<a href="logout">Wyloguj</a>';

}else{

    $addition->link('auth');

}