<?php

if($this->checkDataDisplay($dataDisplay, 'array')) {

    echo '<div id="'.$this->label.'-'.$this->objectCounter.'" class="carousel slide" data-ride="carousel">';

        $active = ' class="active"';
        $countRowDataDisplay = count($dataDisplay);
        echo '<ol class="carousel-indicators">';
        for ($i = 0; $i < $countRowDataDisplay; $i++) {

            echo '<li data-target="#'.$this->label.'-'.$this->objectCounter.'" data-slide-to="'.$i.'"'.$active.'></li>';

            $active = '';

        }
        echo '</ol>';

        echo '<div class="carousel-inner">';

        $active = ' active';
        foreach ($dataDisplay as $img) {

            if($img['link'] == '') {

                $href = $img['url'];

            }else{

                $href = $img['link'];

            }

            echo '<div class="carousel-item' . $active . '">
                    <a href="'.$this->systemName.'/public/'.$href.'" title="'.$img['name'].'" data-rel="lightcase:collection-'.$this->objectCounter.'">
                      <img class="d-block" src="'.$this->systemName.'/public/' . $img['url'] . '" alt="' . $img['name'] . '">
                    </a>
                      <div class="carousel-caption d-none d-md-block">
                        <h5>'.$img['name'].'</h5>
                        '.($img['content'] != '' ? '<p>'.$img['content'].'</p>' : '').'
                      </div>
                  </div>';

            $active = '';

        }

        echo '</div>';

        echo '<a class="carousel-control-prev" href="#'.$this->label.'-'.$this->objectCounter.'" role="button" data-slide="prev">
                <i class="fal fa-chevron-square-left"></i>
              </a>
              <a class="carousel-control-next" href="#'.$this->label.'-'.$this->objectCounter.'" role="button" data-slide="next">
                <i class="fal fa-chevron-square-right"></i>
              </a>';

    echo '</div>';

}