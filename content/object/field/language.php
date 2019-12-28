<?php

if($this->checkDataDisplay($dataDisplay, 'array')) {

    echo '<div class="change-language">';

        echo '<ul'.$classField.'>';
        foreach ($dataDisplay as $l) {

            $active = '';
            if($l['system_name'] == $this->languageCurrent)
                $active = ' class="im-hide"';

            echo '<li id="'.$l['system_name'].'"'.$active.'>';

                echo '<a href="#" title="'.$l['name'].'">';

                $imagePath = $this->systemName . '/public/' . $l['url'];

                if($l['url'] != '' and file_exists($imagePath)) {

                    echo '<img src="' . $this->systemName . '/public/' . $l['url'] . '" alt="' . $l['name'] . '">';

                } else {

                    echo $l['name'];

                }

                echo '</a>';

            echo '</li>';

        }
        echo '</ul>';

    echo '</div>';

}