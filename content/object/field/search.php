<?php

if($this->checkDataDisplay($dataDisplay, 'string')) {

    $searchValue = '';
    if(isset($this->session['search']))
        $searchValue = $this->session['search'];

    echo '<div'.$classField.'>';

        echo $this->translationMark('im_object-name-'.$dataId, $dataDisplay);

        echo '<form action="'.$this->currentSection.'" method="post">';

            echo '<input type="text" class="form-control" name="search" value="'.$searchValue.'" placeholder="'.$this->makeTranslationSystem('search-text').'">';

            echo '<input type="button" class="btn btn-success search-run" value="'.$this->makeTranslationSystem('search').'">';

            if($searchValue !== '')
                echo '<input type="button" class="btn btn-danger search-clear" value="'.$this->makeTranslationSystem('clear').'">';

            echo '<input type="hidden" name="event" value="search">';

            echo '<input type="hidden" name="transaction" value="' . $this->addition->transaction() . '">';

        echo '</form>';

    echo '</div>';

}