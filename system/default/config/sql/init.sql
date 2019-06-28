-- record, section

insert into im_section values (null, 0, 'Strona główna', 'strona-glowna', 1, 'on', '', null, null);
insert into im_section values (null, 0, 'Kontakt', 'kontakt', 2, 'on', '', null, null);

-- record, object label

insert into im_label values (null, 'Aktualności', 'news', '', null, null);
insert into im_label values (null, 'Zalety firmy', 'company-skill', '', null, null);
insert into im_label values (null, 'Banner', 'slider', '', null, null);

-- record, object type

insert into im_type values (null, 'Aktualność', 'col-12 col-sm-6', '', null, null);
insert into im_type values (null, 'Zaleta', 'col-12 col-md-4', '', null, null);
insert into im_type values (null, 'Banner', 'col-12', '', null, null);

-- record, property of type of object

insert into im_property values (null, 'Nazwa', 'name', '', null, null);
insert into im_property values (null, 'Tekst', 'text', '', null, null);
insert into im_property values (null, 'Data', 'date', '', null, null);
insert into im_property values (null, 'Zdjęcia', 'image', '', null, null);

-- record, object

insert into im_object values (null, 1, 1, 0, 'Aktualność pierwsza na stronie głównej', 'Treść tej aktualności', 'on', '', null, null, null);

insert into im_object values (null, 1, 1, 0, 'Aktualność druga na stronie głównej', 'Treść tej aktualności', 'on', '', null, null, null);

insert into im_object values (null, 2, 2, 0, 'Atrybut firmy na stronie głównej', 'Treść atrybutu', 'on', '', null, null, null);

insert into im_object values (null, 1, 1, 0, 'Aktualność na stronie kontakt', 'Treść kolejnej aktualności', 'on', '', null, null, null);

insert into im_object values (null, 2, 2, 0, 'Atrybut firmy na stronie głównej (drugi) lub kontakt (pierwszy)', 'Treść atrybutu drugiego', 'on', '', null, null, null);

insert into im_object values (null, 2, 2, 0, 'Atrybut firmy na stronie głównej (trzeci) lub kontakt (drugi)', 'Treść atrybutu drugiego', 'on', '', null, null, null);

insert into im_object values (null, 3, 3, 0, 'Slider', '', 'on', '', null, null, null);

-- record, object image

insert into im_image values (null, 'Moon', 'What are you doing?', '1.jpg', 'on', '', null, null);

insert into im_image values (null, 'Winter tree', '', '2.jpg', 'on', '', null, null);

insert into im_image values (null, 'Cactuars', '', '3.jpg', 'on', '', null, null);

insert into im_image values (null, 'First slider', 'Content of first slider', 'slider-1.jpg', 'on', '', null, null);

insert into im_image values (null, 'Second slider', 'Content of second slider', 'slider-2.jpg', 'on', '', null, null);

insert into im_image values (null, 'Third slider', '', 'slider-3.jpg', 'on', '', null, null);

-- record, connect object with section

insert into im_section_object values (null, 1, 1, 1);

insert into im_section_object values (null, 1, 2, 2);

insert into im_section_object values (null, 1, 3, 3);

insert into im_section_object values (null, 2, 4, 1);

insert into im_section_object values (null, 1, 5, 4);

insert into im_section_object values (null, 2, 5, 2);

insert into im_section_object values (null, 1, 6, 5);

insert into im_section_object values (null, 2, 6, 3);

insert into im_section_object values (null, 1, 7, 1);

-- record, set property in type

insert into im_type_property values (null, 1, 1, 'col-12 col-sm-6', 2);
insert into im_type_property values (null, 1, 2, 'col-12 col-lg-6', 3);
insert into im_type_property values (null, 1, 3, 'col-12 col-sm-6', 1);
insert into im_type_property values (null, 1, 4, 'col-12 col-lg-6', 4);

insert into im_type_property values (null, 2, 1, 'col-12', 1);
insert into im_type_property values (null, 2, 3, 'col-12', 2);

insert into im_type_property values (null, 3, 4, 'col-12', 1);

-- record, connect images with object

insert into im_object_image values (null, 1, 1, 1);
insert into im_object_image values (null, 1, 2, 2);

insert into im_object_image values (null, 4, 2, 1);
insert into im_object_image values (null, 4, 3, 2);

insert into im_object_image values (null, 7, 4, 1);
insert into im_object_image values (null, 7, 5, 2);
insert into im_object_image values (null, 7, 6, 3);