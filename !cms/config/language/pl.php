<?php
//singular, plural, imperatives, long
$translation = array(
    'authorization' => array('singular' => 'Autoryzacja', 'imperatives' => 'Autoryzuj', 'error' => 'Formularz zawiera błędy', 'fail' => 'Podany adres e-mail lub hasło są niepoprawne'),
    'login' => array('singular' => 'Logowanie', 'imperatives' => 'Zaloguj', 'end' => 'Wyloguj', 'logged' => 'Zalogowany'),
    'email' => array('singular' => 'E-mail', 'imperatives' => 'Podaj adres e-mail', 'long' => 'Adres e-mail'),
    'password' => array('singular' => 'Hasło', 'imperatives' => 'Wprowadź hasło'),
    'system' => array('current' => 'Bieżący system'),
    'modal' => array('title' => 'Informacja', 'not-save' => 'Ta operacja spowoduje utratę niezapisanych danych'),
    'button' => array('save' => 'Zapisz', 'cancel' => 'Anuluj', 'edit' => 'Edytuj'),
    'message' => array('no-data' => 'Brak danych'),
    'menu' => array(
        'dashboard' => 'Pulpit',
        'object' => 'Obiekty',
        'section' => 'Sekcje',
        'definition' => 'Definicje',
        'type' => 'Typy obiektów',
        'category' => 'Kategorie obiektów',
        'property' => 'Właściwości'
    ),
    'table' => array('event' => 'Działania'),
    'edit' => array(
        'name' => 'Podaj nazwę',
        'class' => 'Podaj klasę Bootstrap (zaawansowane)',
        'description' => 'Opis techniczny nie jest wymagany (widoczny tylko dla administratora)'
    )
);
$tableDefinition = array(
    'im_object' => array(
        'name' => 'Nazwa',
        'content' => 'Opis',
        'description' => 'Opis techniczny',
        'date_create' => 'Utworzony',
        'date_modify' => 'Zmodyfikowany',
        'status' => 'Status'
    ),
    'im_property' => array(
        'name' => 'Nazwa',
        'system_name' => 'Nazwa systemowa',
        'description' => 'Opis techniczny',
        'class' => 'Klasa Bootstrap - otoczenie',
        'class_field' => 'Klasa Bootstrap - pole',
        'date_create' => 'Utworzony',
        'date_modify' => 'Zmodyfikowany'
    ),
    'im_type' => array(
        'name' => 'Nazwa',
        'class' => 'Klasa Bootstrap',
        'description' => 'Opis techniczny',
        'date_create' => 'Utworzony',
        'date_modify' => 'Zmodyfikowany'
    )
);
$editDefinition = array(
    'im_type' => array(
        'name' => array('name' => 'Nazwa', 'type' => 'text'),
        'class' => array('name' => 'Klasa Bootstrap', 'type' => 'text'),
        'description' => array('name' => 'Opis techniczny', 'type' => 'textarea')
    )
);