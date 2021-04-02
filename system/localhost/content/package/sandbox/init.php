<?php
//$package - all packages array (only names, not path)
//$pack - current package (only name, not path)
//$path - path to all packages (without / at the end)
//$pathName - full path of package (with name)
//$pathContent - full path of content elements (package elements)
//$this->systemName - path of system (system/[...])
//$this->translationSource - array of source translation
/*
 * when is form (parameter), then add in form [require $pathContent.'/submit.php';]
 * (this display button in parameter form and hide run button)
*/

//when is datapicker 2 field, then surround items by div, class "im-datepicker-box"
//echo '<form method="post">';
//echo '<div class="im-datepicker-box">';
//echo '<input type="text" name="form_date1" class="im-datepicker form-control" data-language="pl" placeholder="'.$translation['input']['choose-date1'].'" value="'.$date1.'">';
//echo '<input type="hidden" value="'.$date1.'">';
//echo '<input type="text" name="form_date2" class="im-datepicker form-control" data-language="pl" placeholder="'.$translation['input']['choose-date2'].'" value="'.$date2.'">';
//echo '<input type="hidden" value="'.$date2.'">';
//echo '</div>';
//require $pathContent.'/submit.php';
//echo '<form>';

echo 'Package run well. Packages are connected';

//require $pathContent.'/submit.php';

//if require button is init, next run package button will not display