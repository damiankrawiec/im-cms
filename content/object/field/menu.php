<?php

if($this->checkDataDisplay($dataDisplay, 'array')) {

    echo '<nav'.$classField.'>';

    //"expand" determined is menu in vertical (false) or horizontal (true) position
    $expand = false;
    if(stristr($classField, 'navbar-expand'))
        $expand = true;

    if($expand) {

        echo '<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown' . $this->objectCounter . '" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        '.$this->icon['hamburger']['standard'].$this->icon['hamburger']['close'].'
        </button>';

        echo '<div class="collapse navbar-collapse" id="navbarNavDropdown' . $this->objectCounter . '">';

    }

    echo '<ul class="navbar-nav">';

        foreach ($dataDisplay as $m) {

            $active = '';
            if($m['id'] == $section)
                $active = ' active';

            $dropdown = '';
            if(isset($m['submenu']) and $m['submenu'])
                $dropdown = ' dropdown';

            echo '<li class="nav-item'.$active.$dropdown.'">';

                $icon = '';
                if($m['icon'] != '')
                    $icon = '<i class="'.$m['icon'].'"></i> ';

                if(isset($m['submenu']) and $m['submenu']) {

                    echo '<a href="#" title="'.$m['name'].'" class="nav-link" id="navbarDropdown'.$this->objectCounter.'" data-toggle="dropdown">'.$icon.$this->translationMark('im_section-name-'.$m['id'], $this->getSectionName($m)).' '.$this->icon['arrow']['light-down'].'</a>';

                    echo '<div class="dropdown-menu" aria-labelledby="navbarDropdown'.$this->objectCounter.'">';
                        foreach ($m['submenu'] as $ms) {

                            $iconSub = '';
                            if($ms['icon'] != '')
                                $iconSub = '<i class="'.$ms['icon'].'"></i> ';

                            echo '<a class="dropdown-item" href="'.$ms['url'].'">'.$iconSub.$this->translationMark('im_section-name-'.$ms['id'], $this->getSectionName($ms)) .'</a>';

                        }
                    echo '</div>';

                }else {

                    echo '<a href="' . $m['url'] . '" title="' . $m['name'] . '" class="nav-link">' . $icon . $this->translationMark('im_section-name-'.$m['id'], $this->getSectionName($m)) . '</a>';

                }

            echo '</li>';
        }

    echo '</ul>';

    if($expand)
        echo '</div>';

    echo '</nav>';

}else{

    //echo $this->icon['warning']['triangle'].' '.$this->translationSystem['no-data'];

}