<?php

if ($sqlName and $sqlValue) {

    $columnName = 'name';
    if($sqlName == 'object')
        $columnName = 'system_name';

    $sqlName = str_replace('-', '_', $sqlName);

    $sql = 'select '.$columnName.' as name from im_' . $sqlName;

    if($sqlName == 'type_property')
        $sql .= ' join im_property on(im_property.property_id = im_type_property.property_id)';

    $sql .= ' where ' . $sqlName . '_id = :parameter';

    $db->prepare($sql);

    $parameter = array(
        array('name' => ':parameter', 'value' => $sqlValue, 'type' => 'int')
    );

    $db->bind($parameter);

    $breadcrumbName = $db->run('one');

    if($breadcrumbName)
        $urlString .= ' (' . $breadcrumbName->name . ')';

}