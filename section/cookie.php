<?php

if(!isset($sessionVariable['cookie']) and isset($setting['cookie'])) {

    echo '<div id="cookie"><i class="fad fa-cookie fa-2x"></i> '.$setting['cookie'].' <button class="btn btn-dark">OK</button></div>';

}