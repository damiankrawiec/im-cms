<?php
//System variables to get in js
echo '<input type="hidden" id="system-name" value="'.$system->systemName().'">';
echo '<input type="hidden" id="section-id" value="'.$system->getSection()->id.'">';