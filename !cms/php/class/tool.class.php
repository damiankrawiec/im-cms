<?php


class Tool extends Session
{

    private $date;

    private $hashEmail;

    private $checkAuth = false;

    private function checkAuth() {

        $this->hashEmail = md5($this->getSession('admin')['email'].$this->getSalt().$this->date);

        $pathHashFile = 'auth/stamp/'.$this->hashEmail.'.txt';

        if($this->fileExists($pathHashFile)) {

            $hashClientFile = file_get_contents($pathHashFile);

            $hashClient = md5($_SERVER['REMOTE_ADDR'].$this->getSalt().$this->date);

            if($hashClientFile === $hashClient) {

                if($this->getSession('token') === sha1($this->sessionId().$this->getSalt().$this->date)) {

                    if($this->getSession(md5($this->hashEmail)) === md5($hashClient)) {

                        $this->checkAuth = true;

                    }else $this->checkAuth = false;

                }else $this->checkAuth = false;

            }else $this->checkAuth = false;

        }else $this->checkAuth = false;

    }

    public function logout() {

        unlink('auth/stamp/'.$this->hashEmail.'.txt');

        $this->setSession('admin', 0);

        $this->setSession('token', 0);

        $this->setSession(md5($this->hashEmail), 0);

    }

    public function __construct()
    {

        parent::__construct();

        $this->date = date("Y-m-d");

        $this->checkAuth();

    }

    public function getCheckAuth() {

        return $this->checkAuth;

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