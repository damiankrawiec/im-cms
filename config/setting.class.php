<?php


class Setting
{
    //Bezwzglednie wymagana struktura danego systemu domenowego (gdy nie jest zachowana to nastepuje zatrzymanie aplikacji, brak polaczenia z baza danych)
    protected $systemStructure = array(
        'dir' => array('css', 'js'),//katalog js moze byc pusty
        'file' => array('content.php', 'css/main.css', 'setting.php')//plikow moze byc wiecej, to sa tylko pliki obowiazkowe
    );
}