<?php

if($this->checkDataDisplay($dataDisplay, 'array')) {

    echo '<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">';

        $active = ' class="active"';
        echo '<ol class="carousel-indicators">';
        foreach ($dataDisplay as $i => $slide) {

            echo '<li data-target="#carouselExampleIndicators" data-slide-to="'.$i.'"'.$active.'></li>';

            $active = '';

        }
        echo '</ol>';

        echo '<div class="carousel-inner">';

        $active = ' active';
        foreach ($dataDisplay as $img) {

            echo '<div class="carousel-item' . $active . '">
                      <img class="d-block" src="'.$this->systemName.'/public/' . $img['url'] . '" alt="' . $img['name'] . '">
                      <div class="carousel-caption d-none d-md-block">
                        <h5>'.$img['name'].'</h5>
                        '.($img['content'] != '' ? '<p>'.$img['content'].'</p>' : '').'
                      </div>
                  </div>';

            $active = '';

        }

        echo '</div>';

        echo '<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a>';

    echo '</div>';

}