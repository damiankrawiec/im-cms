<?php

if($this->checkDataDisplay($dataDisplay, 'array')) {

    echo '<div id="'.$this->label.'-'.$this->objectCounter.'" class="carousel slide" data-ride="carousel">';

        $active = ' class="active"';
        $countRowDataDisplay = count($dataDisplay);

        if($countRowDataDisplay > 1) {
            echo '<ol class="carousel-indicators">';
            for ($i = 0; $i < $countRowDataDisplay; $i++) {

                echo '<li data-target="#' . $this->label . '-' . $this->objectCounter . '" data-slide-to="' . $i . '"' . $active . '></li>';

                $active = '';

            }
            echo '</ol>';
        }

        echo '<div class="carousel-inner">';

        $active = ' active';
        foreach ($dataDisplay as $img) {

            if($img['section'] > 0) {

                $dataRel = '';

                $href = $this->getSectionUrl($img['section']);

            }else{

                $dataRel = ' data-rel="lightcase:collection-'.$this->objectCounter.'"';

                $href = $this->systemName.'/public/'.$img['url'];

            }

            echo '<div class="carousel-item' . $active . '">
                    <a href="'.$href.'" title="'.$img['name'].'"'.$dataRel.'>
                      <img'.$classField.' src="'.$this->systemName.'/public/' . $img['url'] . '" alt="' . $img['name'] . '">
                    </a>
                      <div class="carousel-caption d-none d-md-block">
                        <h5>'.$this->translationMark('im_image-name-'.$img['id'], $img['name']).'</h5>
                        '.($img['content'] != '' ? '<p>'.$this->translationMark('im_image-name-'.$img['id'], $img['content']).'</p>' : '').'
                      </div>
                  </div>';

            $active = '';

        }

        echo '</div>';

        if($countRowDataDisplay > 1) {

            echo '<a class="carousel-control-prev" href="#' . $this->label . '-' . $this->objectCounter . '" role="button" data-slide="prev">
                    '.$this->icon['arrow']['image-left'].'
                  </a>
                  <a class="carousel-control-next" href="#' . $this->label . '-' . $this->objectCounter . '" role="button" data-slide="next">
                     '.$this->icon['arrow']['image-right'].'
                  </a>';

        }

    echo '</div>';

}