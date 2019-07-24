function email($string = '') {

    var $check = true;

    if($string == '')
        $check = false;

    if($string.indexOf('@') == -1)
        $check = false;

    return $check;

}
function password($string = '') {

    var $check = true;

    if($string == '')
        $check = false;

    return $check;

}