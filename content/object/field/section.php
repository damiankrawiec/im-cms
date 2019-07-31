<?php

if($this->checkDataDisplay($dataDisplay, 'array')) {

    $expand = false;
    if(stristr($classField, 'navbar-expand'))
        $expand = true;

    echo '<nav'.$classField.'>';

    if($expand) {

        echo '<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown' . $this->objectCounter . '" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>';

        echo '<div class="collapse navbar-collapse" id="navbarNavDropdown' . $this->objectCounter . '">';

    }

    echo '<ul class="navbar-nav">';

        foreach ($dataDisplay as $m) {

            $active = '';
            if($m['id'] == $section)
                $active = ' active';

            echo '<li class="nav-item'.$active.'">';

                $icon = '';
                if($m['icon'] != '')
                    $icon = '<i class="'.$m['icon'].'"></i> ';

                echo '<a href="'.$m['url'].'" title="'.$m['name'].'" class="nav-link">'.$icon.$m['name'].'</a>';

            echo '</li>';
        }

    echo '</ul>';

    if($expand)
        echo '</div>';

    echo '</nav>';

}else{

    echo $this->icon['warning']['triangle'].' '.$this->translationSystem['no-data'];

}