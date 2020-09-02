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
        'confirm-delete' => 'Potwierdź usunięcie pozycji',
        'confirm-clear' => 'Zostaną usunięte nadmiarowe, niewykorzystywane dane z bazy (np. nadmiarowe tłumaczenia), a także pliki cache i obrazy captcha',
        'confirm-update' => 'Potwierdź rozpoczęcie procesu aktalizacji systemu',
        'confirm-backup' => 'Potwierdź rozpoczęcie procesu wykonywania kopii systemu'
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
        'one' => array('type' => 'Typ'),
        'leave-edit' => 'Opuść tryb edycji',
        'update' => 'Uaktualnij',
        'status' => 'Status',
        'status-copy' => 'Powielany',
        'copy' => 'Skopiuj',
        'confirm' => 'Potwierdź'
    ),
    'message' => array(
        'no-data' => 'Brak danych',
        'relation-exists' => 'Pozycja posiada powiązania z innymi danymi',
        'save-success' => 'Dane zostały zapisane poprawnie',
        'delete-success' => 'Pozycja została usunięta poprawnie',
        'no-field' => 'Typ, do którego podłączony jest obiekt nie posiada żadnych pól',
        'clean-success' => 'Dane zostały uporządkowane',
        'deleted-records' => 'Usuniętych rekordów',
        'deleted-files' => 'Usuniętych plików',
        'update-data' => 'Zaktualizowane zasoby',
        'backup-data' => 'Skopiowane zasoby',
        'update-progress' => 'Trwa aktualizacja (proszę nie wykonywać żadnych czynności w systemie)',
        'backup-progress' => 'Trwa wykonywanie kopii (proszę nie wykonywać żadnych czynności w systemie)'
    ),
    'top' => array(
        'preview' => 'Podgląd',
        'clean-system' => 'Uporządkuj dane',
        'update-system' => 'Aktualizuj system',
        'backup-system' => 'Wykonaj kopię systemu'
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
        'movie' => 'Filmy',
        'setting' => 'Ustawienia',
        'label-property' => 'Właściwości etykiet',
        'service' => 'Obsługa'
    ),
    'table' => array('event' => 'Działania', 'sort' => 'tryb sortowania', 'all' => 'wszystkie'),
    'edit' => array(
        'name' => 'Pole nazwy',
        'name_second' => 'Pole nazwy dodatkowej (nie jest wymagane)',
        'system_name' => 'Pole nazwa systemowa',
        'section_name' => 'Pole nazwa do której jest przekierowanie',
        'class' => 'Pole do nadawania właściwości poprzez klasę (zaawansowane)',
        'class_field' => 'Pole wewnętrzne do nadawania właściwości poprzez klasę (zaawansowane)',
        'description' => 'Pole widoczne tylko dla administratora (nie jest wymagane)',
        'link' => 'Pole na odsyłacz zewnętrzny (otwarcie w nowym oknie)',
        'link_name' => 'Pole na nazwę odsyłacza zewnętrznego',
        'email' => 'Pole na adres e-mail',
        'form' => 'Pole na adres formularza kontaktowego',
        'attachment' => 'Pole na treść nad załącznikiem',
        'date' => 'Pole data w dowolnym formacie',
        'content' => 'Pole na treść',
        'name_url' => 'Pole url to nazwa w pasku adresu',
        'meta' => 'Pole służy do poprawienia indeksu Google danej podstrony (nie jest wymagane)',
        'image' => 'Obecne obrazy',
        'source' => 'Pole na źródło',
        'icon' => 'Pole tekstowe ikony',
        'map' => 'Pole określające współrzędne na mapie (znacznik)',
        'language_id' => 'Definicja języka',
        'email_source' => 'Pole nadawcy',
        'email_destination' => 'Pole odbiorcy',
        'file_delete' => 'Plik zostanie usunięty po kliknięciu "uaktualnij"',
        'file_delete_cancel' => 'nie usuwaj',
        'popup' => 'Treść wiadomości pojawiającej się w oknie danej sekcji',
        'style' => 'Pole do nadawania właściwości obiektom etykiety poprzez style CSS',
        'left-char' => 'Pozostało znaków do wprowadzenia'
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
        'category' => 'Kategorie występowania',
        'movie' => 'Filmy podłączone',
    ),
    'copy' => array(
        'fix' => 'Kopiuj przypisania do sekcji i kategorii',
        'outer-data' => 'Kopiuj dane zawnętrzne (obrazy, pliki, źródła)',
        'translation' => 'Kopiuj wszystkie tłumaczenia (dla każdego języka)'
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
        'source' => 'Źródła (ostatnio dodane lub zmodyfikowane)',
        'movie' => 'Filmy (ostatnio dodane lub zmodyfikowane)',
        'translation-system' => 'Tłumaczenia systemowe (ostatnio dodane lub zmodyfikowane)',
        'translation' => 'Tłumaczenia (ostatnio dodane lub zmodyfikowane)'
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
        'date_modify' => 'Zmodyfikowany',
        'status' => 'Status',
    ),
    'im_type' => array(
        'name' => 'Nazwa',
        'class' => 'Klasa',
        'description' => 'Opis techniczny',
        'date_create' => 'Utworzony',
        'date_modify' => 'Zmodyfikowany',
        'status' => 'Status w menu "obiekty"',
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
        'name_second' => 'Nazwa dodatkowa',
        'icon' => 'Ikona (Fontawesome)',
        'description' => 'Opis techniczny',
        'date_create' => 'Utworzony',
        'date_modify' => 'Zmodyfikowany',
        'status' => 'Status',
        'status_copy' => 'Powielany',
        'status_popup' => 'Wiadmość w oknie',
        'status_parallax' => 'Paralaksa',
        'status_link' => 'Przekierowanie'
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
        'url' => 'Obraz',
        'system_name' => 'Nazwa systemowa',
        'description' => 'Opis techniczny',
        'date_create' => 'Utworzony',
        'date_modify' => 'Zmodyfikowany',
        'status' => 'Status',
        'status_default' => 'Język domyślny'
    ),
    'im_image' => array(
        'name' => 'Nazwa',
        'url' => 'Obraz',
        'content' => 'Opis',
        'description' => 'Opis techniczny',
        'date_create' => 'Utworzony',
        'date_modify' => 'Zmodyfikowany',
        'status' => 'Status'
    ),
    'im_file' => array(
        'name' => 'Nazwa',
        'url' => 'Plik',
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
    'im_movie' => array(
        'name' => 'Nazwa',
        'url' => 'Film',
        'content' => 'Opis',
        'description' => 'Opis techniczny',
        'date_create' => 'Utworzony',
        'date_modify' => 'Zmodyfikowany',
        'status' => 'Status',
        'status_loop' => 'Odtwarzanie w pętli',
        'status_controls' => 'Tryb odtwarzacza',
        'status_autoplay' => 'Automatyczne uruchomienie'
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
        'attachment' => 'Załącznik (pozostaw puste jeśli możliwość dodania pliku ma być niedostępna)',
        'icon' => 'Ikona (Fontawesome)',
        'map' => 'Współrzędne na mapie',
        'date' => 'Data',
        'content' => 'Treść',
        'description' => 'Opis techniczny',
        'status_copy' => 'Przypisz obiekt do sekcji ze statusem "Powielany"',
    ),
    'im_section' => array(
        'name' => 'Nazwa',
        'name_url' => 'Nazwa url',
        'name_second' => 'Nazwa dodatkowa',
        'meta' => 'Opis strony (meta)',
        'icon' => 'Ikona (Fontawesome)',
        'class' => 'Właściwości',
        'popup' => 'Treść wiadomości pojawiającej się w sekcji (od razu po wczytaniu)',
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
    'im_movie' => array(
        'name' => 'Nazwa',
        'content' => 'Opis',
        'url' => 'Film',
        'url-edit' => 'Plik (dodaj nowy plik tylko w przypadku gdy chcesz zmienić bieżący)',
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
        'style' => 'Style obiektów (zaawansowane)',
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
//Display tooltip (in selected table)
$tooltip = array(
    'im_object' => array(
        'system_name' => 'To pole jest widoczne tylko w Panelu Administratora. Najlepiej aby jednoznacznie wskazywało czego dotyczy obiekt, np. [Wydarzenie opisujące imprezę karnawałową w styczniu 2020]',
        'name' => 'To pole jest publikowane, z reguły jako tytuł lub nazwa. Dlatego powinno być ono w miarę możliwości krótkie, np. [Impreza karnawałowa 2020] ',
        'label_id' => 'To pole wskazuje gdzie przyczepiony, w strukturze strony, jest obiekt (np. nagłówek, treść, stopka). Sugerujemy, aby NIE zmieniać tej wartości!',
        'date' => 'To pole jest publikowane, z reguły jako data jakiegoś wydarzenia, itp. Kliknij w pole, a pojawi się interaktywny kalendarz',
        'content' => 'To pole jest publikowane jako treść obiektu, z regóły opis tego co przedstawia nazwa, np. [W roku 2020 karnawał okazał się wyjątkowo...]',
        'form' => 'W tym polu należy wskazać adres e-mail, na który będą przychodziły wiadomości po wysłaniu formularza znajdującego się w obiekcie',
        'attachment' => 'W tym polu neleży wpisać tekst jaki zobaczą użytkownicy nad obszarem odpowiedzialnym za dodanie załącznika',
        'email' => 'To pole jest publikowane, należy w nim określić adres e-mail',
        'icon' => 'To pole jest publikowane jako ikona Fontawesome (zaawansowane)',
        'map' => 'To pole określa współrzędne na mapie, czyli określony punkt wraz z okolicą. Wartości muszą być oddzielone przecinkiem (np. -25.344,131.036)',
        'section' => 'Pole, w którym należy określić do jakiej sekcji w serwisie ma prowadzić odsyłacz w obiekcie',
        'section_name' => 'To pole jest publikowane, nazwa odsyłacza do sekcji w serwisie. Nazwę można zastąpić bądź usupełnić ikony Fontawesome (zaawansowane)',
        'link' => 'Pole, w którym należy określić do jakiego adresu zewnętrznego ma prowadzić odsyłacz w obiekcie, np. [nazwa-domeny.pl] - otwarcie strony nastąpi w nowym oknie',
        'link_name' => 'To pole jest publikowane, nazwa odsyłacza do adresu zewnętrznego. Nazwę można zastąpić bądź usupełnić ikony Fontawesome (zaawansowane)',
        'description' => 'To pole jest widoczne tylko w Panelu Administratora. Treść będzie służyła wyjaśnieniu, przykładowo, jaką funkcję pełni obiekt w serwisie i czy jest on powiązany z innymi danymi (tzn. czy zmianay w obiekcie będą miały wpływ na inne dane - ich interpretację)'
    ),
    'im_section' => array(
        'name' => 'To pole jest nazwą sekcji, która również będzie wyświetlana w elemencie [title] sekcji. Powinno ono być unikalne w ramach całego systemu. To pole ma wpływ na pozycjonowanie w wyszukiwarce Google',
        'name_url' => 'Pole to adres sekcji, który jest wyświetlany w elemencie URL przeglądarki internetowej. Bez polskich znaków, małe listery, dozwolony znak to tylko myślnik. Pole ma wpływ na pozycjonowanie w wyszukiwarce Google. Aby wypełnić adres nazwą sekcji - kliknij ikonę kopiowania powyżej',
        'name_second' => 'To pole jest dodatkową nazwą sekcji, może być wyświetlana jako dodatkowa nazwa w odsyłaczu',
        'meta' => 'Tutaj znajduje się opis strony przygotowany dla wyszukiwarki Google (pozycjonowanie). Treść nie będzie publikowana dla użytkowników, odczyta ją tylko robot. Najlepiej aby był zwięzły, mówiący tylko to o czym jest dana sekcja, ewt. co się w niej znajduje',
        'popup' => 'To pole jest publikowane jako treść okna modalnego. Musi być aktywny status pojawiającego się okna modalnego w sekcji',
        'icon' => 'To pole jest publikowane jako ikona Fontawesome przy odsyłaczu do sekcji, czyli w menu serwisu (zaawansowane)',
        'class' => 'To pole określa właściwość odpowiedzialną za to czy treść sekcji ma wypełniać całą szerokość ekranu, czy być wycentrowana (zaawansowane)',
        'description' => 'To pole jest widoczne tylko w Panelu Administratora. Treść będzie służyła wyjaśnieniu, przykładowo, jaką funkcję pełni obiekt w serwisie i czy jest on powiązany z innymi danymi (tzn. czy zmianay w obiekcie będą miały wpływ na inne dane - ich interpretację)'
    ),
    'im_image' => array(
        'name' => 'To pole jest nazwą obrazu, która również będzie wyświetlana w momencie powiększenia obrazu, jak również może się wyświetlać obok obrazu (zależne od konfiguracji)',
        'content' => 'Pole to z reguły nie jest publikowane, chyba że w sekcji na której znajduje się obraz jest również miejsce na jego opis (zależne od konfiguracji)',
        'url' => 'W tym polu należy fizycznie dodać plik obrazu, w formacie: jpg, png lub gif. UWAGA! W trybie edycji, dodanie nowego pliku spowoduje skasowanie starego',
        'section' => 'Pole, w którym można określić do jakiej sekcji w serwisie ma prowadzić odsyłacz. Jeżeli nie będzie ustawionej wartości to obraz będzie powiększany',
        'description' => 'To pole jest widoczne tylko w Panelu Administratora. Treść będzie służyła wyjaśnieniu, przykładowo, jaką funkcję pełni obiekt w serwisie i czy jest on powiązany z innymi danymi (tzn. czy zmianay w obiekcie będą miały wpływ na inne dane - ich interpretację)'
    ),
    'im_file' => array(
        'name' => 'To pole jest nazwą pliku, która będzie wyświetlana jako odsyłacz do pliku',
        'content' => 'Pole to z reguły nie jest publikowane, chyba że w sekcji na której znajduje się plik jest również miejsce na jego opis (zależne od konfiguracji)',
        'url' => 'W tym polu należy fizycznie dodać plik, w dowolnym formacie. UWAGA! W trybie edycji, dodanie nowego pliku spowoduje skasowanie starego',
        'description' => 'To pole jest widoczne tylko w Panelu Administratora. Treść będzie służyła wyjaśnieniu, przykładowo, jaką funkcję pełni obiekt w serwisie i czy jest on powiązany z innymi danymi (tzn. czy zmianay w obiekcie będą miały wpływ na inne dane - ich interpretację)'
    ),
    'im_source' => array(
        'name' => 'To pole jest nazwą źródła, która z reguły nie jest publikowana (zależna od konfiguracji)',
        'content' => 'To pole jest publikowane, w postaci źródła, najczęściej w języku HTML. Źródło powoduje wyświetlenie interaktywnego elementu z innego serwisu np. YouTube (player video)',
        'link' => 'Pole, w którym można określić do jakiego adresu zewnętrznego ma prowadzić odsyłacz obok źródła (tzw. oryginalna publikacja) - otwarcie strony nastąpi w nowym oknie',
        'description' => 'To pole jest widoczne tylko w Panelu Administratora. Treść będzie służyła wyjaśnieniu, przykładowo, jaką funkcję pełni obiekt w serwisie i czy jest on powiązany z innymi danymi (tzn. czy zmianay w obiekcie będą miały wpływ na inne dane - ich interpretację)'
    ),
    'im_movie' => array(
        'name' => 'To pole jest nazwą filmu, z reguły nie będzie wyświetlane (służy identyfikacji)',
        'content' => 'Pole to z reguły nie jest publikowane, chyba że w sekcji na której znajduje się plik jest również miejsce na jego opis (zależne od konfiguracji)',
        'url' => 'W tym polu należy fizycznie dodać plik, sugerujemy w formacie MP4 (kodek H.264). UWAGA! W trybie edycji, dodanie nowego pliku spowoduje skasowanie starego',
        'description' => 'To pole jest widoczne tylko w Panelu Administratora. Treść będzie służyła wyjaśnieniu, przykładowo, jaką funkcję pełni obiekt w serwisie i czy jest on powiązany z innymi danymi (tzn. czy zmianay w obiekcie będą miały wpływ na inne dane - ich interpretację)'
    ),
);