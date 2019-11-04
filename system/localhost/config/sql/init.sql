-- record, section

insert into im_section values (null, 0, 'Strona główna', 'strona-glowna', 'Opis strony głównej', 'fad fa-home-heart', 1, 'on', '', null, null);
insert into im_section values (null, 0, 'Galeria zdjęć', 'galeria-zdjec', 'Opis galerii zdjęć', 'fad fa-camera-alt', 2, 'on', '', null, null);
insert into im_section values (null, 0, 'Wydarzenia muzyczne', 'wydarzenia-muzyczne', 'Opis wydarzeń muzycznych', 'fad fa-drum', 3, 'on', '', null, null);
insert into im_section values (null, 3, 'Koncerty', 'koncerty', 'Opis koncertowy', 'fad fa-guitar', 1, 'on', '', null, null);
insert into im_section values (null, 3, 'Eventy okolicznościowe', 'eventy-okolicznosciowe', '', 'fad fa-camera-alt', 2, 'on', '', null, null);
insert into im_section values (null, 3, 'Wydarzenia muzyczne', 'wydarzenia-muzyczne', '', 'fad fa-sliders-v-square', 3, 'on', '', null, null);
insert into im_section values (null, 3, 'Dyskoteki', 'dyskoteki', '', 'fad fa-headphones-alt', 3, 'on', '', null, null);

-- record, object label

insert into im_label values (null, 'Ostatnie wydarzenia', 'last-events', '', null, null);
insert into im_label values (null, 'Slider', 'slider', '', null, null);
insert into im_label values (null, 'Menu', 'menu', '', null, null);
insert into im_label values (null, 'Najbliższe wydarzenie', 'soon-one-event', '', null, null);

-- record, object type

insert into im_type values (null, 'Ostatnie wydarzenia', 'col-12', '', null, null);
insert into im_type values (null, 'Slider', 'col-12', '', null, null);
insert into im_type values (null, 'Menu', 'col-12', '', null, null);
insert into im_type values (null, 'Najbliższe wydarzenie', 'col-12', '', null, null);

-- record, property of type of object (the same on every domain system)

insert into im_property values (null, 'Nazwa', 'name', '', null, null);
insert into im_property values (null, 'Tekst', 'content', '', null, null);
insert into im_property values (null, 'Data', 'date', '', null, null);
insert into im_property values (null, 'Zdjęcie', 'image', '', null, null);
insert into im_property values (null, 'Link wewnętrzny', 'section', '', null, null);
insert into im_property values (null, 'Plik', 'file', '', null, null);
insert into im_property values (null, 'Menu', 'menu', '', null, null);
insert into im_property values (null, 'Link zewnętrzny', 'link', '', null, null);
insert into im_property values (null, 'Adres e-mail', 'email', '', null, null);
insert into im_property values (null, 'Film', 'movie', '', null, null);

-- record, set property in type

insert into im_type_property values (null, 1, 1, 'col-12', 'h2', 2, '', null, null);
insert into im_type_property values (null, 1, 2, 'col-12', '', 4, '', null, null);
insert into im_type_property values (null, 1, 3, 'col-12', '', 1, '', null, null);
insert into im_type_property values (null, 1, 4, 'col-12', '', 3, '', null, null);
insert into im_type_property values (null, 1, 8, 'col-12', '', 5, '', null, null);

insert into im_type_property values (null, 4, 1, 'col-12', 'h4', 2, '', null, null);
insert into im_type_property values (null, 4, 3, 'col-12', '', 1, '', null, null);
insert into im_type_property values (null, 4, 4, 'col-12', '', 3, '', null, null);
insert into im_type_property values (null, 4, 2, 'col-12 text-justify', '', 4, '', null, null);

insert into im_type_property values (null, 2, 4, 'col-12', '', 1, '', null, null);

insert into im_type_property values (null, 3, 7, 'col-12', 'navbar navbar-expand-lg navbar-dark bg-dark', 1, '', null, null);

-- record, object

