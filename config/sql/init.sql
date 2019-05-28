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

-- obiekt

create table im_object (
    object_id int not null auto_increment,
    section_id int not null,-- klucz obcy do sekcji (na potrzeby przekierowania do sekcji)
    name varchar(128) collate utf8_polish_ci default '',
    position int default 0,
    status varchar(3) default 'on',
    description text collate utf8_polish_ci default '',-- opis do celow zarzadzania
    date_create datetime,-- czas utworzenia
    date_modify datetime,-- czas ostatniej modyfikacji
    primary key (object_id),
    foreign key (section_id) references im_section(section_id)
) engine = InnoDB default charset = utf8 collate = utf8_polish_ci;

-- powiazanie obiektow z sekcjami (relacja wiele do wielu)

create table im_section_object (
    section_object_id int not null auto_increment,
    section_id int not null,
    object_id int not null,
    primary key (section_object_id),
    foreign key (section_id) references im_section(section_id),
    foreign key (object_id) references im_object(object_id)
) engine = InnoDB;