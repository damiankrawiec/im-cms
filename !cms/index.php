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

    require_once 'php/class/system.class.php';

    $system = new System();

    if(!$g_system) {

        $addition->link($system->getSystemName());

    }else{

        require_once '../system/'.$system->getSystemName().'/setting.php';

        require_once '../php/class/database.class.php';

        $db = new Database();

        echo 'Bieżący system: '.$system->getSystemName();

        var_dump($db);

        echo '<h1>Zalogowany</h1>';

        $sectionPath = '../';
        $sectionPathAdmin = '';
        require_once 'php/init.php';

        echo $tool->getSession('admin')['email'];
        echo '<img src="layout/graphic/admin/'.$tool->getSession('admin')['image'].'">';
        echo '<a href="'.$g_system.',logout">'.$translation['login']['end'].'</a>';

    }

}else{

    $addition->link('auth');

}