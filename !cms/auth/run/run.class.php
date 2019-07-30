<?php


class Run extends Session
{

    private $run;

    private $hashEmail;

    private $hashClient;

    private $date;

    private $admin = array(
        'm@internet.media.pl' => array('image' => 'dk.jpg', 'password' => '7110eda4d09e062aa5e4a390b0a572ac0d2c0220')
    );

    private function checkAdmin($email, $password) {

        if(isset($this->admin[$email])) {

            $adminData = $this->admin[$email];

            if ($adminData['password'] === $password) {

                $this->hashEmail = md5($email . $this->getSalt() . $this->date);

                $this->hashClient = md5($_SERVER['REMOTE_ADDR'] . $this->getSalt() . $this->date);

                $this->setSession('admin', array('email' => $email, 'image' => $adminData['image']));

                $this->stamp();

                $this->session();

                $this->run = true;

            } else $this->run = false;

        } else $this->run = false;

    }

    private function stamp() {

        file_put_contents('stamp/'.$this->hashEmail.'.txt', $this->hashClient);

    }

    private function session() {

        $this->init();

        $this->setSession('token', sha1($this->sessionId().$this->getSalt().$this->date));

        $this->setSession(md5($this->hashEmail), md5($this->hashClient));

    }

    public function __construct($email, $password)
    {
        parent::__construct();

        $this->date = date("Y-m-d");

        $this->checkAdmin($email, $password);
    }

    public function getRun() {

        return $this->run;

    }

}