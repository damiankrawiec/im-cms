<?php
//System name in all system structure
$s_systemName = 'IM.CMS';
//If 'submenu' is string, that mean it is the name of table from database, and data will generated dynamic
//If 'submenu' is array, that mean it is data from this array
//If submenu is exists, that mean the url index is no need
$s_menuDefinition = array(
    'dashboard' => array('icon' => $icon['menu']['dashboard'], 'name' => $translation['menu']['dashboard'], 'url' => 'dashboard'),
    'section' => array('icon' => $icon['menu']['section'], 'name' => $translation['menu']['section'], 'url' => 'section'),
    'object' => array('icon' => $icon['menu']['object'], 'name' => $translation['menu']['object'], 'submenu' => 'im_type'),
    'property' => array('icon' => $icon['menu']['property'], 'name' => $translation['menu']['property'], 'submenu' => 'im_type'),
    'definition' => array('icon' => $icon['menu']['definition'], 'name' => $translation['menu']['definition'],
        'submenu' => array(
            array('icon' => $icon['menu']['type'], 'name' => $translation['menu']['type'], 'url' => 'type'),
            array('icon' => $icon['menu']['category'], 'name' => $translation['menu']['category'], 'url' => 'category')
        )
    ),
);
//This definitions are placed in form, and next that fields will be inside sql query, after form send
$s_eventDefinition = array(
    'edit' => array(
        'im_type' => array(
            'name' => array('name' => $tableDefinitionEvent['edit']['im_type']['name'], 'type' => 'text', 'require' => 'validation :text'),
            'class' => array('name' => $tableDefinitionEvent['edit']['im_type']['class'], 'type' => 'text'),
            'description' => array('name' => $tableDefinitionEvent['edit']['im_type']['description'], 'type' => 'textarea')
        )
    ),
    'add' => array(
        'im_type' => array(
            'name' => array('name' => $tableDefinitionEvent['edit']['im_type']['name'], 'type' => 'text', 'require' => 'validation :text'),
        )
    )
);