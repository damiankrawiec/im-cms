<?php

if($this->checkDataDisplay($dataDisplay, 'array')) {

    echo '<div class="row">';

    foreach ($dataDisplay as $img) {

        if($this->currentLanguage === $this->getLanguageName($img['language'])) {

            echo '<div class="col-12 col-md-6 col-lg-4 col-xl-3">';

            require 'content/field/image/setting.php';

            echo '<div>
                <a href="' . $href . '" title="' . $img['name'] . '"' . $dataRel . '>
                  <img' . $classField . ' src="' . $this->path . $this->systemName . '/content/public/' . $img['url'] . '" alt="' . $img['name'] . '">
                </a>
                <div class="d-none'.$classDescription.'">
                <h5>' . $this->translationMark('im_image-name-' . $img['id'], $img['name']) . '</h5>
                ' . ($img['content'] != '' ? '<p>' . $this->translationMark('im_image-name-' . $img['id'], $img['content']) . '</p>' : '') . '
                </div>
              </div>';

            echo '</div>';

        }

    }

    echo '</div>';

}