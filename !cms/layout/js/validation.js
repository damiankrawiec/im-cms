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
function text($string = '') {

    var $check = true;

    if($string == '')
        $check = false;

    return $check;

}
function select($string = '') {

    var $check = true;

    if($string == '')
        $check = false;

    if($string == 0)
        $check = false;

    return $check;

}
function file($file = '') {

    var $check = true;

    if($file == '')
        $check = false;

    return $check;

}
function source($string = '') {

    var $check = true;

    if($string == '')
        $check = false;

    return $check;

}
function textarea($string = '') {

    var $check = true;

    if($string == '')
        $check = false;

    return $check;

}