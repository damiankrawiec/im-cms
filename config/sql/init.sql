-- Prepare database --

-- without check keys

set foreign_key_checks = 0;

-- tables

drop table if exists im_section;

drop table if exists im_label;

drop table if exists im_type;

drop table if exists im_property;

drop table if exists im_object;

drop table if exists im_section_object;

drop table if exists im_type_property;

drop table if exists im_image;

drop table if exists im_file;

drop table if exists im_source;

drop table if exists im_movie;

drop table if exists im_object_image;

drop table if exists im_object_file;

drop table if exists im_object_source;

drop table if exists im_object_movie;

drop table if exists im_section_image;

drop table if exists im_category;

drop table if exists im_label_category;

drop table if exists im_object_category;

drop table if exists im_setting;

drop table if exists im_language;

drop table if exists im_translation_system;

drop table if exists im_translation;

drop table if exists im_label_section;

drop table if exists im_form;

-- triggers

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

drop trigger if exists im_object_insert_date;

drop trigger if exists im_object_insert_date_create;

drop trigger if exists im_object_insert_date_modify;

drop trigger if exists im_object_update_date_modify;

drop trigger if exists im_image_insert_date_create;

drop trigger if exists im_image_insert_date_modify;

drop trigger if exists im_image_update_date_modify;

drop trigger if exists im_file_insert_date_create;

drop trigger if exists im_file_insert_date_modify;

drop trigger if exists im_file_update_date_modify;

drop trigger if exists im_category_insert_date_create;

drop trigger if exists im_category_insert_date_modify;

drop trigger if exists im_category_update_date_modify;

drop trigger if exists im_setting_insert_date_create;

drop trigger if exists im_setting_insert_date_modify;

drop trigger if exists im_setting_update_date_modify;

drop trigger if exists im_language_insert_date_create;

drop trigger if exists im_language_insert_date_modify;

drop trigger if exists im_language_update_date_modify;

drop trigger if exists im_translation_system_insert_date_create;

drop trigger if exists im_translation_system_insert_date_modify;

drop trigger if exists im_translation_system_update_date_modify;

drop trigger if exists im_translation_insert_date_create;

drop trigger if exists im_translation_insert_date_modify;

drop trigger if exists im_translation_update_date_modify;

drop trigger if exists im_source_insert_date_create;

drop trigger if exists im_source_insert_date_modify;

drop trigger if exists im_source_update_date_modify;

drop trigger if exists im_movie_insert_date_create;

drop trigger if exists im_movie_insert_date_modify;

drop trigger if exists im_movie_update_date_modify;

drop trigger if exists im_type_property_insert_date_create;

drop trigger if exists im_type_property_insert_date_modify;

drop trigger if exists im_type_property_update_date_modify;

drop trigger if exists im_label_section_insert_date_create;

drop trigger if exists im_label_section_insert_date_modify;

drop trigger if exists im_label_section_update_date_modify;

drop trigger if exists im_form_insert_date_create;

-- end prepare database --

set names utf8;

-- SECTION START --

-- table

create table im_section (
    section_id int not null auto_increment,
    parent int default 0,-- parent, when 0 then root section
    name varchar(128) collate utf8_polish_ci default '',
    name_second varchar(128) collate utf8_polish_ci default '',-- second line in main menu
    name_url varchar(128) default '',-- url name, like as name, it could be change
    meta text collate utf8_polish_ci default '',-- meta description
    icon varchar(128) collate utf8_polish_ci default '',-- fontawesome icon
    class varchar(128) collate utf8_polish_ci default 'container',-- class of content in section
    popup text collate utf8_polish_ci default '',-- popup content
    position int default 0,
    status varchar(3) default 'on',
    status_copy varchar(3) default 'off',
    status_popup varchar(3) default 'off',
    status_parallax varchar(3) default 'off',
    description text collate utf8_polish_ci default '',-- description, management
    date_create datetime,-- create time
    date_modify datetime,-- last modification time
    primary key (section_id)
) engine = InnoDB default charset = utf8 collate = utf8_polish_ci;

-- trigger

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

-- SECTION END --

-- LABEL START --

-- to separate object in one section, table