insert into im_object values (null, 4, 4, 0, 'Najbliższe wydarzenie', '', '', '', '', 1, 'on', '', null, null, null);
insert into im_object values (null, 1, 1, 0, 'Impreza 1', '', '', '', '', 1, 'on', '', null, null, null);
insert into im_object values (null, 1, 1, 0, 'Impreza 2', '', '', '', '', 2, 'on', '', null, null, null);
insert into im_object values (null, 1, 1, 0, 'Impreza 3', '', '', '', '', 3, 'on', '', null, null, null);
insert into im_object values (null, 1, 1, 0, 'Impreza 4', '', '', '', '', 4, 'on', '', null, null, null);
insert into im_object values (null, 2, 2, 0, 'Slider', '', '', '', '', 1, 'on', '', null, null, null);
insert into im_object values (null, 3, 3, 0, 'Menu', '', '', '', '', 1, 'on', '', null, null, null);

-- record, object image

insert into im_image values (null, 0, 'Equalizer?', 'Frequency music', '1.jpg', 'on', '', null, null);
insert into im_image values (null, 0, 'Vinyl classic', 'Classic form of listening music', '2.jpg', 'on', '', null, null);
insert into im_image values (null, 0, 'Type of headphones', '', '3.jpg', 'on', '', null, null);
insert into im_image values (null, 0, 'Sheet music', '', '4.jpg', 'on', '', null, null);

-- record, object movie

insert into im_movie values (null, 'Dancing', '<iframe width="100%" height="315" src="https://www.youtube.com/embed/y2voZ3BH3L0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>', 'https://www.youtube.com/watch?v=y2voZ3BH3L0', 'on', '', null, null);

-- record, connect object with section

insert into im_section_object values (null, 1, 1);
insert into im_section_object values (null, 1, 2);
insert into im_section_object values (null, 1, 3);
insert into im_section_object values (null, 1, 4);
insert into im_section_object values (null, 1, 5);
insert into im_section_object values (null, 1, 6);
insert into im_section_object values (null, 1, 7);

-- record, label class in section

insert into im_label_section values (null, 2, 1, 'col-sm-8 col-md-10 d-none d-sm-block', '', null, null);
insert into im_label_section values (null, 4, 1, 'col-12 col-sm-4 col-md-2', '', null, null);

-- record, connect images with object

insert into im_object_image values (null, 1, 3, 1);

insert into im_object_image values (null, 2, 3, 1);
insert into im_object_image values (null, 2, 2, 2);

insert into im_object_image values (null, 3, 2, 1);

insert into im_object_image values (null, 4, 3, 1);

insert into im_object_image values (null, 5, 4, 1);

insert into im_object_image values (null, 6, 1, 3);
insert into im_object_image values (null, 6, 2, 1);
insert into im_object_image values (null, 6, 3, 1);

-- record, connect movies with object

insert into im_object_movie values (null, 2, 1, 1);

insert into im_setting values (null, 'Music/Event service', 'name', 'IM-CMS Engine', '', null, null);
insert into im_setting values (null, 'Logo', 'logo', 'logo.png', '', null, null);

insert into im_language values (null, 'Polish language', 'pl', 'pl.png', 1, 'on', 'on', '', null, null);
insert into im_language values (null, 'English language', 'en', 'en.png', 2, 'off', 'on', '', null, null);

insert into im_translation_system values (null, 1,  'All', 'show-all', 'Pokaż wszystko', '', null, null);
insert into im_translation_system values (null, 2,  'All', 'show-all', 'Show all', '', null, null);
insert into im_translation_system values (null, 1,  'More', 'more', 'Więcej...', '', null, null);
insert into im_translation_system values (null, 2,  'More', 'more', 'More...', '', null, null);
insert into im_translation_system values (null, 1,  'No data', 'no-data', 'Brak danych', '', null, null);
insert into im_translation_system values (null, 2,  'No data', 'no-data', 'No data', '', null, null);

insert into im_translation values (null, 2,  'Back to home', 'im_section', 'name', 1, 'Home', '', null, null);
insert into im_translation values (null, 2,  'Dance floor', 'im_section', 'name', 7, 'Dance floor', '', null, null);