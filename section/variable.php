<?php
//System variables to get in js
echo '<input type="hidden" id="system-name" value="'.$system->systemName().'">';
echo '<input type="hidden" id="system" value="'.$addition->cleantext($system->systemName(), 'system/').'">';
echo '<input type="hidden" id="section-id" value="'.$system->getSection(true, 'id').'">';
echo '<div id="warning-icon" class="im-hide"><i class="fad fa-exclamation-triangle text-danger" style="font-size:27px;margin:5px"></i></div>';
echo '<div id="process-button" class="im-hide"><i class="fas fa-cog fa-spin" style="font-size:13px;margin-left:5px"></i></div>';
echo '<div id="session" class="im-hide">'.json_encode($sessionVariable).'</div>';
echo '<input type="hidden" id="path" value="'.$s_path.'">';

if($data['label'])
    echo '<div id="label" class="im-hide">'.json_encode($data['label']).'</div>';

if($g_url)
    echo '<input type="hidden" id="url" value="'.$g_url.'">';