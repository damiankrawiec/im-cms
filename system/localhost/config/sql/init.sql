-- record, section

insert into im_section values (null, 0, 'Strona główna', '', 'strona-glowna', 'Opis strony głównej', 'fad fa-home-heart', '', '', 1, 'on', 'off', 'off', 'off', 'on', '', null, null);
insert into im_section values (null, 0, 'Galeria zdjęć', '', 'galeria-zdjec', 'Opis galerii zdjęć', 'fad fa-camera-alt', '', '', 2, 'on', 'off', 'off', 'off', 'on', '', null, null);
insert into im_section values (null, 0, 'Wydarzenia muzyczne', '', 'wydarzenia-muzyczne', 'Opis wydarzeń muzycznych', 'fad fa-drum', '', '', 3, 'on', 'off', 'off', 'off', 'on', '', null, null);
insert into im_section values (null, 3, 'Koncerty', '', 'koncerty', 'Opis koncertowy', 'fad fa-guitar', '', '', 1, 'on', 'off', 'off', 'off', 'on', '', null, null);
insert into im_section values (null, 3, 'Eventy okolicznościowe', '', 'eventy-okolicznosciowe', '', 'fad fa-camera-alt', '', '', 2, 'on', 'off', 'off', 'off', 'on', '', null, null);
insert into im_section values (null, 3, 'Wydarzenia muzyczne', '', 'wydarzenia-muzyczne', '', 'fad fa-sliders-v-square', '', '', 3, 'on', 'off', 'off', 'off', 'on', '', null, null);
insert into im_section values (null, 3, 'Dyskoteki', '', 'dyskoteki', '', 'fad fa-headphones-alt', '', '', 3, 'on', 'off', 'off', 'off', 'on', '', null, null);

-- record, object label

insert into im_label values (null, 'Ostatnie wydarzenia', 'last-events', '', '', null, null);
insert into im_label values (null, 'Slider', 'slider', '', '', null, null);
insert into im_label values (null, 'Menu', 'menu', '', '', null, null);
insert into im_label values (null, 'Najbliższe wydarzenie', 'soon-one-event', '', '', null, null);
insert into im_label values (null, 'Języki', 'language', '', '', null, null);
insert into im_label values (null, 'Ciasteczka', 'cookie', '', '', null, null);
insert into im_label values (null, 'Nawigacja okruszkowa', 'breadcrumb', '', '', null, null);
insert into im_label values (null, 'Film', 'movie', '', '', null, null);
insert into im_label values (null, 'Mapa', 'map', '', '', null, null);

-- record, object type

insert into im_type values (null, 'Ostatnie wydarzenia', 'col-12', 'on', '', null, null);
insert into im_type values (null, 'Slider', 'col-12', 'on', '', null, null);
insert into im_type values (null, 'Menu', 'col-12', 'on', '', null, null);
insert into im_type values (null, 'Najbliższe wydarzenie', 'col-12', 'on', '', null, null);
insert into im_type values (null, 'Języki', 'col-12', 'on', '', null, null);
insert into im_type values (null, 'Ciasteczka', 'col-12', 'on', '', null, null);
insert into im_type values (null, 'Nawigacja okruszkowa', 'col-12', 'on', '', null, null);
insert into im_type values (null, 'Film', 'col-12', 'on', '', null, null);
insert into im_type values (null, 'Mapa', 'col-12', 'on', '', null, null);

-- record, set property in type

insert into im_type_property values (null, 1, 1, 'col-12', 'h2', 2, 'on', '', null, null);
insert into im_type_property values (null, 1, 2, 'col-12', '', 4, 'on', '', null, null);
insert into im_type_property values (null, 1, 3, 'col-12', '', 1, 'on', '', null, null);
insert into im_type_property values (null, 1, 4, 'col-12', '', 3, 'on', '', null, null);
insert into im_type_property values (null, 1, 8, 'col-12', '', 5, 'on', '', null, null);

insert into im_type_property values (null, 4, 1, 'col-12', 'h4', 2, 'on', '', null, null);
insert into im_type_property values (null, 4, 3, 'col-12', '', 1, 'on', '', null, null);
insert into im_type_property values (null, 4, 4, 'col-12', '', 3, 'on', '', null, null);
insert into im_type_property values (null, 4, 2, 'col-12 text-justify', '', 4, 'on', '', null, null);

insert into im_type_property values (null, 2, 4, 'col-12', '', 1, 'on', '', null, null);

insert into im_type_property values (null, 3, 7, 'col-12', 'navbar navbar-expand-lg navbar-dark bg-dark', 1, 'on', '', null, null);

insert into im_type_property values (null, 5, 13, 'col-12', '', 1, 'on', '', null, null);

insert into im_type_property values (null, 6, 2, 'col-12', '', 1, 'on', '', null, null);

insert into im_type_property values (null, 7, 14, 'col-12', '', 1, 'on', '', null, null);

insert into im_type_property values (null, 8, 15, 'col-12', '', 1, 'on', '', null, null);

insert into im_type_property values (null, 9, 16, 'col-12', '', 1, 'on', '', null, null);


-- record, object

