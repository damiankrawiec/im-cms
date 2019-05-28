<?php


class Setting extends Language
{

    private $prefix = 'im';

    protected $host = '@localhost';

    protected $port = '3306';

    protected $database = 'im-cms';

    protected $user = 'im-cms';

    protected $password = 'yyt8d7XLy9kF4Cn4';

    //Bezwzglednie wymagana struktura danego systemu domenowego (gdy nie jest zachowana to nastepuje zatrzymanie aplikacji, brak polaczenia z baza danych)
    protected $systemStructure = array(
        'dir' => array('css', 'js'),
        'file' => array('content.php', 'css/main.css')
    );

    //Tabele zdefiniowane w bazie danych
//    protected $table = array(
//        'section' => array('name' => $this->prefix.'_section'),
//        'object' => array('name' => $this->prefix.'_object'),
//        'section_object' => array('name' => $this->prefix.'_section_object')
//    );

}