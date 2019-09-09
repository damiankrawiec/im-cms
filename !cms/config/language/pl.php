<?php
//singular, plural, imperatives, long
$translation = array(
    'authorization' => array('singular' => 'Autoryzacja', 'imperatives' => 'Autoryzuj', 'error' => 'Formularz zawiera błędy', 'fail' => 'Podany adres e-mail lub hasło są niepoprawne'),
    'login' => array('singular' => 'Logowanie', 'imperatives' => 'Zaloguj', 'end' => 'Wyloguj', 'logged' => 'Zalogowany'),
    'email' => array('singular' => 'E-mail', 'imperatives' => 'Podaj adres e-mail', 'long' => 'Adres e-mail'),
    'password' => array('singular' => 'Hasło', 'imperatives' => 'Wprowadź hasło'),
    'system' => array('current' => 'Bieżący system'),
    'modal' => array(
        'title' => 'Informacja',
        'not-save' => 'Ta operacja spowoduje utratę niezapisanych danych',
        'confirm-delete' => 'Potwierdź usunięcie pozycji'
    ),
    'button' => array('save' => 'Zapisz', 'cancel' => 'Anuluj', 'edit' => 'Edytuj', 'add' => 'Dodaj', 'on' => 'Włącz', 'off' => 'Wyłącz'),
    'message' => array(
        'no-data' => 'Brak danych',
        'relation-exists' => 'Pozycja posiada powiązania z innymi danymi',
        'save-success' => 'Dane zostały zapisane poprawnie',
        'delete-success' => 'Pozycja została usunięta poprawnie'
    ),
    'menu' => array(
        'dashboard' => 'Pulpit',
        'object' => 'Obiekty',
        'section' => 'Sekcje',
        'definition' => 'Definicje',
        'type' => 'Typy obiektów',
        'category' => 'Kategorie obiektów',
        'property' => 'Właściwości'
    ),
    'table' => array('event' => 'Działania', 'sort' => 'tryb sortowania'),
    'edit' => array(
        'name' => 'Pole nazwy (obowiązkowe)',
        'system_name' => 'Pole nazwa systemowa, którą nie będzie można później zmienić (obowiązkowe)',
        'class' => 'Pole zewnętrzne do nadawania właściwości poprzez klasę Bootstrap (nie jest wymagane, zaawansowane)',
        'class_field' => 'Pole wewnętrzne do nadawania właściwości poprzez klasę Bootstrap (nie jest wymagane, zaawansowane)',
        'description' => 'Pole widoczne tylko dla administratora (nie jest wymagane)',
        'link' => 'Pole na odsyłacz zewnętrzny (nie jest wymagane, otwarcie w nowym oknie)',
        'date' => 'Pole data w dowolnym formacie (nie jest wymagane)',
        'content' => 'Pole na treść (nie jest wymagane)'
    ),
    'select' => array('no-set' => 'Wybierz wartość')
);
//Headers of data tables (on the edit the fields may be different)
$tableDefinition = array(
    'im_object' => array(
        'name' => 'Nazwa',
        'content' => 'Opis',
        'description' => 'Opis techniczny',
        'date_create' => 'Utworzony',
        'date_modify' => 'Zmodyfikowany',
        'status' => 'Status'
    ),
    'im_type_property' => array(
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
$tableDefinitionEvent = array(
    'im_type' => array(
        'name' => 'Nazwa',
        'class' => 'Klasa Bootstrap',
        'description' => 'Opis techniczny'
    ),
    'im_type_property' => array(
        'system_name' => 'Nazwa systemowa',
        'class' => 'Klasa Bootstrap - otoczenie',
        'class_field' => 'Klasa Bootstrap - pole'
    ),
    'im_object' => array(
        'name' => 'Nazwa',
        'label' => 'Etykieta',
        'section' => 'Przekierowanie do sekcji',
        'link' => 'Odsyłacz zewnętrzny',
        'date' => 'Data',
        'content' => 'Treść',
        'description' => 'Opis techniczny'
    ),
);