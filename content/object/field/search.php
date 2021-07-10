<?php

if($this->checkDataDisplay($dataDisplay, 'array')) {

    $searchValue = '';
    if(isset($this->session['search']))
        $searchValue = $this->session['search'];

    echo '<div'.$classField.'>';

        echo $this->translationMark('im_object-name-'.$dataId, $dataDisplay['name']);

        $action = $this->currentSection;
        if($dataDisplay['section_search'] > 0)
            $action = $this->getSectionUrl($dataDisplay['section_search']);

        echo '<form action="'.$action.'" method="post">';

            echo '<input type="text" class="form-control" name="search" value="'.$searchValue.'" placeholder="'.$this->makeTranslationSystem('search-text').'">';

            echo '<input type="button" class="btn btn-success search-run" value="'.$this->makeTranslationSystem('search').'">';

            if($searchValue !== '')
                echo '<input type="button" class="btn btn-danger search-clear" value="'.$this->makeTranslationSystem('clear').'">';

            echo '<input type="hidden" name="event" value="search">';

            echo '<input type="hidden" name="transaction" value="' . $this->addition->transaction() . '">';

        echo '</form>';

    echo '</div>';

}