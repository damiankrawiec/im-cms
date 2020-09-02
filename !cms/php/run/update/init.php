<?php

echo '<div id="update">';

//Before update files, in config/sql must be current sql file. This file will be compare with new version, then modify database model

echo '<div><strong>'.$translation['message']['update-data'].':</strong><span>'.$icon['process']['standard'].'</span></div>';

echo '</div>';

$alert1 = $translation['message']['update-progress'];