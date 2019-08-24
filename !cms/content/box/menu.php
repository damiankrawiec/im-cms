<?php

if(isset($s_menuDefinition) and is_array($s_menuDefinition) and count($s_menuDefinition) > 0) {

    echo '<nav class="navbar navbar-expand-lg navbar-dark">';

        echo '<a class="navbar-brand" href="#">';

            $userImage = 'layout/graphic/admin/'.$tool->getSession('admin')['image'];

            if($tool->fileExists($userImage)) {

                echo '<img src="'.$userImage.'" style="height: 40px">';

            }else{

                echo $icon['user']['standard'];

            }

        echo '</a>';

        echo '<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>';

        echo '<div class="collapse navbar-collapse" id="navbarNav">';

            echo '<ul class="navbar-nav">';

                foreach ($s_menuDefinition as $i => $m) {

                    $active = '';
                    if($i == $g_section)
                        $active = ' active';

                    //There is submenu
                    if(isset($m['submenu'])) {

                        $dropdown = ' dropdown';
                        $a = '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';

                    //Submenu does not exists
                    }else{

                        $dropdown = '';
                        $a = '<a class="nav-link" href="'.$g_system . ',' . $m['url'].'">';

                    }

                    echo '<li class="nav-item'.$active.$dropdown.'">'.$a.$m['icon'].' '.$m['name'].'</a>';

                        if($dropdown != '') {

                            echo '<div class="dropdown-menu" aria-labelledby="navbarDropdown">';

                                //Submenu is checked early ($dropdown != ''), now the program checked is 'submenu' array or string
                                if(is_array($m['submenu'])) {

                                    $submenuData = $m['submenu'];

                                }else if(is_string($m['submenu']) and stristr($m['submenu'], 'im_')){

                                    $sql = 'select '.$addition->cleanText($m['submenu'], 'im_').'_id as id, name from '.$m['submenu'].' order by date_create';

                                    $db->prepare($sql);

                                    $submenuData = $db->run('all');

                                }

                                foreach ($submenuData as $sd) {

                                    $submenuUrl = $g_system;
                                    if(isset($sd['url'])) {

                                        $submenuUrl .= ',' . $sd['url'];

                                    }else{

                                        $submenuUrl .= ','.$i.',' . $sd['id'];

                                    }

                                    $submenuIcon = $icon['link']['internal'].' ';
                                    if(isset($sd['icon']))
                                        $submenuIcon = $sd['icon'].' ';

                                    echo '<a class="dropdown-item" href = "'.$submenuUrl.'">'.$submenuIcon.$sd['name'].'</a>';
                                    
                                }

                            echo '</div>';

                        }

                    echo '</li>';

                }

            echo '</ul>';

        echo '</div>';

    echo '</nav>';

}