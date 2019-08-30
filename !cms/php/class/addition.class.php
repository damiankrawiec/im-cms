<?php

class Addition
{

    private $url = '';

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

        if($icon)
            $message .= $icon.' ';

        $message .= $text;

        $message .= '</p>';

        return $message;

    }

    public function alert0($text = '', $icon = false) {

        $message = '<div class="im-alert">';

        if($icon)
            $message .= $icon.' ';

        $message .= $text;

        $message .= '</div>';

        return $message;

    }

    public function alert1($text = '', $icon = false) {

        $message = '<div class="im-alert">';

        if($icon)
            $message .= $icon.' ';

        $message .= $text;

        $message .= '</div>';

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

    public function setUrl() {

        require 'php/script/get.php';

        $url = '';

        if($g_system != '')
            $url .= $g_system;

        if($g_section != '')
            $url .= ','.$g_section;

        if($g_var1 != '')
            $url .= ','.$g_var1;

        if($g_var2 != '')
            $url .= ','.$g_var2;

        $this->url = $url;

    }

    public function getUrl($count = 0) {

        //Always: 0 = system, 1 = section
        if($count >= 2) {

            $urlArray = explode(',', $this->url);

            $urlArrayNew = array();
            foreach ($urlArray as $i => $ua) {

                if($i < $count) {

                    array_push($urlArrayNew, $ua);

                }else break;

            }

            return implode(',', $urlArrayNew);

        }else{

            return $this->url;

        }

    }

    public function transaction() {

        return md5(microtime());

    }

    public function fileExists($path = false) {

        if($path) {

            if(file_exists($path)) {

                return true;

            }else{

                return false;

            }

        }else{

            return false;

        }

    }
}