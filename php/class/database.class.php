<?php


class Database extends Setting
{
    private $pdo;

    private $prepare;

    public function __construct() {

        $this->connect();

    }

    private function connect() {

        try {

            $this->pdo = new PDO(
                "mysql:host = $this->host;database = $this->database;port = $this->port",
                $this->user,
                $this->password
            );

        }
        catch(PDOException $err){

            $err->getMessage();

        }

    }

    public function prepare($sql = false) {

        if($this->pdo and $sql) {



        }


    }

}