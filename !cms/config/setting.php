<?php
//System name in all system structure
$s_systemName = 'IM.CMS';
$s_permittedImage = 'jpg,jpeg,png,gif';
$s_previewImage = '200px';
//Dashboard definitions, there should be 6, 9, 12...elements (max: col-md-4), direct to edit
$s_dashboard = array(
    array('name' => $translation['dashboard']['section'], 'icon' => $icon['menu']['section'], 'table' => 'im_section', 'title' => 'name', 'field' => 'parent'),
    array('name' => $translation['dashboard']['object'], 'icon' => $icon['menu']['object'], 'table' => 'im_object', 'title' => 'system_name as name', 'field' => 'type_id'),
    array('name' => $translation['dashboard']['setting'], 'icon' => $icon['menu']['setting'], 'table' => 'im_setting', 'title' => 'name'),
    array('name' => $translation['dashboard']['category'], 'icon' => $icon['menu']['category'], 'table' => 'im_category', 'title' => 'name', 'field' => 'label_id'),
    array('name' => $translation['dashboard']['type'], 'icon' => $icon['menu']['type'], 'table' => 'im_type', 'title' => 'name'),
    array('name' => $translation['dashboard']['label'], 'icon' => $icon['menu']['label'], 'table' => 'im_label', 'title' => 'name'),
    array('name' => $translation['dashboard']['image'], 'icon' => $icon['menu']['image'], 'table' => 'im_image', 'title' => 'name'),
    array('name' => $translation['dashboard']['file'], 'icon' => $icon['menu']['file'], 'table' => 'im_file', 'title' => 'name'),
    array('name' => $translation['dashboard']['movie'], 'icon' => $icon['menu']['movie'], 'table' => 'im_movie', 'title' => 'name')
);
//In what table can be translate in other languages
$s_translationTable = array('im_object', 'im_section', 'im_category', 'im_image', 'im_file', 'im_movie');
//If 'submenu' is string, that mean it is the name of table from database, and data will generated dynamic
//If 'submenu' is array, that mean it is data from this array
//If submenu is exists, that mean the url index is no need
$s_menuDefinition = array(
    'dashboard' => array('icon' => $icon['menu']['dashboard'], 'name' => $translation['menu']['dashboard'], 'url' => 'dashboard'),
    'section' => array('icon' => $icon['menu']['section'], 'name' => $translation['menu']['section'], 'url' => 'section,0'),
    'object' => array('icon' => $icon['menu']['object'], 'name' => $translation['menu']['object'], 'submenu' => 'im_type'),
    'type-property' => array('icon' => $icon['menu']['type-property'], 'name' => $translation['menu']['type-property'], 'submenu' => 'im_type'),
    'definition-object' => array('icon' => $icon['menu']['definition-object'], 'name' => $translation['menu']['definition-object'],
        'submenu' => array(
            array('icon' => $icon['menu']['type'], 'name' => $translation['menu']['type'], 'url' => 'type'),
            array('icon' => $icon['menu']['label'], 'name' => $translation['menu']['label'], 'url' => 'label'),
            array('icon' => $icon['menu']['category'], 'name' => $translation['menu']['category'], 'url' => 'category,0')
        )
    ),
    'property' => array('icon' => $icon['menu']['property'], 'name' => $translation['menu']['property'], 'url' => 'property'),
    'multimedia' => array('icon' => $icon['menu']['multimedia'], 'name' => $translation['menu']['multimedia'],
        'submenu' => array(
            array('icon' => $icon['menu']['image'], 'name' => $translation['menu']['image'], 'url' => 'image'),
            array('icon' => $icon['menu']['file'], 'name' => $translation['menu']['file'], 'url' => 'file'),
            array('icon' => $icon['menu']['movie'], 'name' => $translation['menu']['movie'], 'url' => 'movie')
        )
    ),
    'language' => array('icon' => $icon['menu']['language'], 'name' => $translation['menu']['language'],
        'submenu' => array(
            array('icon' => $icon['menu']['definition'], 'name' => $translation['menu']['definition'], 'url' => 'language'),
            array('icon' => $icon['menu']['translation'], 'name' => $translation['menu']['translation-system'], 'url' => 'translation-system,0')
        )
    ),
    'setting' => array('icon' => $icon['menu']['setting'], 'name' => $translation['menu']['setting'], 'url' => 'setting')
);
//This definitions are placed in form, and next that fields will be inside sql query, after form send
$s_eventDefinition = array(
    'edit' => array(
        'im_type' => array(
            'name' => array('name' => $tableDefinitionEvent['im_type']['name'], 'type' => 'text', 'require' => 'validation :text', 'table' => 'im_type'),
            'class' => array('name' => $tableDefinitionEvent['im_type']['class'], 'type' => 'text', 'table' => 'im_type'),
            'description' => array('name' => $tableDefinitionEvent['im_type']['description'], 'type' => 'textarea', 'table' => 'im_type')
        ),
        'im_type_property' => array(
            'property_id' => array('name' => $tableDefinitionEvent['im_type_property']['name'], 'type' => 'select:im_property', 'require' => 'validation :select', 'table' => 'im_type_property'),
            'class' => array('name' => $tableDefinitionEvent['im_type_property']['class'], 'type' => 'text', 'table' => 'im_type_property'),
            'class_field' => array('name' => $tableDefinitionEvent['im_type_property']['class_field'], 'type' => 'text', 'table' => 'im_type_property')
        ),
        'im_property' => array(
            'name' => array('name' => $tableDefinitionEvent['im_property']['name'], 'type' => 'text', 'require' => 'validation :text', 'table' => 'im_property'),
            'system_name' => array('name' => $tableDefinitionEvent['im_property']['system_name'], 'type' => 'text', 'require' => 'validation :text', 'readonly' => true, 'table' => 'im_property'),
            'description' => array('name' => $tableDefinitionEvent['im_property']['description'], 'type' => 'textarea', 'table' => 'im_property')
        ),
        'im_object' => array(
            'system_name' => array('name' => $tableDefinitionEvent['im_object']['system_name'], 'type' => 'text', 'require' => 'validation :text', 'table' => 'im_object'),
            'name' => array('name' => $tableDefinitionEvent['im_object']['name'], 'type' => 'text', 'require' => 'validation :text', 'table' => 'im_object'),
            'label_id' => array('name' => $tableDefinitionEvent['im_object']['label'], 'type' => 'select:im_label', 'require' => 'validation :select', 'table' => 'im_object'),
            'section' => array('name' => $tableDefinitionEvent['im_object']['section'], 'type' => 'select:im_section', 'require' => 'validation :select', 'table' => 'im_object'),
            'link' => array('name' => $tableDefinitionEvent['im_object']['link'], 'type' => 'text', 'require' => 'validation :text', 'table' => 'im_object'),
            'date' => array('name' => $tableDefinitionEvent['im_object']['date'], 'type' => 'date', 'require' => 'validation :text', 'table' => 'im_object'),
            'content' => array('name' => $tableDefinitionEvent['im_object']['content'], 'type' => 'textarea:editor', 'require' => 'validation :textarea', 'table' => 'im_object'),
            'description' => array('name' => $tableDefinitionEvent['im_object']['description'], 'type' => 'textarea', 'table' => 'im_object')
        ),
        'im_section' => array(
            'name' => array('name' => $tableDefinitionEvent['im_section']['name'], 'type' => 'text', 'require' => 'validation :text', 'table' => 'im_section', 'copy' => 'name_url'),
            'name_url' => array('name' => $tableDefinitionEvent['im_section']['name_url'], 'type' => 'text', 'table' => 'im_section', 'require' => 'validation :text'),
            'meta' => array('name' => $tableDefinitionEvent['im_section']['meta'], 'type' => 'textarea', 'table' => 'im_section'),
            'icon' => array('name' => $tableDefinitionEvent['im_section']['icon'], 'type' => 'text', 'table' => 'im_section'),
            'description' => array('name' => $tableDefinitionEvent['im_section']['description'], 'type' => 'textarea', 'table' => 'im_section')
        ),
        'im_category' => array(
            'name' => array('name' => $tableDefinitionEvent['im_category']['name'], 'type' => 'text', 'require' => 'validation :text', 'table' => 'im_category'),
            'label_id' => array('name' => $tableDefinitionEvent['im_object']['label'], 'type' => 'select:im_label', 'require' => 'validation :select', 'table' => 'im_category'),
            'content' => array('name' => $tableDefinitionEvent['im_category']['content'], 'type' => 'textarea:editor', 'table' => 'im_category'),
            'description' => array('name' => $tableDefinitionEvent['im_category']['description'], 'type' => 'textarea', 'table' => 'im_category')
        ),
        'im_language' => array(
            'name' => array('name' => $tableDefinitionEvent['im_language']['name'], 'type' => 'text', 'require' => 'validation :text', 'table' => 'im_language'),
            'system_name' => array('name' => $tableDefinitionEvent['im_language']['system_name'], 'type' => 'text', 'require' => 'validation :text', 'readonly' => true, 'table' => 'im_language'),
            'description' => array('name' => $tableDefinitionEvent['im_language']['description'], 'type' => 'textarea', 'table' => 'im_language'),
            'url' => array('name' => $tableDefinitionEvent['im_language']['url'], 'type' => 'image', 'option' => 'preview,add', 'table' => 'im_language')
        ),
        'im_image' => array(
            'name' => array('name' => $tableDefinitionEvent['im_image']['name'], 'type' => 'text', 'require' => 'validation :text', 'table' => 'im_image'),
            'content' => array('name' => $tableDefinitionEvent['im_image']['content'], 'type' => 'textarea:editor', 'table' => 'im_image'),
            'url' => array('name' => $tableDefinitionEvent['im_image']['url'], 'type' => 'image', 'option' => 'preview,add', 'table' => 'im_image'),
            'section' => array('name' => $tableDefinitionEvent['im_image']['section'], 'type' => 'select:im_section', 'table' => 'im_image'),
            'description' => array('name' => $tableDefinitionEvent['im_image']['description'], 'type' => 'textarea', 'table' => 'im_image')
        ),
        'im_file' => array(
            'name' => array('name' => $tableDefinitionEvent['im_file']['name'], 'type' => 'text', 'require' => 'validation :text', 'table' => 'im_file'),
            'content' => array('name' => $tableDefinitionEvent['im_file']['content'], 'type' => 'textarea:editor', 'table' => 'im_file'),
            'url' => array('name' => $tableDefinitionEvent['im_file']['url'], 'type' => 'file', 'option' => 'preview,add', 'table' => 'im_file'),
            'description' => array('name' => $tableDefinitionEvent['im_file']['description'], 'type' => 'textarea', 'table' => 'im_file')
        ),
        'im_movie' => array(
            'name' => array('name' => $tableDefinitionEvent['im_movie']['name'], 'type' => 'text', 'require' => 'validation :text', 'table' => 'im_movie'),
            'content' => array('name' => $tableDefinitionEvent['im_movie']['content'], 'type' => 'textarea', 'require' => 'validation :source', 'table' => 'im_movie'),
            'link' => array('name' => $tableDefinitionEvent['im_movie']['link'], 'type' => 'text', 'table' => 'im_movie'),
            'description' => array('name' => $tableDefinitionEvent['im_movie']['description'], 'type' => 'textarea', 'table' => 'im_movie')
        ),
        'im_setting' => array(
            'name' => array('name' => $tableDefinitionEvent['im_setting']['name'], 'type' => 'text', 'require' => 'validation :text', 'table' => 'im_setting'),
            'system_name' => array('name' => $tableDefinitionEvent['im_setting']['system_name'], 'type' => 'text', 'require' => 'validation :text', 'table' => 'im_setting'),
            'content' => array('name' => $tableDefinitionEvent['im_setting']['content'], 'type' => 'textarea', 'require' => 'validation :source', 'table' => 'im_setting'),
            'description' => array('name' => $tableDefinitionEvent['im_setting']['description'], 'type' => 'textarea', 'table' => 'im_setting')
        ),
        'im_translation_system' => array(
            'name' => array('name' => $tableDefinitionEvent['im_translation_system']['name'], 'type' => 'text', 'require' => 'validation :text', 'table' => 'im_translation_system'),
            'system_name' => array('name' => $tableDefinitionEvent['im_translation_system']['system_name'], 'type' => 'text', 'require' => 'validation :text', 'readonly' => true, 'table' => 'im_translation_system'),
            'language_id' => array('name' => $tableDefinitionEvent['im_translation_system']['language'], 'type' => 'select:im_language', 'require' => 'validation :select', 'table' => 'im_translation_system'),
            'content' => array('name' => $tableDefinitionEvent['im_translation_system']['content'], 'type' => 'text', 'require' => 'validation :text', 'table' => 'im_translation_system'),
            'description' => array('name' => $tableDefinitionEvent['im_translation_system']['description'], 'type' => 'textarea', 'table' => 'im_translation_system')
        ),
        'im_translation' => array(
            'name' => array('name' => $tableDefinitionEvent['im_translation']['name'], 'type' => 'text', 'require' => 'validation :text', 'table' => 'im_translation'),
            'language_id' => array('name' => $tableDefinitionEvent['im_translation']['language'], 'type' => 'select:im_language', 'require' => 'validation :select', 'table' => 'im_translation'),
            'content' => array('name' => $tableDefinitionEvent['im_translation']['content'], 'type' => '', 'require' => '', 'table' => 'im_translation'),
            'description' => array('name' => $tableDefinitionEvent['im_translation']['description'], 'type' => 'textarea', 'table' => 'im_translation')
        ),
        'im_label' => array(
            'name' => array('name' => $tableDefinitionEvent['im_label']['name'], 'type' => 'text', 'require' => 'validation :text', 'table' => 'im_label'),
            'system_name' => array('name' => $tableDefinitionEvent['im_label']['system_name'], 'type' => 'text', 'require' => 'validation :text', 'readonly' => true, 'table' => 'im_label'),
            'description' => array('name' => $tableDefinitionEvent['im_label']['description'], 'type' => 'textarea', 'table' => 'im_label')
        )
    ),
    'add' => array(
        'im_type' => array(
            'name' => array('name' => $tableDefinitionEvent['im_type']['name'], 'type' => 'text', 'require' => 'validation :text')
        ),
        'im_type_property' => array(
            'property_id' => array('name' => $tableDefinitionEvent['im_type_property']['name'], 'type' => 'select:im_property', 'require' => 'validation :select')
        ),
        'im_property' => array(
            'name' => array('name' => $tableDefinitionEvent['im_property']['name'], 'type' => 'text', 'require' => 'validation :text', 'table' => 'im_property'),
            'system_name' => array('name' => $tableDefinitionEvent['im_property']['system_name'], 'type' => 'text', 'require' => 'validation :text', 'readonly' => true, 'table' => 'im_property')
        ),
        'im_object' => array(
            'system_name' => array('name' => $tableDefinitionEvent['im_object']['name'], 'type' => 'text', 'require' => 'validation :text'),
            'label_id' => array('name' => $tableDefinitionEvent['im_object']['label'], 'type' => 'select:im_label', 'require' => 'validation :select')
        ),
        'im_section' => array(
            'name' => array('name' => $tableDefinitionEvent['im_section']['name'], 'type' => 'text', 'require' => 'validation :text', 'table' => 'im_section'),
            'meta' => array('name' => $tableDefinitionEvent['im_section']['meta'], 'type' => 'textarea', 'table' => 'im_section')
        ),
        'im_category' => array(
            'name' => array('name' => $tableDefinitionEvent['im_category']['name'], 'type' => 'text', 'require' => 'validation :text'),
            'label_id' => array('name' => $tableDefinitionEvent['im_category']['label'], 'type' => 'select:im_label', 'require' => 'validation :select')
        ),
        'im_language' => array(
            'name' => array('name' => $tableDefinitionEvent['im_language']['name'], 'type' => 'text', 'require' => 'validation :text'),
            'system_name' => array('name' => $tableDefinitionEvent['im_language']['system_name'], 'type' => 'text', 'require' => 'validation :text')
        ),
        'im_image' => array(
            'name' => array('name' => $tableDefinitionEvent['im_image']['name'], 'type' => 'text', 'require' => 'validation :text', 'table' => 'im_image'),
            'url' => array('name' => $tableDefinitionEvent['im_image']['url'], 'type' => 'image', 'option' => 'add',  'require' => 'validation :file', 'table' => 'im_image'),
            'section' => array('name' => $tableDefinitionEvent['im_image']['section'], 'type' => 'select:im_section', 'table' => 'im_image')
        ),
        'im_file' => array(
            'name' => array('name' => $tableDefinitionEvent['im_file']['name'], 'type' => 'text', 'require' => 'validation :text', 'table' => 'im_file'),
            'url' => array('name' => $tableDefinitionEvent['im_file']['url'], 'type' => 'file', 'option' => 'add',  'require' => 'validation :file', 'table' => 'im_file'),
        ),
        'im_movie' => array(
            'name' => array('name' => $tableDefinitionEvent['im_movie']['name'], 'type' => 'text', 'require' => 'validation :text', 'table' => 'im_movie'),
            'content' => array('name' => $tableDefinitionEvent['im_movie']['content'], 'type' => 'textarea', 'require' => 'validation :source', 'table' => 'im_movie')
        ),
        'im_setting' => array(
            'name' => array('name' => $tableDefinitionEvent['im_setting']['name'], 'type' => 'text', 'require' => 'validation :text', 'table' => 'im_setting'),
            'system_name' => array('name' => $tableDefinitionEvent['im_setting']['system_name'], 'type' => 'text', 'require' => 'validation :text', 'table' => 'im_setting'),
            'content' => array('name' => $tableDefinitionEvent['im_setting']['content'], 'type' => 'textarea', 'require' => 'validation :source', 'table' => 'im_setting')
        ),
        'im_translation_system' => array(
            'name' => array('name' => $tableDefinitionEvent['im_translation_system']['name'], 'type' => 'text', 'require' => 'validation :text', 'table' => 'im_translation_system'),
            'system_name' => array('name' => $tableDefinitionEvent['im_translation_system']['system_name'], 'type' => 'text', 'require' => 'validation :text', 'table' => 'im_translation_system'),
            'language_id' => array('name' => $tableDefinitionEvent['im_translation_system']['language'], 'type' => 'select:im_language', 'require' => 'validation :select', 'table' => 'im_translation_system'),
            'content' => array('name' => $tableDefinitionEvent['im_translation_system']['content'], 'type' => 'text', 'require' => 'validation :text', 'table' => 'im_translation_system')
        ),
        'im_translation' => array(
            'name' => array('name' => $tableDefinitionEvent['im_translation']['name'], 'type' => 'text', 'require' => 'validation :text', 'table' => 'im_translation'),
            'language_id' => array('name' => $tableDefinitionEvent['im_translation']['language'], 'type' => 'select:im_language', 'require' => 'validation :select', 'table' => 'im_translation'),
            'content' => array('name' => $tableDefinitionEvent['im_translation']['content'], 'type' => '', 'require' => '', 'table' => 'im_translation')
        ),
        'im_label' => array(
            'name' => array('name' => $tableDefinitionEvent['im_label']['name'], 'type' => 'text', 'require' => 'validation :text', 'table' => 'im_label'),
            'system_name' => array('name' => $tableDefinitionEvent['im_label']['system_name'], 'type' => 'text', 'require' => 'validation :text', 'table' => 'im_label')
        )
    )
);