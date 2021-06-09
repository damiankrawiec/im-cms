<?php

if($system->getSection(true,'status_popup') == 'on') {

    echo '<div id="popup">' . $system->getSection(true, 'popup') . '</div>';

    echo '<a href="#popup" data-rel="lightcase"></a>';

}