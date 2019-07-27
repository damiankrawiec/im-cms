<?php

require_once 'php/class/session.class.php';

require_once 'php/class/tool.class.php';

require_once 'php/class/addition.class.php';

$addition = new Addition();

if($tool = new Tool()) {

    $sectionPath = '../';
    $sectionPathAdmin = '';
    require_once 'php/init.php';

    //echo '<img src="layout/graphic/admin/'.$_SESSION[''].'">';

echo 'ok';


}else{

    $addition->link('auth');

}