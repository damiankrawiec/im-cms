set names utf8;

-- sekcja

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

-- sekcja, triggery

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

-- sekcja, rekordy

insert into im_section values (null, 0, 'Strona główna', 'strona-glowna', 1, 'on', '', null, null);

insert into im_section values (null, 0, 'Kontakt', 'kontakt', 2, 'on', '', null, null);

-- obiekt

create table im_object (
    object_id int not null auto_increment,
    section_id int default 0,-- przekierowanie do sekcji, 0 - brak przekierowania
    name varchar(128) collate utf8_polish_ci default '',
    position int default 0,
    status varchar(3) default 'on',
    description text collate utf8_polish_ci default '',-- opis do celow zarzadzania
    date_create datetime,-- czas utworzenia
    date_modify datetime,-- czas ostatniej modyfikacji
    primary key (object_id)
) engine = InnoDB default charset = utf8 collate = utf8_polish_ci;

-- obiekt, triggery

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

-- obiekt, rekordy

insert into im_object values (null, 0, 'Pierwszy oiekt na stronie głównej', 1, 'on', '', null, null);

insert into im_object values (null, 0, 'Drugi obiekt na stronie głównej', 2, 'on', '', null, null);

insert into im_object values (null, 0, 'Pierwszy obiekt na stronie kontakt', 3, 'on', '', null, null);

-- powiazanie obiektow z sekcjami (relacja wiele do wielu)

create table im_section_object (
    section_object_id int not null auto_increment,
    section_id int not null,
    object_id int not null,
    primary key (section_object_id),
    foreign key (section_id) references im_section(section_id),
    foreign key (object_id) references im_object(object_id)
) engine = InnoDB;

-- powiazanie, rekordy

insert into im_section_object values (null, 1, 1);

insert into im_section_object values (null, 1, 2);

insert into im_section_object values (null, 2, 3);