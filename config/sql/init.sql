-- PRZYGOTOWANIE BAZY --

-- bez sprawdzania kluczy obcych

set foreign_key_checks = 0;

-- tabele

drop table if exists im_section;

drop table if exists im_label;

drop table if exists im_type;

drop table if exists im_property;

drop table if exists im_object;

drop table if exists im_section_object;

drop table if exists im_type_property;

-- wyzwalacze

drop trigger if exists im_section_insert_date_create;

drop trigger if exists im_section_insert_date_modify;

drop trigger if exists im_section_update_date_modify;

drop trigger if exists im_label_insert_date_create;

drop trigger if exists im_label_insert_date_modify;

drop trigger if exists im_label_update_date_modify;

drop trigger if exists im_type_insert_date_create;

drop trigger if exists im_type_insert_date_modify;

drop trigger if exists im_type_update_date_modify;

drop trigger if exists im_property_insert_date_create;

drop trigger if exists im_property_insert_date_modify;

drop trigger if exists im_property_update_date_modify;

drop trigger if exists im_object_insert_date_create;

drop trigger if exists im_object_insert_date_modify;

drop trigger if exists im_object_update_date_modify;

-- KONIEC PRZYGOTOWANIA

set names utf8;

-- SEKCJA START --

-- tabela

create table im_section (
    section_id int not null auto_increment,
    parent int default 0,-- rodzic, gdy 0 to sekcja glowna
    name varchar(128) collate utf8_polish_ci default '',
    url varchar(128) default '',-- przyjazna sciezka url, budowana dynamicznie na podstawie nazwy, mozliwa do edycji
    position int default 0,
    status varchar(3) default 'on',
    description text collate utf8_polish_ci default '',-- opis do celow zarzadzania
    date_create datetime,-- czas utworzenia
    date_modify datetime,-- czas ostatniej modyfikacji
    primary key (section_id)
) engine = InnoDB default charset = utf8 collate = utf8_polish_ci;

-- wyzwalacze

create trigger im_section_insert_date_create
    before insert on im_section
    for each row
    set new.date_create = now();

create trigger im_section_insert_date_modify
    before insert on im_section
    for each row
    set new.date_modify = now();

create trigger im_section_update_date_modify
    before update on im_section
    for each row
    set new.date_modify = now();

-- rekordy

insert into im_section values (null, 0, 'Strona główna', 'strona-glowna', 1, 'on', '', null, null);

insert into im_section values (null, 0, 'Kontakt', 'kontakt', 2, 'on', '', null, null);

-- SEKCJA KONIEC --

-- ETYKIETA START --

-- tabela

create table im_label (
    label_id int not null auto_increment,
    name varchar(128) collate utf8_polish_ci default '',
    description text collate utf8_polish_ci default '',-- opis do celow zarzadzania
    date_create datetime,-- czas utworzenia
    date_modify datetime,-- czas ostatniej modyfikacji
    primary key (label_id)
) engine = InnoDB default charset = utf8 collate = utf8_polish_ci;

-- wyzwalacze

create trigger im_label_insert_date_create
    before insert on im_label
    for each row
    set new.date_create = now();

create trigger im_label_insert_date_modify
    before insert on im_label
    for each row
    set new.date_modify = now();

create trigger im_label_update_date_modify
    before update on im_label
    for each row
    set new.date_modify = now();

-- rekordy

insert into im_label values (null, 'Wszystkie', '', null, null);

-- ETYKIETA KONIEC --

-- TYP START --

-- tabela

create table im_type (
    type_id int not null auto_increment,
    name varchar(128) collate utf8_polish_ci default '',
    class varchar(128) collate utf8_polish_ci default '',-- definiowanie klasy danego typu obiektow (nadawanie wygladu, np. klasy bootstrap)
    description text collate utf8_polish_ci default '',-- opis do celow zarzadzania
    date_create datetime,-- czas utworzenia
    date_modify datetime,-- czas ostatniej modyfikacji
    primary key (type_id)
) engine = InnoDB default charset = utf8 collate = utf8_polish_ci;

-- wyzwalacze

