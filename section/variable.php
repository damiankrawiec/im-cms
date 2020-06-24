<?php
//System variables to get in js
echo '<input type="hidden" id="system-name" value="'.$system->systemName().'">';
echo '<input type="hidden" id="section-id" value="'.$system->getSection($g_url, 'id').'">';
echo '<div id="session" class="im-hide">'.json_encode($sessionVariable).'</div>';
if($data['label'])
    echo '<div id="label" class="im-hide">'.json_encode($data['label']).'</div>';
if(count($data['translation']) > 0) {

    $dataTranslation = array();
    foreach ($data['translation'] as $d => $dt) {

        $dataTranslation[$d] = base64_encode($dt);

    }

    echo '<div id="translation" class="im-hide">' . json_encode($dataTranslation) . '</div>';

}
if($g_url)
    echo '<input type="hidden" id="url" value="'.$g_url.'">';