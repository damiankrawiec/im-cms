<?php
//System variables to get in js
echo '<input type="hidden" id="system-name" value="'.$system->systemName().'">';
echo '<input type="hidden" id="section-id" value="'.$system->getSection($g_url, 'id').'">';
echo '<div id="warning-icon" class="im-hide"><i class="fad fa-exclamation-triangle text-danger" style="font-size:27px;margin:5px"></i></div>';
echo '<div id="process-button" class="im-hide"><i class="fas fa-cog fa-spin" style="font-size:13px;margin-left:5px"></i></div>';
echo '<div id="session" class="im-hide">'.json_encode($sessionVariable).'</div>';

if($data['label'])
    echo '<div id="label" class="im-hide">'.json_encode($data['label']).'</div>';

if(count($data['translation']['data']) > 0) {

    $dataTranslation = array();
    foreach ($data['translation']['data'] as $d => $dt) {

        $dataTranslation[$d] = base64_encode($dt);

    }

    echo '<div id="translation" class="im-hide">' . json_encode($dataTranslation) . '</div>';

}

if($g_url)
    echo '<input type="hidden" id="url" value="'.$g_url.'">';