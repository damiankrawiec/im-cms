<?php


class Run extends Session
{

    private $hashEmail;

    private $hashClient;

    private $email;

    private $image;

    private $date;

    private $admin = array(
        'm@internet.media.pl' => array('image' => 'dk.jpg', 'password' => '7110eda4d09e062aa5e4a390b0a572ac0d2c0220')
    );

    private function checkAdmin($email, $password) {

        if($adminData = $this->admin[$email]) {

            if($adminData['password'] === $password) {

                $this->hashEmail = md5($email.$this->getSalt().$this->date);

                $this->hashClient = md5($_SERVER['REMOTE_ADDR'].$this->getSalt().$this->date);

                $this->email = $email;

                $this->image = $adminData['image'];

                $this->stamp();

                $this->session();

                return true;

            }else return false;

        }else return false;

    }

    private function stamp() {

        file_put_contents('stamp/'.$this->hashEmail.'.txt', $this->hashClient);

    }

    private function session() {

        $this->init();

        $this->setSession('token', sha1($this->sessionId().$this->getSalt().$this->date));

        $this->setSession('admin', array('email' => '', 'image' => $this->image));

        $this->setSession($this->hashEmail, $this->hashClient);

    }

    public function __construct($email, $password)
    {
        parent::__construct();

        $this->date = date("Y-m-d");

        return $this->checkAdmin($email, $password);
    }

}