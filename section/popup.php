<?php

if($system->getSection($g_url, 'status_popup') == 'on') {

    echo '<div id="popup">' . $system->getSection($g_url, 'popup') . '</div>';

    echo '<a href="#popup" data-rel="lightcase"></a>';

}