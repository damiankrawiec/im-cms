<?php
//System variables to get in js
echo '<input type="hidden" id="system-name" value="'.$system->systemName().'">';
echo '<input type="hidden" id="section-id" value="'.$system->getSection()->id.'">';
echo '<div id="session" class="im-hide">'.json_encode($sessionVariable).'</div>';
if($label)
    echo '<div id="label" class="im-hide">'.json_encode($label).'</div>';