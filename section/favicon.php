<?php

if(isset($setting['favicon'])) {

    $favicon = $system->systemName() . '/public/' . $setting['favicon'];

    if (file_exists($favicon))
        echo '<link rel="icon" type="image/png" href="' . $favicon . '">';

}