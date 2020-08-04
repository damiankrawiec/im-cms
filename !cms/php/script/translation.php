<?php

if($i == 'name' or $i == 'name_second' or $i == 'section_name' or $i == 'link_name' or $i == 'attachment' or $i == 'content') {

    $idName = $addition->cleanText($table, 'im_').'_id';

    echo '<a href="#" class="btn btn-light p-1 m-1 pt-2 translation-move" id="translation,'.$table.','.$i.','.$eventData['record']->$idName.'">'.$icon['button']['translation'].'</a>';

    $translationForm = true;

}
