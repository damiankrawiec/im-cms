<?php
//System variables to get in js
echo '<div id="validation-error" class="im-hide">'.$addition->message($translation['authorization']['error'], $icon['message']['alert']).'</div>';
echo '<div id="warning-icon" class="im-hide">'.$icon['warning']['validation'].'</div>';
echo '<div id="process-button" class="im-hide">'.$icon['process']['standard'].'</div>';
echo '<div id="arrow-type" class="im-hide">'.implode(",", $icon['arrow']).'</div>';
if(isset($g_section))
    echo '<input type="hidden" id="url-section" value="'.$g_section.'">';