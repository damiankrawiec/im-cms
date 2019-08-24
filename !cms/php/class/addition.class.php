<?php

class Addition
{
    public function __construct() {

    }

    public function link($location = false) {

        if($location) {

            header('Location:' . $location);

            exit();

        }

    }

    public function message($text = '', $icon = false) {

        $message = '<p class="text-danger im-alert">';

        if($icon) {

            $message .= $icon.' ';

        }

        $message .= $text;

        $message .= '</p>';

        return $message;

    }

    public function cleanText($text, $clean) {

        return str_replace($clean, '', $text);

    }

    public function whereOrAnd($sql) {

        if(stristr($sql, 'where')) {

            $whereOrAnd = ' and';

        }else{

            $whereOrAnd = ' where';
        }

        return $whereOrAnd;

    }
}