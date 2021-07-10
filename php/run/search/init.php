<?php

if($p_search !== '') {

    $session->setSession('search', $p_search);

}else $session->setSession('search', false);