-- record, section

insert into im_section values (null, 0, 'Strona główna', 'strona-glowna', 'fal fa-home', 1, 'on', '', null, null);
insert into im_section values (null, 0, 'Kontakt', 'kontakt', 'fal fa-phone-alt', 2, 'on', '', null, null);
insert into im_section values (null, 2, 'Kontakt 1', 'kontakt-1', '', 1, 'on', '', null, null);
insert into im_section values (null, 2, 'Kontakt 2', 'kontakt-2', '', 2, 'on', '', null, null);

-- record, object label

insert into im_label values (null, 'Aktualności', 'news', '', null, null);
insert into im_label values (null, 'Zalety firmy', 'company-skill', '', null, null);
insert into im_label values (null, 'Slider', 'slider', '', null, null);
insert into im_label values (null, 'Menu', 'menu', '', null, null);
insert into im_label values (null, 'Submenu', 'submenu', '', null, null);

-- record, object type

insert into im_type values (null, 'Aktualność', 'col-12', '', null, null);
insert into im_type values (null, 'Zaleta', 'col-12', '', null, null);
insert into im_type values (null, 'Slider', 'col-12', '', null, null);
insert into im_type values (null, 'Menu', 'col-12', '', null, null);
insert into im_type values (null, 'Submenu', 'col-12', '', null, null);

-- record, property of type of object

insert into im_property values (null, 'Nazwa', 'name', '', null, null);
insert into im_property values (null, 'Tekst', 'content', '', null, null);
insert into im_property values (null, 'Data', 'date', '', null, null);
insert into im_property values (null, 'Zdjęcie', 'image', '', null, null);
insert into im_property values (null, 'Link wewnętrzny', 'section', '', null, null);
insert into im_property values (null, 'Plik', 'file', '', null, null);
insert into im_property values (null, 'Menu', 'menu', '', null, null);
insert into im_property values (null, 'Link zewnętrzny', 'link', '', null, null);
insert into im_property values (null, 'Film', 'movie', '', null, null);

-- record, set property in type

insert into im_type_property values (null, 1, 1, 'col-12 col-sm-6', 'text-right h2', 2);
insert into im_type_property values (null, 1, 2, 'col-12 col-lg-6', '', 3);
insert into im_type_property values (null, 1, 3, 'col-12 col-sm-6', '', 1);
insert into im_type_property values (null, 1, 4, 'col-12 col-lg-6', '', 4);
insert into im_type_property values (null, 1, 5, 'col-12 text-center p-1', 'btn btn-secondary', 6);
insert into im_type_property values (null, 1, 8, 'col-12 text-center p-1', 'btn btn-primary', 7);
insert into im_type_property values (null, 1, 6, 'col-12', 'list-group', 5);

insert into im_type_property values (null, 2, 1, 'col-12', '', 1);
insert into im_type_property values (null, 2, 3, 'col-12', '', 2);

insert into im_type_property values (null, 3, 4, 'col-12', '', 1);

insert into im_type_property values (null, 4, 7, 'col-12', 'navbar navbar-expand-lg navbar-light bg-light', 1);

insert into im_type_property values (null, 5, 7, 'col-12', 'navbar navbar-dark', 1);

-- record, object

insert into im_object values (null, 1, 1, 2, 'Aktualność pierwsza na stronie głównej (prowadzi do sekcji "kontakt")', '', '', '', 1, 'on', '', null, null, null);
insert into im_object values (null, 1, 1, 0, 'Aktualność druga na stronie głównej', '', '', '', 2, 'on', '', null, null, null);
insert into im_object values (null, 2, 2, 0, 'Atrybut firmy na stronie głównej', '', '', '', 1, 'on', '', null, null, null);
insert into im_object values (null, 1, 1, 0, 'Aktualność na stronie kontakt', '', '', '', 3, 'on', '', null, null, null);
insert into im_object values (null, 2, 2, 0, 'Atrybut firmy na stronie głównej, kontakt', '', '', '', 2, 'on', '', null, null, null);
insert into im_object values (null, 2, 2, 0, 'Atrybut firmy na stronie głównej, kontakt', '', '', '', 3, 'on', '', null, null, null);
insert into im_object values (null, 3, 3, 0, 'Slider', '', '', '', 1, 'on', '', null, null, null);
insert into im_object values (null, 4, 4, 0, 'Menu', '', '', '', 1, 'on', '', null, null, null);
insert into im_object values (null, 5, 5, 0, 'Submenu', '', '', '', 1, 'on', '', null, null, null);

-- record, object image

