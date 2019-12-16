<?php

foreach ($s_dashboard as $dashboard) {

    $dashboardField = '';
    if(isset($dashboard['field']) )
        $dashboardField = ', '.$dashboard['field'].' as field';

    $sql = 'select '.$addition->cleanText($dashboard['table'], 'im_').'_id as id, '.$dashboard['title'].''.$dashboardField.' from '.$dashboard['table'].' order by date_create desc limit 10';

    $db->prepare($sql);

    $dashboardRecord = $db->run('all');

    echo '<div class="col-12 col-md-6 col-xl-4 dashboard-box">';

    echo '<p class="h6">'.$dashboard['icon'].' '.$dashboard['name'].'</p>';

    if($dashboardRecord) {

            echo '<ul>';
            foreach ($dashboardRecord as $dr) {

                    echo '<li><a href="'.$addition->cleanText($dashboard['table'], 'im_').','.($dashboardField != '' ? $dr['field'].',' : '').'edit,'.$dr['id'].'" title="'.$dr['name'].'">'.$dr['name'].$addition->cutDescription($dr['description'], 50).'</a></li>';

            }
            echo '</ul>';

    }else echo $addition->message($translation['message']['no-data'], $icon['message']['alert']);

    echo '</div>';

}

echo '<div class="col-12 dashboard-box">';

    $phpVersion = phpversion();

    echo $icon['php']['version'].' '.$translation['php']['version'].': '.$phpVersion.'<br>';

    $phpVersionArray = explode('.', $phpVersion);

    if($phpVersionArray[0] < 7) {

        echo '<span class="text-danger">'.$translation['php']['version-to-low'].'</span>';

    }else{

        echo '<span class="text-success">'.$translation['php']['version-fine'].'</span>';

    }



echo '</div>';