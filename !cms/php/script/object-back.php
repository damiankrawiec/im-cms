<?php

if($p_back)
    $tool->setSession('back', $p_back);

if($tool->getSession('back') != '')
    echo '<a href="'.$tool->getSession('back').'" class="btn btn-outline-secondary m-1">'.$icon['button']['back'].' '.$translation['button']['back'].'</a>';