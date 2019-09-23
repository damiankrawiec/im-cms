<?php
//System name in all system structure
$s_systemName = 'IM.CMS';
$s_permittedImage = 'jpg,jpeg,png,gif';
$s_previewImage = '200px';
//If 'submenu' is string, that mean it is the name of table from database, and data will generated dynamic
//If 'submenu' is array, that mean it is data from this array
//If submenu is exists, that mean the url index is no need
$s_menuDefinition = array(
    'dashboard' => array('icon' => $icon['menu']['dashboard'], 'name' => $translation['menu']['dashboard'], 'url' => 'dashboard'),
    'section' => array('icon' => $icon['menu']['section'], 'name' => $translation['menu']['section'], 'url' => 'section,0'),
    'object' => array('icon' => $icon['menu']['object'], 'name' => $translation['menu']['object'], 'submenu' => 'im_type'),
    'property' => array('icon' => $icon['menu']['property'], 'name' => $translation['menu']['property'], 'submenu' => 'im_type'),
    'definition-object' => array('icon' => $icon['menu']['definition-object'], 'name' => $translation['menu']['definition-object'],
        'submenu' => array(
            array('icon' => $icon['menu']['type'], 'name' => $translation['menu']['type'], 'url' => 'type'),
            array('icon' => $icon['menu']['category'], 'name' => $translation['menu']['category'], 'url' => 'category,0')
        )
    ),
    'multimedia' => array('icon' => $icon['menu']['multimedia'], 'name' => $translation['menu']['multimedia'],
        'submenu' => array(
            array('icon' => $icon['menu']['image'], 'name' => $translation['menu']['image'], 'url' => 'image,0'),
            array('icon' => $icon['menu']['file'], 'name' => $translation['menu']['file'], 'url' => 'file'),
            array('icon' => $icon['menu']['movie'], 'name' => $translation['menu']['movie'], 'url' => 'movie')
        )
    ),
    'language' => array('icon' => $icon['menu']['language'], 'name' => $translation['menu']['language'],
        'submenu' => array(
            array('icon' => $icon['menu']['definition'], 'name' => $translation['menu']['definition'], 'url' => 'language'),
            array('icon' => $icon['menu']['translation'], 'name' => $translation['menu']['translation'], 'url' => 'translation')
        )
    )
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
            'property_id' => array('name' => $tableDefinitionEvent['im_type_property']['system_name'], 'type' => 'select:im_property', 'require' => 'validation :select', 'table' => 'im_type_property'),
            'class' => array('name' => $tableDefinitionEvent['im_type_property']['class'], 'type' => 'text', 'table' => 'im_type_property'),
            'class_field' => array('name' => $tableDefinitionEvent['im_type_property']['class_field'], 'type' => 'text', 'table' => 'im_type_property')
        ),
        'im_object' => array(
            'name' => array('name' => $tableDefinitionEvent['im_object']['name'], 'type' => 'text', 'require' => 'validation :text', 'table' => 'im_object'),
            'label_id' => array('name' => $tableDefinitionEvent['im_object']['label'], 'type' => 'select:im_label', 'require' => 'validation :select', 'table' => 'im_object'),
            'section' => array('name' => $tableDefinitionEvent['im_object']['section'], 'type' => 'select:im_section', 'table' => 'im_object'),
            'link' => array('name' => $tableDefinitionEvent['im_object']['link'], 'type' => 'text', 'table' => 'im_object'),
            'date' => array('name' => $tableDefinitionEvent['im_object']['date'], 'type' => 'date', 'table' => 'im_object'),
            'content' => array('name' => $tableDefinitionEvent['im_object']['content'], 'type' => 'textarea:editor', 'table' => 'im_object'),
            'description' => array('name' => $tableDefinitionEvent['im_object']['description'], 'type' => 'textarea', 'table' => 'im_object')
        ),
        'im_section' => array(
            'name' => array('name' => $tableDefinitionEvent['im_section']['name'], 'type' => 'text', 'require' => 'validation :text', 'table' => 'im_section', 'copy' => 'name_url'),
            'name_url' => array('name' => $tableDefinitionEvent['im_section']['name_url'], 'type' => 'text', 'table' => 'im_section', 'require' => 'validation :text'),
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
            'link' => array('name' => $tableDefinitionEvent['im_image']['link'], 'type' => 'select:im_section', 'option' => 'preview,add', 'table' => 'im_image'),
            'description' => array('name' => $tableDefinitionEvent['im_image']['description'], 'type' => 'textarea', 'table' => 'im_image')
        )
    ),
    'add' => array(
        'im_type' => array(
            'name' => array('name' => $tableDefinitionEvent['im_type']['name'], 'type' => 'text', 'require' => 'validation :text')
        ),
        'im_type_property' => array(
            'property_id' => array('name' => $tableDefinitionEvent['im_type_property']['system_name'], 'type' => 'select:im_property', 'require' => 'validation :select')
        ),
        'im_object' => array(
            'name' => array('name' => $tableDefinitionEvent['im_object']['name'], 'type' => 'text', 'require' => 'validation :text'),
            'label_id' => array('name' => $tableDefinitionEvent['im_object']['label'], 'type' => 'select:im_label', 'require' => 'validation :select')
        ),
        'im_section' => array(
            'name' => array('name' => $tableDefinitionEvent['im_section']['name'], 'type' => 'text', 'require' => 'validation :text', 'table' => 'im_section')
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
            'url' => array('name' => $tableDefinitionEvent['im_image']['url'], 'type' => 'image', 'option' => 'add', 'table' => 'im_image'),
            'link' => array('name' => $tableDefinitionEvent['im_image']['link'], 'type' => 'select:im_section', 'option' => 'preview,add', 'table' => 'im_image')
        )
    )
);