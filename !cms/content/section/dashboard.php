<?php

foreach ($s_dashboard as $dashboard) {

    $dashboardField = '';
    if(isset($dashboard['field']) )
        $dashboardField = ', '.$dashboard['field'].' as field';

    $sql = 'select '.$addition->cleanText($dashboard['table'], 'im_').'_id as id, name'.$dashboardField.' from '.$dashboard['table'].' order by date_create desc limit 10';

    $db->prepare($sql);

    $dashboardRecord = $db->run('all');

    echo '<div class="col-12 col-sm-2 col-md-4 dashboard-box">';

    echo '<h2>'.$dashboard['name'].'</h2>';

    if($dashboardRecord) {

            echo '<ul>';
            foreach ($dashboardRecord as $dr) {

                    echo '<li><a href="'.$g_system.','.$addition->cleanText($dashboard['table'], 'im_').','.($dashboardField != '' ? $dr['field'].',' : '').'edit,'.$dr['id'].'" title="'.$dr['name'].'">'.$dr['name'].'</a></li>';

            }
            echo '</ul>';

    }else echo $addition->message($translation['message']['no-data'], $icon['message']['alert']);

    echo '</div>';

}