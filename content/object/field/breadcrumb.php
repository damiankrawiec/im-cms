<?php

if($this->checkDataDisplay($dataDisplay, 'array')) {

    foreach ($dataDisplay as $i => $b) {

        $href = '<a href="'.$b['url'].'" title="'.$b['name'].'" class="float-right">'.$this->translationMark('im_section-name-'.$b['id'], $b['name']).'</a>';

        echo '<div class="float-left">';

            if($i > 0)
                echo $this->icon['tool']['slash'];

            echo $href;

        echo '</div>';

    }

}