create trigger im_type_insert_date_create
    before insert on im_type
    for each row
    set new.date_create = now();

create trigger im_type_insert_date_modify
    before insert on im_type
    for each row
    set new.date_modify = now();

create trigger im_type_update_date_modify
    before update on im_type
    for each row
    set new.date_modify = now();

-- rekordy

insert into im_type values (null, 'Posty w sekcji', '', '', null, null);

-- TYP KONIEC --

-- WLASCIWOSCI START --

-- tabela

create table im_property (
    property_id int not null auto_increment,
    name varchar(128) collate utf8_polish_ci default '',
    system_name varchar(128) collate utf8_polish_ci default '',
    description text collate utf8_polish_ci default '',-- opis do celow zarzadzania
    date_create datetime,-- czas utworzenia
    date_modify datetime,-- czas ostatniej modyfikacji
    primary key (property_id)
) engine = InnoDB default charset = utf8 collate = utf8_polish_ci;

-- wyzwalacze

create trigger im_property_insert_date_create
    before insert on im_property
    for each row
    set new.date_create = now();

create trigger im_property_insert_date_modify
    before insert on im_property
    for each row
    set new.date_modify = now();

create trigger im_property_update_date_modify
    before update on im_property
    for each row
    set new.date_modify = now();

-- rekordy

insert into im_property values (null, 'Tekst obiektu', 'text', '', null, null);

-- WLASCIWOSCI KONIEC --

-- OBIEKT START --

-- tabela

create table im_object (
    object_id int not null auto_increment,
    type_id int not null,
    label_id int not null,
    section_id int default 0,-- przekierowanie do sekcji, 0 - brak przekierowania (to nie jest klucz obcy)
    name varchar(128) collate utf8_polish_ci default '',
    position int default 0,
    status varchar(3) default 'on',
    description text collate utf8_polish_ci default '',-- opis do celow zarzadzania
    date_create datetime,-- czas utworzenia
    date_modify datetime,-- czas ostatniej modyfikacji
    primary key (object_id),
    foreign key (type_id) references im_type(type_id),
    foreign key (label_id) references im_label(label_id)
) engine = InnoDB default charset = utf8 collate = utf8_polish_ci;

-- wyzwalacze

create trigger im_object_insert_date_create
    before insert on im_object
    for each row
    set new.date_create = now();

create trigger im_object_insert_date_modify
    before insert on im_object
    for each row
    set new.date_modify = now();

create trigger im_object_update_date_modify
    before update on im_object
    for each row
    set new.date_modify = now();

-- rekordy

insert into im_object values (null, 1, 1, 0, 'Pierwszy obiekt na stronie głównej', 1, 'on', '', null, null);

insert into im_object values (null, 1, 1, 0, 'Drugi obiekt na stronie głównej', 2, 'on', '', null, null);

insert into im_object values (null, 1, 1, 0, 'Pierwszy obiekt na stronie kontakt', 3, 'on', '', null, null);

-- OBIEKT KONIEC --

-- SEKCJA-OBIEKT START --

-- powiazanie obiektow z sekcjami (relacja wiele do wielu), tabela

create table im_section_object (
    section_object_id int not null auto_increment,
    section_id int not null,
    object_id int not null,
    primary key (section_object_id),
    foreign key (section_id) references im_section(section_id),
    foreign key (object_id) references im_object(object_id)
) engine = InnoDB;

-- rekordy

insert into im_section_object values (null, 1, 1);

insert into im_section_object values (null, 1, 2);

insert into im_section_object values (null, 2, 3);

-- SEKCJA-OBIEKT KONIEC --

-- TYP-WLASCIWOSCI START --

-- powiazanie typow z wlasciwosciami (relacja wiele do wielu), tabela

create table im_type_property (
    type_property_id int not null auto_increment,
    type_id int not null,
    property_id int not null,
    primary key (type_property_id),
    foreign key (type_id) references im_type(type_id),
    foreign key (property_id) references im_property(property_id)
) engine = InnoDB;

-- rekordy

insert into im_type_property values (null, 1, 1);

-- TYP-WLASCIWOSCI KONIEC --