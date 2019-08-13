<?php

if(isset($s_menuDefinition) and is_array($s_menuDefinition) and count($s_menuDefinition) > 0) {

    echo '<nav class="navbar navbar-expand-lg navbar-dark">';

        echo '<a class="navbar-brand" href="#">';

            echo '<img src="layout/graphic/admin/'.$tool->getSession('admin')['image'].'" style="height: 40px">';

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

                    echo '<li class="nav-item'.$active.'"><a class="nav-link" href="'.$g_system.','.$m['url'].'">'.$m['icon'].' '.$m['name'].'</a></li>';

                }

            echo '</ul>';

        echo '</div>';

    echo '</nav>';

}