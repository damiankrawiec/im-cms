<?php


class Run extends Session
{

    private $run;

    private $hashEmail;

    private $hashClient;

    private $date;

    private $addition;

    //Admins array
    private $admin = array();

    private function checkAdmin($email, $password) {

        if(isset($this->admin[$email])) {

            $adminData = $this->admin[$email];

            if (password_verify($password, $adminData['password'])) {

                $this->hashEmail = sha1($email . $this->getSalt() . $this->date);//Name of file (server side security)

                $this->hashClient = $this->encode(sha1($this->addition->getUserIp() . $this->getSalt() . $this->date));//Content of file (server side security)

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

        //Destroy in tool.class/logout()

        $this->setSession('token', sha1($this->sessionId().$this->getSalt().$this->date));

        $this->setSession(md5($this->hashEmail), $this->hashClient);

    }

    private function getAccount() {

        $dir = '../config/!account';

        $file = scandir($dir);

        if (count($file) > 2) {

            foreach ($file as $f) {

                if ($f == '.' or $f == '..')
                    continue;

                $fileContent = json_decode(file_get_contents($dir . '/' . $f));

                $this->admin[$fileContent->email] = array('image' => $fileContent->image, 'password' => $fileContent->password);

            }
        }

    }

    public function __construct($email, $password, $addition)
    {
        parent::__construct();

        $this->date = date("Y-m-d");

        $this->addition = $addition;

        $this->getAccount();

        $this->checkAdmin($email, $password);
    }

    public function getRun() {

        return $this->run;

    }

}