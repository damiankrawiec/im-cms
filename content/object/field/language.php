<?php

if($this->checkDataDisplay($dataDisplay, 'array')) {

    echo '<div class="change-language">';

        echo '<ul'.$classField.'>';
        foreach ($dataDisplay as $l) {

            $active = '';
            if($l['system_name'] == $this->currentLanguage)
                $active = ' class="im-hide"';

            echo '<li'.$active.'>';

                $changeLanguageUrl = $this->translationUrl($l['system_name'], $this->currentSection);

                if($l['system_name'] === $this->defaultLanguage) {

                    $changeLanguageUrl = $this->path . $changeLanguageUrl;

                }else{

                    $changeLanguageUrl = $this->path . $l['system_name'] . '/' . $changeLanguageUrl;

                }

                $changeLanguageUrl .= $this->addition->varUrl();

                echo '<a href="'.$changeLanguageUrl.'" title="'.$l['name'].'">';

                $imagePath = $this->systemName . '/content/public/' . $l['url'];
                if($this->addition->fileExists($imagePath)) {

                    echo '<img src="' . $this->path.$imagePath . '" alt="' . $l['name'] . '">';

                } else {

                    echo $l['name'];

                }

                echo '</a>';

            echo '</li>';

        }
        echo '</ul>';

    echo '</div>';

}