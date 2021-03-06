<?php


class Tool extends Session
{

    private $date;

    private $hashEmail;

    private $addition;

    private $checkAuth = false;

    private function checkAuth() {

        $adminSession = $this->getSession('admin');
        if($adminSession != '')
            $adminSession = $this->getSession('admin')['email'];

        $this->hashEmail = sha1($adminSession.$this->getSalt().$this->date);

        $pathHashFile = 'auth/stamp/'.$this->hashEmail.'.txt';

        if($this->addition->fileExists($pathHashFile)) {

            $hashClientFile = $this->decode(file_get_contents($pathHashFile));

            $hashClient = sha1($this->addition->getUserIp().$this->getSalt().$this->date);

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

    public function __construct($addition)
    {

        parent::__construct();

        $this->addition = $addition;

        $this->date = date("Y-m-d");//Check timestamp security, one of 24h admin must be logged (maybe again)

        $this->checkAuth();

    }

    public function getCheckAuth() {

        return $this->checkAuth;

    }

}