create table im_label (
    label_id int not null auto_increment,
    name varchar(128) collate utf8_polish_ci default '',
    system_name varchar(128) collate utf8_polish_ci default '',
    style text collate utf8_polish_ci default '',-- style of label's objects (css)
    description text collate utf8_polish_ci default '',-- description, management
    date_create datetime,-- create time
    date_modify datetime,-- last modification time
    primary key (label_id)
) engine = InnoDB default charset = utf8 collate = utf8_polish_ci;

-- trigger

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

-- LABEL END --

-- TYPE START --

-- definition of property, table

create table im_type (
    type_id int not null auto_increment,
    name varchar(128) collate utf8_polish_ci default '',
    class varchar(128) collate utf8_polish_ci default '',-- class of kind of object
    status varchar(3) default 'on',-- show type in menu "object", cms
    description text collate utf8_polish_ci default '',-- description, management
    date_create datetime,-- create time
    date_modify datetime,-- last modification time
    primary key (type_id)
) engine = InnoDB default charset = utf8 collate = utf8_polish_ci;

-- trigger

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

-- TYPE END --

-- PROPERTIES START --

-- table

create table im_property (
    property_id int not null auto_increment,
    name varchar(128) collate utf8_polish_ci default '',
    system_name varchar(128) collate utf8_polish_ci default '',
    description text collate utf8_polish_ci default '',-- description, management
    date_create datetime,-- create time
    date_modify datetime,-- last modification time
    primary key (property_id)
) engine = InnoDB default charset = utf8 collate = utf8_polish_ci;

-- trigger

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

-- PROPERTY END --

-- OBJECT START --

-- table

create table im_object (
    object_id int not null auto_increment,
    type_id int not null,
    label_id int not null,
    section int default 0,-- direction to section, 0 - not direction (this in not foreign key)
    section_name varchar(256) collate utf8_polish_ci default '',-- name of direct to section (it may be different like section name), in field may be e.g. fontawesome icon (html)
    system_name varchar(128) collate utf8_polish_ci default '',-- first, important, require, because object type could be without normal name
    name varchar(256) collate utf8_polish_ci default '',
    content text collate utf8_polish_ci default '',
    link varchar(128) collate utf8_polish_ci default '',-- direction to outer url
    link_name varchar(256) collate utf8_polish_ci default '',-- name of outer url, in field may be e.g. fontawesome icon (html)
    email varchar(64) collate utf8_polish_ci default '',-- e-mail address
    form varchar(64) collate utf8_polish_ci default '',-- form address
    attachment varchar(256) collate utf8_polish_ci default '',-- attachment text, like CV (if empty, there is no attachment)
    icon varchar(64) collate utf8_polish_ci default '',-- icon (fontawesome)
    map varchar(64) collate utf8_polish_ci default '',-- coordinates
    position int default 0,
    status varchar(3) default 'on',
    status_copy varchar(3) default 'off',
    description text collate utf8_polish_ci default '',-- description, management
    date varchar(32) collate utf8_polish_ci default '',-- date to display
    date_create datetime,-- create time
    date_modify datetime,-- last modification time
    primary key (object_id),
    foreign key (type_id) references im_type(type_id),
    foreign key (label_id) references im_label(label_id)
) engine = InnoDB default charset = utf8 collate = utf8_polish_ci;

-- trigger

create trigger im_object_insert_date
    before insert on im_object
    for each row
    set new.date = current_date();

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

-- OBJECT END --

-- SECTION-OBJECT START --

-- connecting object with section (m:n relationship), table

create table im_section_object (
    section_object_id int not null auto_increment,
    section_id int not null,
    object_id int not null,
    primary key (section_object_id),
    foreign key (section_id) references im_section(section_id),
    foreign key (object_id) references im_object(object_id)
) engine = InnoDB;

-- SECTION-OBJECT END -

-- TYPE-PROPERTY START --

-- connecting properties with object (m:n relationship), table

create table im_type_property (
    type_property_id int not null auto_increment,
    type_id int not null,
    property_id int not null,
    class varchar(128) collate utf8_polish_ci default '',-- class of kind of object fields
    class_field varchar(128) collate utf8_polish_ci default '',-- class of object fields
    position int default 0,
    status varchar(3) default 'on',-- show property of object in section, everything in cms is still available
    description text collate utf8_polish_ci default '',-- description, management
    date_create datetime,-- create time
    date_modify datetime,-- last modification time
    primary key (type_property_id),
    foreign key (type_id) references im_type(type_id),
    foreign key (property_id) references im_property(property_id)
) engine = InnoDB;

