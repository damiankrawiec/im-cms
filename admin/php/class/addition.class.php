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

        $message = '<p class="text-danger">';

        if($icon) {

            $message .= $icon.' ';

        }

        $message .= $text;

        $message .= '</p>';

        return $message;

    }
}