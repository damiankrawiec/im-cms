<?php
//$package - all packages
//$pack - current package
//$path - source to all packages (without / at the end)
//$pathName - full source of package (with name)
/*
 * when is form (parameter), then add in form [require_once 'content/package/submit.php';]
 * (this display button in parameter form and hide run button)
*/

$jsonResponse = $this->addition->jsonArray(file_get_contents($path.'/api-response/response.json'));

return $jsonResponse;