-- trigger

create trigger im_type_property_insert_date_create
    before insert on im_type_property
    for each row
    set new.date_create = now();

create trigger im_type_property_insert_date_modify
    before insert on im_type_property
    for each row
    set new.date_modify = now();

create trigger im_type_property_update_date_modify
    before update on im_type_property
    for each row
    set new.date_modify = now();

-- TYPE-PROPERTY END --

-- SECTION-LABEL START --

-- not to connect, only for adding special class for section label

create table im_label_section (
    label_section_id int not null auto_increment,
    label_id int not null,
    section int not null,-- section id, but it is not key (relationship)
    class varchar(256) collate utf8_polish_ci default '',-- class of kind of object fields
    description text collate utf8_polish_ci default '',-- description, management
    date_create datetime,-- create time
    date_modify datetime,-- last modification time
    primary key (label_section_id),
    foreign key (label_id) references im_label(label_id)
) engine = InnoDB;

-- trigger

create trigger im_label_section_insert_date_create
    before insert on im_label_section
    for each row
    set new.date_create = now();

create trigger im_label_section_insert_date_modify
    before insert on im_label_section
    for each row
    set new.date_modify = now();

create trigger im_label_section_update_date_modify
    before update on im_label_section
    for each row
    set new.date_modify = now();

-- SECTION-LABEL END --

-- IMAGE START --

-- table

create table im_image (
    image_id int not null auto_increment,
    section int default 0,-- direction to section, 0 - not direction (this in not foreign key)
    name varchar(64) collate utf8_polish_ci default '',
    content text collate utf8_polish_ci default '',
    url varchar(128) collate utf8_polish_ci default '',
    status varchar(3) default 'on',
    description text collate utf8_polish_ci default '',-- description, management
    date_create datetime,-- create time
    date_modify datetime,-- last modification time
    primary key (image_id)
) engine = InnoDB default charset = utf8 collate = utf8_polish_ci;

-- trigger

create trigger im_image_insert_date_create
    before insert on im_image
    for each row
    set new.date_create = now();

create trigger im_image_insert_date_modify
    before insert on im_image
    for each row
    set new.date_modify = now();

create trigger im_image_update_date_modify
    before update on im_image
    for each row
    set new.date_modify = now();

-- IMAGE END --

-- FILE START --

-- table

create table im_file (
    file_id int not null auto_increment,
    name varchar(64) collate utf8_polish_ci default '',
    content text collate utf8_polish_ci default '',
    url varchar(128) collate utf8_polish_ci default '',
    status varchar(3) default 'on',
    description text collate utf8_polish_ci default '',-- description, management
    date_create datetime,-- create time
    date_modify datetime,-- last modification time
    primary key (file_id)
) engine = InnoDB default charset = utf8 collate = utf8_polish_ci;

-- trigger

create trigger im_file_insert_date_create
    before insert on im_file
    for each row
    set new.date_create = now();

create trigger im_file_insert_date_modify
    before insert on im_file
    for each row
    set new.date_modify = now();

create trigger im_file_update_date_modify
    before update on im_file
    for each row
    set new.date_modify = now();

-- FILE END --

-- SOURCE START --

-- table

create table im_source (
    source_id int not null auto_increment,
    name varchar(64) collate utf8_polish_ci default '',
    content text collate utf8_polish_ci default '',
    link varchar(128) collate utf8_polish_ci default '',
    status varchar(3) default 'on',
    description text collate utf8_polish_ci default '',-- description, management
    date_create datetime,-- create time
    date_modify datetime,-- last modification time
    primary key (source_id)
) engine = InnoDB default charset = utf8 collate = utf8_polish_ci;

-- trigger

create trigger im_source_insert_date_create
    before insert on im_source
    for each row
    set new.date_create = now();

create trigger im_source_insert_date_modify
    before insert on im_source
    for each row
    set new.date_modify = now();

create trigger im_source_update_date_modify
    before update on im_source
    for each row
    set new.date_modify = now();

-- SOURCE END --

-- MOVIE START --

-- table

