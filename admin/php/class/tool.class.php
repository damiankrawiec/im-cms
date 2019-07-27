<?php


class Tool extends Session
{

    private $date;

    private function checkAuth() {

        $pathHashFile = 'auth/stamp/'.md5($this->getSession('email').$this->getSalt().$this->date).'.txt';

        if(is_file($pathHashFile)) {

            $hashClient = file_get_contents($pathHashFile);

            if($hashClient === md5($_SERVER['REMOTE_ADDR'].$this->getSalt().$this->date)) {

                if($this->getSession('token') === sha1($this->sessionId().$this->getSalt().$this->date)) {

                    return true;

                }else return false;

            }else return false;

        }else return false;

    }

    private function logout() {



    }

    public function __construct()
    {

        parent::__construct();

        $this->date = date("Y-m-d");

        return $this->checkAuth();

    }

}