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
    'button' => array(
        'save' => 'Zapisz',
        'cancel' => 'Anuluj',
        'edit' => 'Edytuj',
        'add' => 'Dodaj',
        'on' => 'Włącz',
        'off' => 'Wyłącz',
        'reset-view' => 'Resetuj widok',
        'back' => 'Powrót'
    ),
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
        'definition-object' => 'Definicje obiektowe',
        'type' => 'Typy',
        'category' => 'Kategorie',
        'property' => 'Właściwości typów',
        'language' => 'Język',
        'translation' => 'Tłumaczenia',
        'translation_system' => 'Tłumaczenia systemowe',
        'definition' => 'Definicje',
        'multimedia' => 'Multimedia',
        'image' => 'Obrazy',
        'file' => 'Pliki',
        'movie' => 'Filmy',
        'setting' => 'Ustawienia'
    ),
    'table' => array('event' => 'Działania', 'sort' => 'tryb sortowania'),
    'edit' => array(
        'name' => 'Pole nazwy',
        'system_name' => 'Pole nazwa systemowa',
        'class' => 'Pole zewnętrzne do nadawania właściwości poprzez klasę Bootstrap (nie jest wymagane, zaawansowane)',
        'class_field' => 'Pole wewnętrzne do nadawania właściwości poprzez klasę Bootstrap (nie jest wymagane, zaawansowane)',
        'description' => 'Pole widoczne tylko dla administratora (nie jest wymagane)',
        'link' => 'Pole na odsyłacz zewnętrzny (otwarcie w nowym oknie)',
        'date' => 'Pole data w dowolnym formacie',
        'content' => 'Pole na treść',
        'name_url' => 'Pole url to nazwa w pasku adresu',
        'image' => 'Obecne obrazy',
        'source' => 'Pole na źródło',
        'icon' => 'Pole tekstowe ikony',
        'language_id' => 'Definicja języka'
    ),
    'select' => array('no-set' => 'Wybierz wartość', 'all' => 'Wszystkie wartości'),
    'fix' => array(
        'available' => 'Dostępne wartości',
        'selected' => 'Wybrane wartości',
        'search' => 'Szukaj...',
        'section' => 'Sekcje wyświetlające',
        'image' => 'Obrazy podłączone',
        'file' => 'Pliki podłączone',
        'movie' => 'Filmy podłączone',
        'category' => 'Kategorie występowania'
    ),
    'validation' => array(
        'wrong-file' => 'Plik niepoprawny',
        'delete-file-fail' => 'Nieudane usunięcie bieżącego pliku'
    ),
    'breadcrumb' => array(
        'title' => 'Twoje położenie'
    )
);
//Headers of data tables (on the edit the fields may be different)
$tableDefinition = array(
    'im_object' => array(
        'system_name' => 'Nazwa systemowa',
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
    ),
    'im_section' => array(
        'name' => 'Nazwa',
        'name_url' => 'Nazwa url',
        'icon' => 'Ikona (Fontawesome)',
        'description' => 'Opis techniczny',
        'date_create' => 'Utworzony',
        'date_modify' => 'Zmodyfikowany',
        'status' => 'Status'
    ),
    'im_category' => array(
        'name' => 'Nazwa',
        'content' => 'Opis',
        'description' => 'Opis techniczny',
        'date_create' => 'Utworzony',
        'date_modify' => 'Zmodyfikowany',
        'status' => 'Status'
    ),
    'im_language' => array(
        'name' => 'Nazwa',
        'system_name' => 'Nazwa systemowa',
        'description' => 'Opis techniczny',
        'date_create' => 'Utworzony',
        'date_modify' => 'Zmodyfikowany',
        'status' => 'Status',
        'status_default' => 'Język domyślny'
    ),
    'im_image' => array(
        'name' => 'Nazwa',
        'content' => 'Opis',
        'description' => 'Opis techniczny',
        'date_create' => 'Utworzony',
        'date_modify' => 'Zmodyfikowany',
        'status' => 'Status'
    ),
    'im_file' => array(
        'name' => 'Nazwa',
        'content' => 'Opis',
        'description' => 'Opis techniczny',
        'date_create' => 'Utworzony',
        'date_modify' => 'Zmodyfikowany',
        'status' => 'Status'
    ),
    'im_movie' => array(
        'name' => 'Nazwa',
        'link' => 'Odsyłacz zewnętrzny',
        'date_create' => 'Utworzony',
        'date_modify' => 'Zmodyfikowany',
        'status' => 'Status'
    ),
    'im_setting' => array(
        'name' => 'Nazwa',
        'system_name' => 'Nazwa systemowa',
        'description' => 'Opis techniczny',
        'date_create' => 'Utworzony',
        'date_modify' => 'Zmodyfikowany'
    ),
    'im_translation_system' => array(
        'name' => 'Nazwa',
        'system_name' => 'Nazwa systemowa',
        'content' => 'Tłumaczenie',
        'description' => 'Opis techniczny',
        'date_create' => 'Utworzony',
        'date_modify' => 'Zmodyfikowany'
    ),
    'im_translation' => array(
        'name' => 'Nazwa',
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
        'system_name' => 'Nazwa systemowa',
        'name' => 'Nazwa',
        'label' => 'Etykieta',
        'section' => 'Przekierowanie do sekcji',
        'link' => 'Odsyłacz zewnętrzny',
        'date' => 'Data',
        'content' => 'Treść',
        'description' => 'Opis techniczny'
    ),
    'im_section' => array(
        'name' => 'Nazwa',
        'name_url' => 'Nazwa url',
        'icon' => 'Ikona (Fontawesome)',
        'description' => 'Opis techniczny'
    ),
    'im_category' => array(
        'name' => 'Nazwa',
        'label' => 'Etykieta',
        'content' => 'Opis',
        'description' => 'Opis techniczny'
    ),
    'im_language' => array(
        'name' => 'Nazwa',
        'system_name' => 'Nazwa systemowa',
        'url' => 'Obraz',
        'description' => 'Opis techniczny'
    ),
    'im_image' => array(
        'name' => 'Nazwa',
        'content' => 'Opis',
        'url' => 'Obraz',
        'link' => 'Przekierowanie',
        'description' => 'Opis techniczny'
    ),
    'im_file' => array(
        'name' => 'Nazwa',
        'content' => 'Opis',
        'url' => 'Plik',
        'description' => 'Opis techniczny'
    ),
    'im_movie' => array(
        'name' => 'Nazwa',
        'content' => 'Źródło',
        'link' => 'Odsyłacz zewnętrzny',
        'description' => 'Opis techniczny'
    ),
    'im_setting' => array(
        'name' => 'Nazwa',
        'system_name' => 'Nazwa systemowa',
        'content' => 'Zawartość',
        'description' => 'Opis techniczny'
    ),
    'im_translation_system' => array(
        'name' => 'Nazwa',
        'system_name' => 'Nazwa systemowa',
        'language' => 'Język',
        'content' => 'Tłumaczenie',
        'description' => 'Opis techniczny'
    ),
    'im_translation' => array(
        'name' => 'Nazwa',
        'language' => 'Język',
        'content' => 'Tłumaczenie',
        'description' => 'Opis techniczny'
    )
);