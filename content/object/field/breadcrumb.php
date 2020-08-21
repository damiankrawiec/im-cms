<?php

if($this->checkDataDisplay($dataDisplay, 'array')) {

    $dataDisplayCount = count($dataDisplay);

    if($dataDisplayCount > 0) {

        foreach ($dataDisplay as $i => $b) {

            $hrefUrl = $b['url'];
            $hrefClass = '';
            if ($i == $dataDisplayCount - 1) {
                $hrefUrl = '#';
                $hrefClass = ' font-weight-bold im-last';
            }

            $href = '<a href="' . $hrefUrl. '" title="' . $b['name'] . '" class="float-right'.$hrefClass.'">' . $this->translationMark('im_section-name-' . $b['id'], $b['name']) . '</a>';

            echo '<div class="float-left">';

            if ($i > 0)
                echo $this->icon['tool']['slash'];

            echo $href;

            echo '</div>';

        }

    }

}