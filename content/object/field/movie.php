<?php

if($this->checkDataDisplay($dataDisplay, 'array')) {

    echo '<ul'.$classField.'>';
    foreach ($dataDisplay as $m) {

        echo '<li class="list-group-item">';

        if($m['content'] != '')
            echo '<div>'.$m['content'].'</div>';

        echo '<div class="badge-light">'.$this->icon['multimedia']['movie'].' '.$this->translationMark('im_movie-name-'.$m['id'], $m['name']).'</div>';

        echo '<a href="'.$m['url'].'" title="'.$this->translationSystem['more'].'" target="_blank" class="btn btn-dark">'. $this->translationSystem['more'] . ' '.$this->icon['link']['external'].'</a>';

        echo '</li>';
    }
    echo '</ul>';

}