insert into im_object values (null, 4, 4, 0, '', 'Najbliższe wydarzenie', '', '', '', '', '', '', '', '', '', 1, 'on', 'off', '', null, null, null);
insert into im_object values (null, 1, 1, 0, '', 'Impreza 1', '', '', '', '', '', '', '', '', '', 1, 'on', 'off', '', null, null, null);
insert into im_object values (null, 1, 1, 0, '', 'Impreza 2', '', '', '', '', '', '', '', '', '', 2, 'on', 'off', '', null, null, null);
insert into im_object values (null, 1, 1, 0, '', 'Impreza 3', '', '', '', '', '', '', '', '', '', 3, 'on', 'off', '', null, null, null);
insert into im_object values (null, 1, 1, 0, '', 'Impreza 4', '', '', '', '', '', '', '', '', '', 4, 'on', 'off', '', null, null, null);
insert into im_object values (null, 2, 2, 0, '', 'Slider', '', '', '', '', '', '', '', '', '', 1, 'on', 'off', '', null, null, null);
insert into im_object values (null, 3, 3, 0, '', 'Menu', '', '', '', '', '', '', '', '', '', 1, 'on', 'off', '', null, null, null);
insert into im_object values (null, 5, 5, 0, '', 'Języki', '', '', '', '', '', '', '', '', '', 1, 'on', 'off', '', null, null, null);
insert into im_object values (null, 6, 6, 0, '', 'Ciasteczka', '', '<div id="cookie"><i class="fad fa-cookie fa-2x float-left m-1"></i> Przeglądając niniejszy serwis internetowy, akceptujesz pliki cookies zgodnie z ustawieniami przeglądarki <button class="btn btn-dark">OK</button></div>', '', '', '', '', '', '', '', 1, 'on', 'off', '', null, null, null);
insert into im_object values (null, 7, 7, 0, '', 'Menu', '', '', '', '', '', '', '', '', '', 1, 'on', 'off', '', null, null, null);
insert into im_object values (null, 8, 8, 0, '', 'Film', '', '', '', '', '', '', '', '', '', 1, 'on', 'off', '', null, null, null);
insert into im_object values (null, 9, 9, 0, '', 'Mapa', '', '', '', '', '', '', '', '', '', 1, 'on', 'off', '', null, null, null);

-- record, object image

insert into im_image values (null, 0, 'Equalizer?', 'Frequency music', '1.jpg', 'on', '', null, null);
insert into im_image values (null, 0, 'Vinyl classic', 'Classic form of listening music', '2.jpg', 'on', '', null, null);
insert into im_image values (null, 0, 'Type of headphones', '', '3.jpg', 'on', '', null, null);
insert into im_image values (null, 0, 'Sheet music', '', '4.jpg', 'on', '', null, null);

-- record, object source

insert into im_source values (null, 'Dancing', '<iframe width="100%" height="315" src="https://www.youtube.com/embed/y2voZ3BH3L0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>', 'https://www.youtube.com/watch?v=y2voZ3BH3L0', 'on', '', null, null);

-- record, connect object with section

insert into im_section_object values (null, 1, 1);
insert into im_section_object values (null, 1, 2);
insert into im_section_object values (null, 1, 3);
insert into im_section_object values (null, 1, 4);
insert into im_section_object values (null, 1, 5);
insert into im_section_object values (null, 1, 6);
insert into im_section_object values (null, 1, 7);
insert into im_section_object values (null, 1, 8);
insert into im_section_object values (null, 1, 9);
insert into im_section_object values (null, 1, 10);
insert into im_section_object values (null, 1, 11);
insert into im_section_object values (null, 1, 12);

-- record, label class in section

insert into im_label_section values (null, 2, 1, 'col-sm-8 col-md-10 d-none d-sm-block', '', '', null, null);
insert into im_label_section values (null, 4, 1, 'col-12 col-sm-4 col-md-2', '', '', null, null);

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

-- record, connect source with object

insert into im_object_source values (null, 2, 1, 1);

insert into im_setting values (null, 'Music/Event service', 'name', 'IM-CMS Engine', '', null, null);
insert into im_setting values (null, 'Favicon', 'favicon', 'favicon.png', '', null, null);
insert into im_setting values (null, 'Font', 'font', 'Lato', '', null, null);
insert into im_setting values (null, 'Font size', 'font-size', '15px', '', null, null);
insert into im_setting values (null, 'Google API', 'google-api', '', '', null, null);
insert into im_setting values (null, 'Style map', 'map-style', '', '', null, null);
insert into im_setting values (null, 'Footer class', 'class-footer', 'animated slideInUp', '', null, null);
insert into im_setting values (null, 'Loading page', 'loading-page', 'background: #000;|top:30%;|color:#fff;font-size: 150px;|fad fa-spinner-third fa-spin|fadeOutUp|1000', 'Background style, icon box style, icon style, icon class, animation, visible time', null, null);

insert into im_translation values (null, 2,  'Back to home', 'im_section', 'name', 1, 'Home', '', null, null);
insert into im_translation values (null, 2,  'Dance floor', 'im_section', 'name', 7, 'Dance floor', '', null, null);