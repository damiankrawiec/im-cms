function validation($type = false, $string = '') {

    if($type && $string != ''){

        if($type === 'email'){

            if($string.indexOf('@') > -1){

                return true;

            }

        }
        else if($type === 'password'){

            return true;

        }else{

            return false;

        }

    }else{

        return false;

    }

}