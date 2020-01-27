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
        'back' => 'Powrót',
        'close' => 'Zamknij',
        'one' => array('type' => 'Typ')
    ),
    'message' => array(
        'no-data' => 'Brak danych',
        'relation-exists' => 'Pozycja posiada powiązania z innymi danymi',
        'save-success' => 'Dane zostały zapisane poprawnie',
        'delete-success' => 'Pozycja została usunięta poprawnie',
        'no-field' => 'Typ, do którego podłączony jest obiekt nie posiada żadnych pól',
    ),
    'menu' => array(
        'dashboard' => 'Pulpit',
        'object' => 'Obiekty',
        'section' => 'Sekcje',
        'definition-object' => 'Definicje obiektowe',
        'type-property' => 'Właściwości typów',
        'type' => 'Typy',
        'label' => 'Etykiety',
        'category' => 'Kategorie',
        'property' => 'Właściwości',
        'language' => 'Język',
        'translation' => 'Tłumaczenia',
        'translation-system' => 'Tłumaczenia systemowe',
        'definition' => 'Definicje',
        'multimedia' => 'Multimedia',
        'image' => 'Obrazy',
        'file' => 'Pliki',
        'source' => 'Źródła',
        'setting' => 'Ustawienia',
        'label-property' => 'Właściwości etykiet',
        'service' => 'Obsługa'
    ),
    'table' => array('event' => 'Działania', 'sort' => 'tryb sortowania', 'all' => 'wszystkie'),
    'edit' => array(
        'name' => 'Pole nazwy',
        'system_name' => 'Pole nazwa systemowa',
        'section_name' => 'Pole nazwa do której jest przekierowanie',
        'class' => 'Pole do nadawania właściwości poprzez klasę (zaawansowane)',
        'class_field' => 'Pole wewnętrzne do nadawania właściwości poprzez klasę (zaawansowane)',
        'description' => 'Pole widoczne tylko dla administratora (nie jest wymagane)',
        'link' => 'Pole na odsyłacz zewnętrzny (otwarcie w nowym oknie)',
        'link_name' => 'Pole na nazwę odsyłacza zewnętrznego',
        'email' => 'Pole na adres e-mail',
        'form' => 'Pole na adres formularza kontaktowego',
        'date' => 'Pole data w dowolnym formacie',
        'content' => 'Pole na treść',
        'name_url' => 'Pole url to nazwa w pasku adresu',
        'meta' => 'Pole służy do poprawienia indeksu Google danej podstrony (nie jest wymagane)',
        'image' => 'Obecne obrazy',
        'source' => 'Pole na źródło',
        'icon' => 'Pole tekstowe ikony',
        'language_id' => 'Definicja języka',
        'email_source' => 'Pole nadawcy',
        'email_destination' => 'Pole odbiorcy',
        'file_delete' => 'Plik zostanie usunięty po kliknięciu "zapisz"',
        'file_delete_cancel' => 'nie usuwaj',
        'popup' => 'Treść wiadomości pojawiającej się w oknie danej sekcji'
    ),
    'select' => array('no-set' => 'Wybierz wartość', 'all' => 'Wszystkie wartości'),
    'fix' => array(
        'available' => 'Dostępne wartości',
        'selected' => 'Wybrane wartości',
        'search' => 'Szukaj...',
        'section' => 'Sekcje wyświetlające',
        'image' => 'Obrazy podłączone',
        'file' => 'Pliki podłączone',
        'source' => 'Źródła podłączone',
        'category' => 'Kategorie występowania'
    ),
    'validation' => array(
        'wrong-file' => 'Plik niepoprawny',
        'delete-file-fail' => 'Nieudane usunięcie bieżącego pliku'
    ),
    'breadcrumb' => array(
        'title' => 'Twoje położenie'
    ),
    'dashboard' => array(
        'section' => 'Sekcje (ostatnio dodane lub zmodyfikowane)',
        'object' => 'Obiekty (ostatnio dodane lub zmodyfikowane)',
        'setting' => 'Ustawienia (ostatnio dodane lub zmodyfikowane)',
        'category' => 'Kategorie (ostatnio dodane lub zmodyfikowane)',
        'type' => 'Typy (ostatnio dodane lub zmodyfikowane)',
        'label' => 'Etykiety (ostatnio dodane lub zmodyfikowane)',
        'image' => 'Obrazy (ostatnio dodane lub zmodyfikowane)',
        'file' => 'Pliki (ostatnio dodane lub zmodyfikowane)',
        'source' => 'Źródła (ostatnio dodane lub zmodyfikowane)'
    ),
    'php' => array(
        'version' => 'Wersja interpretera PHP',
        'version-to-low' => 'Wersja PHP obsługiwana przez serwer jest za niska, dla prawidłowej pracy systemu zalecana jest aktualizacja interpretera PHP do wersji minimum 7.0',
        'version-fine' => 'Wersja PHP obsługiwana przez serwer jest odpowiednia, wszystkie składniki systemu pracują poprawnie'
    )
);
//Headers of data tables (on the edit the fields may be different)
$tableDefinition = array(
    'im_object' => array(
        'system_name' => 'Nazwa systemowa',
        'description' => 'Opis techniczny',
        'date_create' => 'Utworzony',
        'date_modify' => 'Zmodyfikowany',
        'status' => 'Status',
        'status_copy' => 'Powielany'
    ),
    'im_type_property' => array(
        'name' => 'Nazwa',
        'system_name' => 'Nazwa systemowa',
        'description' => 'Opis techniczny',
        'class' => 'Klasa - otoczenie',
        'class_field' => 'Klasa - pole',
        'date_create' => 'Utworzony',
        'date_modify' => 'Zmodyfikowany'
    ),
    'im_type' => array(
        'name' => 'Nazwa',
        'class' => 'Klasa',
        'description' => 'Opis techniczny',
        'date_create' => 'Utworzony',
        'date_modify' => 'Zmodyfikowany'
    ),
    'im_property' => array(
        'name' => 'Nazwa',
        'system_name' => 'Nazwa systemowa',
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
        'status' => 'Status',
        'status_copy' => 'Powielany',
        'status_popup' => 'Wiadmość w oknie'
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
    'im_source' => array(
        'name' => 'Nazwa',
        'link' => 'Odsyłacz zewnętrzny',
        'description' => 'Opis techniczny',
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
        'language' => 'Język',
        'description' => 'Opis techniczny',
        'date_create' => 'Utworzony',
        'date_modify' => 'Zmodyfikowany'
    ),
    'im_translation' => array(
        'name' => 'Nazwa',
        'language' => 'Język',
        'description' => 'Opis techniczny',
        'date_create' => 'Utworzony',
        'date_modify' => 'Zmodyfikowany'
    ),
    'im_label' => array(
        'name' => 'Nazwa',
        'system_name' => 'Nazwa systemowa',
        'description' => 'Opis techniczny',
        'date_create' => 'Utworzony',
        'date_modify' => 'Zmodyfikowany'
    ),
    'im_label_section' => array(
        'label' => 'Nazwa etykiety',
        'system_name' => 'Nazwa systemowa',
        'name' => 'Zastosowanie w sekcji',
        'class' => 'Właściwości',
        'description' => 'Opis techniczny',
        'date_create' => 'Utworzony',
        'date_modify' => 'Zmodyfikowany'
    ),
    'im_form' => array(
        'name' => 'Nazwa',
        'email_source' => 'Nadawca',
        'email_destination' => 'Odbiorca',
        'description' => 'Opis techniczny',
        'date_create' => 'Utworzony'
    ),
);
$tableDefinitionEvent = array(
    'im_type' => array(
        'name' => 'Nazwa',
        'class' => 'Klasa',
        'description' => 'Opis techniczny'
    ),
    'im_type_property' => array(
        'name' => 'Nazwa',
        'system_name' => 'Nazwa systemowa',
        'class' => 'Klasa - otoczenie',
        'class_field' => 'Klasa - pole',
        'description' => 'Opis techniczny'
    ),
    'im_property' => array(
        'name' => 'Nazwa',
        'system_name' => 'Nazwa systemowa',
        'description' => 'Opis techniczny'
    ),
    'im_object' => array(
        'system_name' => 'Nazwa systemowa',
        'name' => 'Nazwa',
        'label' => 'Etykieta',
        'section' => 'Przekierowanie do sekcji',
        'section_name' => 'Nazwa przekierowania do sekcji (może być ikona Fontawesome)',
        'link' => 'Odsyłacz zewnętrzny',
        'link_name' => 'Nazwa odsyłacza zewnętrznego (może być ikona Fontawesome)',
        'email' => 'Adres e-mail',
        'form' => 'Adres formularza kontaktowego',
        'icon' => 'Ikona (Fontawesome)',
        'date' => 'Data',
        'content' => 'Treść',
        'description' => 'Opis techniczny',
        'status_copy' => 'Przypisz obiekt do sekcji ze statusem "Powielany"',
    ),
    'im_section' => array(
        'name' => 'Nazwa',
        'name_url' => 'Nazwa url',
        'meta' => 'Opis strony (meta)',
        'icon' => 'Ikona (Fontawesome)',
        'class' => 'Właściwości',
        'popup' => 'Treść wiadomości pojawiającej się w oknie danej sekcji',
        'description' => 'Opis techniczny',
        'status_copy' => 'Przypisz do sekcji obiekty ze statusem "Powielany"'
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
        'url-edit' => 'Obraz (dodaj nowy obraz tylko w przypadku gdy chcesz zmienić bieżący)',
        'section' => 'Przekierowanie (gdy nie wybierzesz nic obraz po kliknięciu będzie powiększany)',
        'description' => 'Opis techniczny'
    ),
    'im_file' => array(
        'name' => 'Nazwa',
        'content' => 'Opis',
        'url' => 'Plik',
        'url-edit' => 'Plik (dodaj nowy plik tylko w przypadku gdy chcesz zmienić bieżący)',
        'description' => 'Opis techniczny'
    ),
    'im_source' => array(
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
        'language' => 'Język (tłumaczenia systemowe należy wykonać dla każdego języka)',
        'content' => 'Tłumaczenie',
        'description' => 'Opis techniczny'
    ),
    'im_translation' => array(
        'name' => 'Nazwa',
        'language' => 'Język (sugerujemy, aby tłumaczenie wykonać zawsze dla języków innych niż domyślny, w przeciwnym razie treści języka domyślnego zostaną nadpisane)',
        'content' => 'Tłumaczenie',
        'description' => 'Opis techniczny'
    ),
    'im_label' => array(
        'name' => 'Nazwa',
        'system_name' => 'Nazwa systemowa',
        'description' => 'Opis techniczny'
    ),
    'im_label_section' => array(
        'name' => 'Zastosowanie w sekcji',
        'name_event' => 'Zastosowanie w sekcji (gdy nie wybierzesz nic ustawienie zostanie nadane dla wszystkich sekcji)',
        'label' => 'Etykieta',
        'class' => 'Właściwości',
        'description' => 'Opis techniczny'
    ),
    'im_form' => array(
        'name' => 'Nazwa',
        'content' => 'Treść',
        'email_source' => 'Nadawca',
        'email_destination' => 'Odbiorca',
        'description' => 'Opis techniczny'
    )
);