create table im_movie (
    movie_id int not null auto_increment,
    name varchar(64) collate utf8_polish_ci default '',
    content text collate utf8_polish_ci default '',
    url varchar(128) collate utf8_polish_ci default '',
    status varchar(3) default 'on',
    status_loop varchar(3) default 'off',-- loop movie
    status_controls varchar(3) default 'off',-- controls on the bottom
    status_autoplay varchar(3) default 'off',-- movie play auto
    description text collate utf8_polish_ci default '',-- description, management
    date_create datetime,-- create time
    date_modify datetime,-- last modification time
    primary key (movie_id)
) engine = InnoDB default charset = utf8 collate = utf8_polish_ci;

-- trigger

create trigger im_movie_insert_date_create
    before insert on im_movie
    for each row
    set new.date_create = now();

create trigger im_movie_insert_date_modify
    before insert on im_movie
    for each row
    set new.date_modify = now();

create trigger im_movie_update_date_modify
    before update on im_movie
    for each row
    set new.date_modify = now();

-- MOVIE END --

-- OBJECT-IMAGE START --

-- connecting images with object (m:n relationship), table

create table im_object_image (
    object_image_id int not null auto_increment,
    object_id int not null,
    image_id int not null,
    position int default 0,
    primary key (object_image_id),
    foreign key (object_id) references im_object(object_id),
    foreign key (image_id) references im_image(image_id)
) engine = InnoDB;

-- OBJECT-IMAGE END --

-- OBJECT-FILE START --

-- connecting files with object (m:n relationship), table

create table im_object_file (
    object_file_id int not null auto_increment,
    object_id int not null,
    file_id int not null,
    position int default 0,
    primary key (object_file_id),
    foreign key (object_id) references im_object(object_id),
    foreign key (file_id) references im_file(file_id)
) engine = InnoDB;

-- OBJECT-FILE END --

-- OBJECT-SOURCE START --

-- connecting files with object (m:n relationship), table

create table im_object_source (
    object_source_id int not null auto_increment,
    object_id int not null,
    source_id int not null,
    position int default 0,
    primary key (object_source_id),
    foreign key (object_id) references im_object(object_id),
    foreign key (source_id) references im_source(source_id)
) engine = InnoDB;

-- OBJECT-SOURCE END --

-- OBJECT-IMAGE START --

-- connecting images with section to parallax view on section (m:n relationship), table

create table im_section_image (
    section_image_id int not null auto_increment,
    section_id int not null,
    image_id int not null,
    position int default 0,
    primary key (section_image_id),
    foreign key (section_id) references im_section(section_id),
    foreign key (image_id) references im_image(image_id)
) engine = InnoDB;

-- OBJECT-IMAGE END --

-- OBJECT-SOURCE START --

-- connecting files with object (m:n relationship), table

create table im_object_movie (
    object_movie_id int not null auto_increment,
    object_id int not null,
    movie_id int not null,
    position int default 0,
    primary key (object_movie_id),
    foreign key (object_id) references im_object(object_id),
    foreign key (movie_id) references im_movie(movie_id)
) engine = InnoDB;

-- OBJECT-SOURCE END --

-- CATEGORY START --

-- categorize object in one label, table

create table im_category (
    category_id int not null auto_increment,
    label_id int not null,
    name varchar(64) collate utf8_polish_ci default '',
    content text collate utf8_polish_ci default '',
    position int default 0,
    status varchar(3) default 'on',
    description text collate utf8_polish_ci default '',-- description, management
    date_create datetime,-- create time
    date_modify datetime,-- last modification time
    primary key (category_id),
    foreign key (label_id) references im_label(label_id)
) engine = InnoDB default charset = utf8 collate = utf8_polish_ci;

-- trigger

create trigger im_category_insert_date_create
    before insert on im_category
    for each row
    set new.date_create = now();

create trigger im_category_insert_date_modify
    before insert on im_category
    for each row
    set new.date_modify = now();

create trigger im_category_update_date_modify
    before update on im_category
    for each row
    set new.date_modify = now();

-- CATEGORY END --

-- OBJECT-CATEGORY START --

-- categorized label, objects connected to label (m:n relationship), table

create table im_object_category (
    object_category_id int not null auto_increment,
    object_id int not null,
    category_id int not null,
    primary key (object_category_id),
    foreign key (object_id) references im_object(object_id),
    foreign key (category_id) references im_category(category_id)
) engine = InnoDB;

