<?php

if($this->checkDataDisplay($dataDisplay, 'string')) {

    $searchValue = '';
    if(isset($this->session['search']))
        $searchValue = $this->session['search'];

    echo '<div'.$classField.'>';

        echo $this->translationMark('im_object-name-'.$dataId, $dataDisplay);

        echo '<form method="post">';

            echo '<input type="text" class="form-control" name="search" value="'.$searchValue.'" placeholder="">';

            echo '<input type="submit" class="btn btn-default" value="'.$this->makeTranslationSystem('search').'">';

            echo '<input type="hidden" name="event" value="search">';

            echo '<input type="hidden" name="transaction" value="' . $this->addition->transaction() . '">';

        echo '</form>';

    echo '</div>';

}