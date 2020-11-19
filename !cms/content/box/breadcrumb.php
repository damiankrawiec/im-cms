<?php

if(is_array(($tool->getSession('breadcrumb'))) and count(($tool->getSession('breadcrumb'))) > 0) {

    $breadcrumbArray = array_reverse($tool->getSession('breadcrumb'));

    echo '<div class="clearfix p-1 text-center">';

    foreach($breadcrumbArray as $ba) {

        $urlString = '';
        if(stristr($ba, ',')) {

            $urlArray = explode(',', $ba);

            $urlString .= $translation['menu'][$urlArray[0]];

            $sqlName = $sqlValue = false;
            if(is_numeric($urlArray[1])) {

                if($urlArray[1] > 0) {

                    switch ($urlArray[0]) {

                        case 'section':
                            $sqlName = 'section';
                            break;

                        case ('object' or 'type-property'):
                            $sqlName = 'type';
                            break;

                    }

                    $sqlValue = $urlArray[1];
                    require 'php/script/breadcrumb-name.php';

                }//do nothing if equal 0

            }else{

                $urlString .= ', '.$translation['button']['edit'];

            }

            $sqlName = $urlArray[0];
            if(isset($urlArray[2])) {

                if(is_numeric($urlArray[2])) {

                    if($urlArray[2] > 0) {

                        switch ($urlArray[0]) {

                            case 'label-property':
                                $sqlName = 'label_section';
                                break;

                        }

                        $sqlValue = $urlArray[2];
                        require 'php/script/breadcrumb-name.php';

                    }

                }else{

                    if($urlArray[0] != 'translation')
                        $urlString .= ', '.$translation['button']['edit'];

                }

            }

            if(isset($urlArray[3])) {

                if($urlArray[0] == 'translation')
                    $sqlName = str_replace('im_', '', $urlArray[1]);

                $sqlValue = $urlArray[3];
                require 'php/script/breadcrumb-name.php';

                if($urlArray[0] == 'translation')
                    $urlString .= ', '.$translation['edit'][$urlArray[2]];

            }

            if(isset($urlArray[4]) and $urlArray[0] == 'translation') {

                $sqlName = $urlArray[0];

                $urlString .= ', '.$translation['button']['edit'];

                $sqlValue = $urlArray[5];
                require 'php/script/breadcrumb-name.php';

            }

        }else{

            $urlString .= $translation['menu'][$ba];

        }

        echo '<a href="'.$ba.'" title="'.$ba.'" class="btn btn-secondary btn-sm mr-1">'.mb_strtolower($urlString).'</a>';

    }

    echo '</div>';

}