insert into im_image values (null, 'Moon', 'What are you doing?', '1.jpg', '', 'on', '', null, null);
insert into im_image values (null, 'Winter tree', '', '2.jpg', '', 'on', '', null, null);
insert into im_image values (null, 'Cactuars', '', '3.jpg', '', 'on', '', null, null);
insert into im_image values (null, 'First slider', 'Content of first slider', 'slider-1.jpg', '', 'on', '', null, null);
insert into im_image values (null, 'Second slider', 'Content of second slider', 'slider-2.jpg', '', 'on', '', null, null);
insert into im_image values (null, 'Third slider', '', 'slider-3.jpg', '', 'on', '', null, null);

-- record, object file

insert into im_file values (null, 'Moon', '(description moon file)', '1.jpg', 'on', '', null, null);
insert into im_file values (null, 'Winter tree', '', '2.jpg', 'on', '', null, null);
insert into im_file values (null, 'Cactuars', '', '3.jpg', 'on', '', null, null);

-- record, connect object with section

insert into im_section_object values (null, 1, 1);
insert into im_section_object values (null, 1, 2);
insert into im_section_object values (null, 1, 3);
insert into im_section_object values (null, 2, 4);
insert into im_section_object values (null, 1, 5);
insert into im_section_object values (null, 2, 5);
insert into im_section_object values (null, 1, 6);
insert into im_section_object values (null, 2, 6);
insert into im_section_object values (null, 1, 7);
insert into im_section_object values (null, 1, 8);
insert into im_section_object values (null, 2, 7);
insert into im_section_object values (null, 2, 9);
insert into im_section_object values (null, 2, 8);

-- record, label class in section

insert into im_section_label values (null, 2, 'slider', 'col-sm-8 col-md-10 d-none d-sm-block');
insert into im_section_label values (null, 2, 'submenu', 'col-12 col-sm-4 col-md-2');
insert into im_section_label values (null, 0, 'news', 'col-6');
insert into im_section_label values (null, 0, 'company-skill', 'col-6');

-- record, connect images with object

insert into im_object_image values (null, 1, 1, 1);
insert into im_object_image values (null, 1, 2, 2);

insert into im_object_image values (null, 4, 2, 1);
insert into im_object_image values (null, 4, 3, 2);

insert into im_object_image values (null, 7, 4, 1);
insert into im_object_image values (null, 7, 5, 2);
insert into im_object_image values (null, 7, 6, 3);

insert into im_object_file values (null, 1, 1, 1);
insert into im_object_file values (null, 1, 2, 2);
insert into im_object_file values (null, 1, 3, 3);

insert into im_object_file values (null, 2, 2, 1);

insert into im_category values (null, 1, 'Newest news', '', 1, 'on', '', null, null);
insert into im_category values (null, 2, 'Only two attributes', '', 1, 'on', '', null, null);
insert into im_category values (null, 2, 'Only third attribute', '', 2, 'on', '', null, null);

insert into im_object_category values (null, 1, 1);
insert into im_object_category values (null, 3, 2);
insert into im_object_category values (null, 5, 2);
insert into im_object_category values (null, 6, 3);

insert into im_setting values (null, 'System name', 'name', 'IM-CMS Engine', '', null, null);
insert into im_setting values (null, 'Logo', 'logo', 'logo.png', '', null, null);

insert into im_language values (null, 'Polish language', 'pl', 'pl.png', 1, 'on', 'on', '', null, null);
insert into im_language values (null, 'English language', 'en', 'en.png', 2, 'off', 'on', '', null, null);

insert into im_translation_system values (null, 1,  'All', 'show-all', 'Pokaż wszystko', '', null, null);
insert into im_translation_system values (null, 2,  'All', 'show-all', 'Show all', '', null, null);
insert into im_translation_system values (null, 1,  'More', 'more', 'Więcej...', '', null, null);
insert into im_translation_system values (null, 2,  'More', 'more', 'More...', '', null, null);
insert into im_translation_system values (null, 1,  'No data', 'no-data', 'Brak danych', '', null, null);
insert into im_translation_system values (null, 2,  'No data', 'no-data', 'No data', '', null, null);

insert into im_translation values (null, 2,  'First news', 'im_object', 'name', 1, 'First news on the main page', '', null, null);
insert into im_translation values (null, 2,  'Second news', 'im_object', 'name', 2, 'Second news on the main page', '', null, null);
insert into im_translation values (null, 2,  'In english image', 'im_image', 'content', 1, 'What are you doing in english really', '', null, null);
insert into im_translation values (null, 2,  'In english file', 'im_file', 'name', 1, 'Moon in english', '', null, null);
insert into im_translation values (null, 2,  'Back to home', 'im_section', 'name', 1, 'Home', '', null, null);