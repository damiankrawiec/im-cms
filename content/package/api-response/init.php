<?php
//$package - all packages
//$pack - current package
//$path - source to all packages (without / at the end)
//$pathName - full source of package (with name)
//$pathSection - full source of content elements (require, translate, package elements)
/*
 * when is form (parameter), then add in form [require $pathSection.'/package/submit.php';]
 * (this display button in parameter form and hide run button)
*/

$jsonResponse = $this->addition->jsonArray(file_get_contents($path.'/api-response/response.json'));

$date1 = $date2 = '';
if(isset($formData['date1']))
    $date1 = $formData['date1'];

if(isset($formData['date2']))
    $date2 = $formData['date2'];

echo '<form method="post">';
echo '<input type="text" name="form_date1" class="im-datepicker form-control" placeholder="'.$translation['input']['choose-date1'].'" value="'.$date1.'">';
echo '<input type="hidden" value="'.$date1.'">';

echo '<input type="text" name="form_date2" class="im-datepicker form-control" placeholder="'.$translation['input']['choose-date2'].'" value="'.$date2.'">';
echo '<input type="hidden" value="'.$date2.'">';
require $pathSection.'/package/submit.php';
echo '<form>';

//var_dump($jsonResponse);

//return $jsonResponse;