-- OBJECT-CATEGORY END --

-- SETTING START --

-- table

create table im_setting (
    setting_id int not null auto_increment,
    name varchar(128) collate utf8_polish_ci default '',
    system_name varchar(128) collate utf8_polish_ci default '',
    content text collate utf8_polish_ci default '',
    description text collate utf8_polish_ci default '',-- description, management
    date_create datetime,-- create time
    date_modify datetime,-- last modification time
    primary key (setting_id)
) engine = InnoDB default charset = utf8 collate = utf8_polish_ci;

-- trigger

create trigger im_setting_insert_date_create
    before insert on im_setting
    for each row
    set new.date_create = now();

create trigger im_setting_insert_date_modify
    before insert on im_setting
    for each row
    set new.date_modify = now();

create trigger im_setting_update_date_modify
    before update on im_setting
    for each row
    set new.date_modify = now();

-- SETTING END --

-- LANGUAGE (DEFINITION) START --

-- table

create table im_language (
    language_id int not null auto_increment,
    name varchar(128) collate utf8_polish_ci default '',
    system_name varchar(4) collate utf8_polish_ci default '',
    url varchar(128) collate utf8_polish_ci default '',-- flag of language
    position int default 0,
    status_default varchar(3) default 'off',
    status varchar(3) default 'on',
    description text collate utf8_polish_ci default '',-- description, management
    date_create datetime,-- create time
    date_modify datetime,-- last modification time
    primary key (language_id)
) engine = InnoDB default charset = utf8 collate = utf8_polish_ci;

-- trigger

create trigger im_language_insert_date_create
    before insert on im_language
    for each row
    set new.date_create = now();

create trigger im_language_insert_date_modify
    before insert on im_language
    for each row
    set new.date_modify = now();

create trigger im_language_update_date_modify
    before update on im_language
    for each row
    set new.date_modify = now();

-- LANGUAGE END --

-- TRANSLATION SYSTEM START --

-- translations in code each system, table

create table im_translation_system (
    translation_system_id int not null auto_increment,
    language_id int not null,
    name varchar(128) collate utf8_polish_ci default '',-- name to human
    system_name varchar(32) collate utf8_polish_ci default '',-- var name in code
    content text collate utf8_polish_ci default '',-- translation
    description text collate utf8_polish_ci default '',-- description, management
    date_create datetime,-- create time
    date_modify datetime,-- last modification time
    primary key (translation_system_id),
    foreign key (language_id) references im_language(language_id)
) engine = InnoDB default charset = utf8 collate = utf8_polish_ci;

-- trigger

create trigger im_translation_system_insert_date_create
    before insert on im_translation_system
    for each row
    set new.date_create = now();

create trigger im_translation_system_insert_date_modify
    before insert on im_translation_system
    for each row
    set new.date_modify = now();

create trigger im_translation_system_update_date_modify
    before update on im_translation_system
    for each row
    set new.date_modify = now();

-- TRANSLATION SYSTEM END --

-- TRANSLATION SYSTEM START --

-- translations everything from database, [table, column, id] - identify field to translate, table

create table im_translation (
    translation_id int not null auto_increment,
    language_id int not null,
    name varchar(128) collate utf8_polish_ci default '',-- name to human
    target_table varchar(32) collate utf8_polish_ci default '',-- name of table (string)
    target_column varchar(32) collate utf8_polish_ci default '',-- name of column in table (string)
    target_record int not null,-- record in table (int)
    content text collate utf8_polish_ci default '',-- translation
    description text collate utf8_polish_ci default '',-- description, management
    date_create datetime,-- create time
    date_modify datetime,-- last modification time
    primary key (translation_id),
    foreign key (language_id) references im_language(language_id)
) engine = InnoDB default charset = utf8 collate = utf8_polish_ci;

-- trigger

create trigger im_translation_insert_date_create
    before insert on im_translation
    for each row
    set new.date_create = now();

create trigger im_translation_insert_date_modify
    before insert on im_translation
    for each row
    set new.date_modify = now();

create trigger im_translation_update_date_modify
    before update on im_translation
    for each row
    set new.date_modify = now();

-- TRANSLATION SYSTEM END --

