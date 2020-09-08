<?php

class Addition
{

    private $url = '';

    //system char (replace dot ".")
    private $urlChar = '_';

    public function __construct() {

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

        $message = '<div class="im-alert-top">';

        if($icon)
            $message .= $icon.' ';

        $message .= $text;

        $message .= '</div>';

        return $message;

    }

    public function alert1($text = '', $icon = false) {

        $message = '<div class="im-alert-top">';

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

        if($g_section != '')
            $url .= $g_section;

        if($g_var1 != '')
            $url .= ','.$g_var1;

        if($g_var2 != '')
            $url .= ','.$g_var2;

        if($g_var3 != '')
            $url .= ','.$g_var3;

        if($g_var4 != '')
            $url .= ','.$g_var4;

        if($g_var5 != '')
            $url .= ','.$g_var5;

        $this->url = $url;

    }

    public function implode3d($data, $index = false) {

        if($index) {

            $array2d = array();

            foreach ($data as $d) {

                array_push($array2d, $d[$index]);

            }

            return $array2d;

        }else return array(0);

    }

    public function getUrl($count = 0) {

        //Always: 0 = section
        if($count > 0) {

            if(stristr($this->url, ',')) {

                $urlArray = explode(',', $this->url);

                $urlArrayNew = array();
                foreach ($urlArray as $i => $ua) {

                    if ($i < $count) {

                        array_push($urlArrayNew, $ua);

                    } else break;

                }

                return implode(',', $urlArrayNew);

            }else{

                return $this->url;

            }

        }else{

            return $this->url;

        }

    }
    public function varUrl() {

        require 'php/script/get.php';

        $url = '';

        if($g_var1 != '')
            $url .= ','.$g_var1;

        if($g_var2 != '')
            $url .= ','.$g_var2;

        if($g_var3 != '')
            $url .= ','.$g_var3;

        if($g_var4 != '')
            $url .= ','.$g_var4;

        if($g_var5 != '')
            $url .= ','.$g_var5;

        return $url;

    }

    public function transaction() {

        return md5(microtime());

    }

    public function fileExists($path = false) {

        if($path) {

            if(file_exists($path) and is_file($path)) {

                return true;

            }else{

                return false;

            }

        }else{

            return false;

        }

    }
    public function removeFile($path) {

        if($this->fileExists($path)) {

            unlink($path);

            return true;

        }else return false;


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
    public function arrayJson($table) {

        return str_replace('"', '\'', json_encode($table));

    }
    public function jsonArray($json) {

        return json_decode(str_replace('\'', '"', $json));

    }
    public function createUrl($string) {

        $string = str_replace(' ','-', $string);

        $chars = array('!','#','$','%','^','&','*','(',')','+','[',']','{','}','/',';',':','\'','|','~','`','"','.',',');

        $string = str_replace($chars,'', $string);

        $string = $this->removePol($string);

        $string = strtolower($string);

        $string = str_replace(' ', '-', $string);

        return $string;

    }
    public function cutDescription($descriptionWhole, $lengthAllow) {

        $description = '';
        if($descriptionWhole != '') {

            if(strlen($descriptionWhole) > $lengthAllow) {

                $description = ' ('.substr($descriptionWhole, 0, $lengthAllow).'...)';

            }else{

                $description = ' ('.$descriptionWhole.')';

            }

        }

        return $description;

    }
    public function getFromSource($source = false, $type = 'all') {

        $sourceDataArray = array();
        if($source) {

            $sourceDataScan = scandir($source);

            if(count($sourceDataScan) > 2) {

                foreach ($sourceDataScan as $sd) {

                    if ($sd == '.' or $sd == '..')
                        continue;

                    if ($type == 'dir' and is_dir($sd))
                        array_push($sourceDataArray, $sd);

                    if ($type == 'file' and is_file($sd))
                        array_push($sourceDataArray, $sd);

                    if ($type == 'all')
                        array_push($sourceDataArray, $sd);

                }

            }

        }

        if(count($sourceDataArray) > 0) {

            return $sourceDataArray;

        }else return '';

    }

}