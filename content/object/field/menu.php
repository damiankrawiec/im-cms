<?php

if($this->checkDataDisplay($dataDisplay, 'array')) {

    echo '<nav'.$classField.'>';

    //"expand" determined is menu in vertical (false) or horizontal (true) position
    $expand = false;
    if(stristr($classField, 'navbar-expand'))
        $expand = true;

    if($expand) {

        echo '<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown' . $this->objectCounter . '" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">';

            if($dataDisplay['name'] != '')
                echo $dataDisplay['name'];

        echo '</button>';

        echo '<div class="collapse navbar-collapse" id="navbarNavDropdown' . $this->objectCounter . '">';

    }

    $alignClass = '';
    if(stristr($classField, 'im-right'))
        $alignClass = ' ml-auto';

    echo '<ul class="navbar-nav'.$alignClass.'">';

        foreach ($dataDisplay['data'] as $m) {

            if (isset($m['submenu']) and $m['submenu']) {

                $displaySubmenu = '';

                foreach ($m['submenu'] as $ms) {

                    $iconSub = '';
                    if ($ms['icon'] != '')
                        $iconSub = '<i class="' . $ms['icon'] . '"></i> ';

                    $href = '#';
                    if ($ms['status_link'] == 'on')
                        $href = $ms['url'];

                    $displaySubmenu .= '<a class="dropdown-item" href="' . $href . '">' . $iconSub . $this->translationMark('im_section-name-' . $ms['id'], $this->getSectionName($ms)) . '</a>';

                }

            }

            $active = '';
            if ($m['id'] == $section)
                $active = ' active';

            $dropdown = '';
            if (isset($m['submenu']) and $m['submenu'])
                $dropdown = ' dropdown';

            echo '<li class="nav-item' . $active . $dropdown . '">';

                $icon = '';
                if($m['icon'] != '')
                    $icon = '<i class="'.$m['icon'].'"></i> ';

                if($m['status_link'] == 'on') {

                    echo '<a href="' . $m['url'] . '" title="' . $m['name'] . '" class="nav-link">' . $icon . $this->translationMark('im_section-name-' . $m['id'], $this->getSectionName($m)) . '</a>';

                    if (isset($displaySubmenu))
                        echo '<div class="dropdown-menu d-block">'.$displaySubmenu.'</div>';

                }else {

                    if (isset($displaySubmenu)) {

                        echo '<a href="#" title="' . $m['name'] . '" class="nav-link" id="navbarDropdown' . $this->objectCounter . '" data-toggle="dropdown">' . $icon . $this->translationMark('im_section-name-' . $m['id'], $this->getSectionName($m)) . ' ' . $this->icon['arrow']['light-down'] . '</a>';

                        echo '<div class="dropdown-menu" aria-labelledby="navbarDropdown' . $this->objectCounter . '">'.$displaySubmenu.'</div>';

                    } else {

                        echo '<a href="#" title="' . $m['name'] . '" class="nav-link">' . $icon . $this->translationMark('im_section-name-' . $m['id'], $this->getSectionName($m)) . '</a>';

                    }

                }

                if (isset($displaySubmenu))
                    unset($displaySubmenu);

            echo '</li>';
        }

    echo '</ul>';

    if($expand)
        echo '</div>';

    echo '</nav>';

}else{

    //echo $this->icon['warning']['triangle'].' '.$this->translationSystem['no-data'];

}