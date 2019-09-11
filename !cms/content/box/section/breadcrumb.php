<?php

if($g_var1 > 0) {

    $sql = 'select name, url, parent from im_section where section_id = :id';

    $db->prepare($sql);

    $sectionId = $g_var1;

    $breadcrumb = array();

    while (true) {

        $parameter = array(
            array('name' => ':id', 'value' => $sectionId, 'type' => 'int')
        );

        $db->bind($parameter);

        $sectionCurrent = $db->run('one');

        array_push($breadcrumb, '<div class="col-12"><a href="'.$addition->getUrl(2).',' . $sectionCurrent->parent . '" title="' . $sectionCurrent->name . '">' . $sectionCurrent->name . '</a></div>');

        $sectionId = $sectionCurrent->parent;

        if ($sectionId == 0)
            break;

    }

    $breadcrumb = array_reverse($breadcrumb);

    echo '<div class="section-breadcrumb">';

    foreach ($breadcrumb as $b) {

        echo $b;

    }

    echo '</div>';

}