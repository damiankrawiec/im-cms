<?php
//System variables to get in js
echo '<div id="validation-error" class="im-hide">'.$addition->message($translation['authorization']['error'], $icon['message']['alert']).'</div>';
echo '<div id="warning-icon" class="im-hide">'.$icon['warning']['validation'].'</div>';
echo '<div id="process-button" class="im-hide">'.$icon['process']['standard'].'</div>';
echo '<div id="arrow-type" class="im-hide">'.implode(",", $icon['arrow']).'</div>';
echo '<input type="hidden" id="search-fix" value="'.$translation['fix']['search'].'">';
if(isset($g_system))
    echo '<input type="hidden" id="url-system" value="'.$g_system.'">';
if(isset($g_section))
    echo '<input type="hidden" id="url-section" value="'.$g_section.'">';