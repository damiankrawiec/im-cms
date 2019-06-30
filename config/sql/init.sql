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

drop table if exists im_object_image;

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

-- end prepare database --

set names utf8;

-- SECTION START --

-- table

create table im_section (
    section_id int not null auto_increment,
    parent int default 0,-- parent, when 0 then root section
    name varchar(128) collate utf8_polish_ci default '',
    url varchar(128) default '',-- url name, like as name, it could be change
    position int default 0,
    status varchar(3) default 'on',
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
    section_id int default 0,-- direction to section, 0 - not direction (this in not foreign key)
    name varchar(128) collate utf8_polish_ci default '',
    content text collate utf8_polish_ci default '',
    status varchar(3) default 'on',
    description text collate utf8_polish_ci default '',-- description, management
    date date ,-- date to display
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
    position int default 0,
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
    position int default 0,
    primary key (type_property_id),
    foreign key (type_id) references im_type(type_id),
    foreign key (property_id) references im_property(property_id)
) engine = InnoDB;

-- TYPE-PROPERTY END --

-- IMAGE START --

-- table

create table im_image (
    image_id int not null auto_increment,
    name varchar(64) collate utf8_polish_ci default '',
    content varchar(128) collate utf8_polish_ci default '',
    url varchar(128) collate utf8_polish_ci default '',
    link varchar(128) collate utf8_polish_ci default '',-- direction url or display bigger image
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