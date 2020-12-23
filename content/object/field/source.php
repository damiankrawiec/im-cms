<?php

if($this->checkDataDisplay($dataDisplay, 'array')) {

    echo '<ul'.$classField.'>';
    foreach ($dataDisplay as $m) {

        echo '<li class="list-group-item">';

        if($m['content'] != '')
            echo '<div>'.$m['content'].'</div>';

        if($m['url'] != '') {

            echo '<div class="badge-light clearfix p-1"><div class="float-left">' . $this->translationMark('im_source-name-' . $m['id'], $m['name']).'</div>';

                echo ' <a href="' . $m['url'] . '" title="' . $this->makeTranslationSystem('more') . '" target="_blank" class="btn btn-dark float-right">' . $this->makeTranslationSystem('more') . ' ' . $this->icon['link']['external'] . '</a>';

            echo '</div>';

        }

        echo '</li>';
    }
    echo '</ul>';

}