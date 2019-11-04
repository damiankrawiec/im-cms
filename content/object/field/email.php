<?php

if($this->checkDataDisplay($dataDisplay, 'string')) {

    echo '<a href="mailto:'.$dataDisplay.'"'.$classField.'>' . $dataDisplay . '</a>';

}