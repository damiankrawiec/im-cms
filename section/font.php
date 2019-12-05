<?php

if(!isset($setting['font'])) {

    $settingFont = 'Segoe UI';

}else{

    $settingFont = $setting['font'];

    $settingFontUrl = str_replace(' ','+', $settingFont);

    echo '<link href="https://fonts.googleapis.com/css?family='.$settingFontUrl.'&subset=latin,latin-ext" rel="stylesheet" type="text/css">';
}

if(!isset($setting['font-size'])) {

    $settingFontSize = '14px';

}else $settingFontSize = $setting['font-size'];

echo '<style>
body, div, p, a, span, i, li, strong {
    font-family: "'.$settingFont.'", sans-serif;
    font-size: '.$settingFontSize.';
}
h1, h2, h3, h4, h5{
    font-family: "'.$settingFont.'", sans-serif;
}
</style>';