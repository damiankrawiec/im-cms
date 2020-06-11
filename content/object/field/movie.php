<?php

if($this->checkDataDisplay($dataDisplay, 'array')) {

    foreach ($dataDisplay as $f) {

        echo '<div'.$classField.'>';

            $attrString = '';

            if($f['status_loop'] == 'on')
                $attrString .= ' loop';

            if($f['status_controls'] == 'on')
                $attrString .= ' controls';

            if($f['status_autoplay'] == 'on')
                $attrString .= ' autoplay muted';

            echo '<video src="'.$this->systemName.'/public/'.$f['url'].'"'.$attrString.'></video>';

            if($f['content'] != '')
                echo ' <em>'.$this->translationMark('im_file-content-'.$f['id'], $f['content']).'</em>';

        echo '</div>';
    }

}