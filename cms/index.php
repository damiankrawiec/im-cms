<?php

require_once 'php/script/post.php';

require_once 'php/class/session.class.php';

require_once 'php/class/tool.class.php';

require_once 'php/class/addition.class.php';

$addition = new Addition();

$tool = new Tool();

if($tool->getCheckAuth()) {

    require_once 'php/script/get.php';

    if($g_section == 'logout') {

        $tool->logout();

        $addition->link('auth');

    }

    if(!$g_system) {

        require_once 'php/class/system.class.php';

        $system = new System();

        $addition->link($system->getSystemName());

    }else{

        require_once '../system/'.$g_system.'/setting.php';

        require_once '../php/class/database.class.php';

        $db = new Database();



        $sectionPath = '../';
        $sectionPathAdmin = '';
        require_once 'php/init.php';

        echo $tool->getSession('admin')['email'];
        echo '<img src="layout/graphic/admin/'.$tool->getSession('admin')['image'].'">';
        echo '<a href="'.$g_system.',logout">Wyloguj</a>';

    }

}else{

    $addition->link('auth');

}