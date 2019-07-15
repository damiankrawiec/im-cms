<?php

if($this->checkDataDisplay($dataDisplay, 'string')) {

    echo '<a href="'.$dataDisplay.'" title="'.$this->translationSystem['more'].'"'.$classField.'>' . $this->translationSystem['more'] . ' <i class="fal fa-external-link-square"></i></a>';

}