-- FORM MESSAGE START --

-- send message via form

create table im_form (
    form_id int not null auto_increment,
    name varchar(128) collate utf8_polish_ci default '',-- name message
    content text collate utf8_polish_ci default '',-- content of message
    email_source varchar(128) collate utf8_polish_ci default '',-- who send
    email_destination varchar(128) collate utf8_polish_ci default '',-- who receive
    description text collate utf8_polish_ci default '',-- description, management
    date_create datetime,-- create time
    primary key (form_id)
) engine = InnoDB default charset = utf8 collate = utf8_polish_ci;

-- trigger

create trigger im_form_insert_date_create
    before insert on im_form
    for each row
    set new.date_create = now();

-- FORM MESSAGE END --

-- INSERT (the same records for all systems) --

-- record, property of type of object

insert into im_property values (null, 'Nazwa', 'name', '', null, null);
insert into im_property values (null, 'Tekst', 'content', '', null, null);
insert into im_property values (null, 'Data', 'date', '', null, null);
insert into im_property values (null, 'Zdjęcie', 'image', '', null, null);
insert into im_property values (null, 'Link wewnętrzny', 'section', '', null, null);
insert into im_property values (null, 'Plik', 'file', '', null, null);
insert into im_property values (null, 'Menu', 'menu', '', null, null);
insert into im_property values (null, 'Link zewnętrzny', 'link', '', null, null);
insert into im_property values (null, 'E-mail', 'email', '', null, null);
insert into im_property values (null, 'Formularz kontaktowy', 'form', '', null, null);
insert into im_property values (null, 'Źródło', 'source', '', null, null);
insert into im_property values (null, 'Ikona', 'icon', '', null, null);
insert into im_property values (null, 'Język', 'language', '', null, null);
insert into im_property values (null, 'Nawigacja okruszkowa', 'breadcrumb', '', null, null);
insert into im_property values (null, 'Film', 'movie', '', null, null);
insert into im_property values (null, 'Mapa', 'map', '', null, null);

-- language definition

insert into im_language values (null, 'Polish language', 'pl', 'pl.png', 1, 'on', 'on', '', null, null);
insert into im_language values (null, 'English language', 'en', 'en.png', 2, 'off', 'on', '', null, null);

-- translation system

insert into im_translation_system values (null, 1,  'All', 'show-all', 'Pokaż wszystko', '', null, null);
insert into im_translation_system values (null, 2,  'All', 'show-all', 'Show all', '', null, null);
insert into im_translation_system values (null, 1,  'No data', 'no-data', 'Brak danych', '', null, null);
insert into im_translation_system values (null, 2,  'No data', 'no-data', 'No data', '', null, null);
insert into im_translation_system values (null, 1,  'Przycisk wyślij', 'send', 'Wyślij', '', null, null);
insert into im_translation_system values (null, 1,  'Nazwa', 'name', 'Nazwa', '', null, null);
insert into im_translation_system values (null, 1,  'Nadawca', 'source', 'Nadawca', '', null, null);
insert into im_translation_system values (null, 2,  'Send button', 'send', 'Send now', '', null, null);
insert into im_translation_system values (null, 2,  'Name', 'name', 'name', '', null, null);
insert into im_translation_system values (null, 2,  'From', 'source', 'from', '', null, null);
insert into im_translation_system values (null, 1,  'Formularz błąd', 'form-error', 'Błąd wysyłania wiadomości', '', null, null);
insert into im_translation_system values (null, 1,  'Formularz poprawny', 'form-ok', 'Wiadomość wysłana', '', null, null);
insert into im_translation_system values (null, 2,  'Form error', 'form-error', 'Error sending form', '', null, null);
insert into im_translation_system values (null, 2,  'Form ok', 'form-ok', 'Form send', '', null, null);
insert into im_translation_system values (null, 1,  'Błąd captcha', 'captcha-error', 'Błąd obrazka', '', null, null);
insert into im_translation_system values (null, 2,  'Captcha error', 'captcha-error', 'Captcha error', '', null, null);
insert into im_translation_system values (null, 1,  'Captcha', 'captcha-text', 'Wpisz znaki', '', null, null);
insert into im_translation_system values (null, 2,  'Captcha', 'captcha-text', 'Insert captcha', '', null, null);