<?php


class Tool extends Session
{

    private $date;

    private $hashEmail;

    private $checkAuth = false;

    private function checkAuth() {

        $this->hashEmail = sha1($this->getSession('admin')['email'].$this->getSalt().$this->date);

        $pathHashFile = 'auth/stamp/'.$this->hashEmail.'.txt';

        if($this->fileExists($pathHashFile)) {

            $hashClientFile = $this->decode(file_get_contents($pathHashFile));

            $hashClient = sha1($_SERVER['REMOTE_ADDR'].$this->getSalt().$this->date);

            if($hashClientFile === $hashClient) {

                if($this->getSession('token') === sha1($this->sessionId().$this->getSalt().$this->date)) {

                    if($this->decode($this->getSession(md5($this->hashEmail))) === $hashClient) {

                        $this->checkAuth = $this->getAuthToken();

                    }

                }

            }

        }

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

        $this->date = date("Y-m-d");//Check timestamp security, one of 24h admin must be logged (maybe again)

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