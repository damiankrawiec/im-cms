<?php
//System variables to get in js
echo '<div id="validation-error" class="im-hide">'.$addition->message($translation['authorization']['error'], $icon['message']['alert']).'</div>';
echo '<div id="warning-icon" class="im-hide">'.$icon['warning']['validation'].'</div>';
echo '<div id="download-icon" class="im-hide">'.$icon['button']['download'].'</div>';
echo '<div id="process-button" class="im-hide">'.$icon['process']['standard'].'</div>';
echo '<div id="arrow-type" class="im-hide">'.implode(",", $icon['arrow']).'</div>';
echo '<input type="hidden" id="search-fix" value="'.$translation['fix']['search'].'">';
if(!isset($minHeadBody))
    echo '<input type="hidden" id="url-system" value="'.$tool->getSession('system').'">';
if(isset($g_section))
    echo '<input type="hidden" id="url-section" value="'.$g_section.'">';
//Get full url
if(isset($g_section))
    echo '<input type="hidden" id="url-full" value="'.$g_section.$addition->varUrl().'">';

//Custom editor icon
if(is_array($iconEditor) and count($iconEditor) > 0) {

    echo '<div id="icon-to-editor" class="im-hide">';
    foreach ($iconEditor as $i => $ie) {

        echo '<div id="'.$i.'">' . $ie . '</div>';

    }
    echo '</div>';

}