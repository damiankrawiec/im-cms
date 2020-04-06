<?php

//Setting system is under the system dir
class Setting
{
    //Required structure of files (it might be more dirs and files)
    protected $systemStructure = array(
        'dir' => array('css', 'js'),
        'file' => array('content.php', 'css/main.css', 'setting.php')//Full path
    );
}