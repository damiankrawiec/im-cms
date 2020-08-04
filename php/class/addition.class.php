<?php

class Addition
{

    public function __construct() {

    }

    private function createUrl($string) {

        $string = str_replace(' ','-', $string);

        $chars = array('!','#','$','%','^','&','*','(',')','+','[',']','{','}','/',';',':','\'','|','~','`','"','.',',');

        $string = str_replace($chars,'', $string);

        $string = $this->removePol($string);

        $string = strtolower($string);

        $string = str_replace(' ', '-', $string);

        return $string;

    }
    private function removePol($string) {

        $from = array(
            "\xc4\x85", "\xc4\x87", "\xc4\x99",
            "\xc5\x82", "\xc5\x84", "\xc3\xb3",
            "\xc5\x9b", "\xc5\xba", "\xc5\xbc",
            "\xc4\x84", "\xc4\x86", "\xc4\x98",
            "\xc5\x81", "\xc5\x83", "\xc3\x93",
            "\xc5\x9a", "\xc5\xb9", "\xc5\xbb"
        );
        $clear = array(
            "\x61", "\x63", "\x65",
            "\x6c", "\x6e", "\x6f",
            "\x73", "\x7a", "\x7a",
            "\x41", "\x43", "\x45",
            "\x4c", "\x4e", "\x4f",
            "\x53", "\x5a", "\x5a"
        );
        $string = str_replace($from, $clear, $string);

        return $string;

    }
    private function transaction() {

        return md5(microtime());

    }
    public function addFile($tmp, $file) {

        if(move_uploaded_file($tmp, $file)) {

            return true;

        }else return false;

    }
    public function setFileName($file, $permitted) {

        $newFileNameArray = explode('.', $file);

        $extension = end($newFileNameArray);

        if(!$permitted or ($permitted and stristr($permitted, $extension))) {

            $newFileNameClear = $this->createUrl(reset($newFileNameArray));

            $fileName = $newFileNameClear . '-' . $this->transaction() . '.' . $extension;

            return strtolower($fileName);

        }else return false;

    }

}