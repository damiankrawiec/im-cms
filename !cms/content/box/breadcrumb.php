<?php

if(is_array(($tool->getSession('breadcrumb'))) and count(($tool->getSession('breadcrumb'))) > 0) {

    $breadcrumbArray = array_reverse($tool->getSession('breadcrumb'));

    echo '<div class="clearfix p-1 text-center">';

    foreach($breadcrumbArray as $ba) {

        $urlString = '';
        if(stristr($ba, ',')) {

            $urlArray = explode(',', $ba);

            $urlString .= $translation['menu'][$urlArray[0]];

            $sqlName = false;
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

                    if ($sqlName) {

                        $sql = 'select name from im_' . $sqlName . ' where ' . $sqlName . '_id = :parameter';

                        $db->prepare($sql);

                        $parameter = array(
                            array('name' => ':parameter', 'value' => $urlArray[1], 'type' => 'int')
                        );

                        $db->bind($parameter);

                        $urlString .= ' (' . $db->run('one')->name . ')';

                    }

                }

            }else{

                $urlString .= ', '.$translation['button']['edit'];

            }

            if(isset($urlArray[2])) {

                if(is_numeric($urlArray[2])) {

                    if($urlArray[2] > 0) {



                    }

                }else{

                    $urlString .= ', '.$translation['button']['edit'];

                }

            }

        }else{

            $urlString .= $translation['menu'][$ba];

        }

        echo '<a href="'.$ba.'" title="'.$ba.'" class="btn btn-secondary btn-sm mr-1">'.strtolower($urlString).'</a>';

    }

    echo '</div>';

}