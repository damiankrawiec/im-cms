<?php
//$package - all packages
//$pack - current package
//$path source of package
/*
 * when is form (parameter), then add in form [require_once 'content/package/submit.php';]
 * (this display button in parameter form and hide run button)
*/

$jsonResponse = $this->addition->jsonArray(file_get_contents($apiResponsePath.'/response.json'));

return $jsonResponse;