<?php

if($system->getSection()->status_popup == 'on') {

    echo '<div id="popup">' . $system->getSection()->popup . '</div>';

    echo '<a href="#popup" data-rel="lightcase"></a>';

}