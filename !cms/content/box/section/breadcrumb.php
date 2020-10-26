<?php

if($g_var1 > 0) {

    $sql = 'select name, name_url, parent from im_section where section_id = :id';

    $db->prepare($sql);

    $sectionId = $g_var1;

    $breadcrumb = array();

    while (true) {

        $parameter = array(
            array('name' => ':id', 'value' => $sectionId, 'type' => 'int')
        );

        $db->bind($parameter);

        $sectionCurrent = $db->run('one');

        array_push($breadcrumb, '<a href="'.$addition->getUrl(1).',' . $sectionCurrent->parent . '" title="' . $sectionCurrent->name . '">' . $sectionCurrent->name . '</a>');

        $sectionId = $sectionCurrent->parent;

        if ($sectionId == 0)
            break;

    }

    $breadcrumb = array_reverse($breadcrumb);

    $countBreadcrumb = count($breadcrumb);

    echo '<div class="section-breadcrumb">';

    echo '<ul>';

    echo '<li>'.$translation['breadcrumb']['title'].':</li>';

    foreach ($breadcrumb as $b => $bc) {

        echo '<li>'.$bc.'</li>';

        if(($b + 1) < $countBreadcrumb)
            echo '<li>'.$icon['arrow']['next'].'</li>';
    }

    echo '</ul>';

    echo '</div>';

}