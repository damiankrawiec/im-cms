<?php


class Database extends systemSetting
{
    private $pdo;

    private $prepare;

    public function __construct() {

        $this->connect();

    }

    private function connect() {

        try {

            $this->pdo = new PDO(
                $this->dsn,
                $this->user,
                $this->password
            );

        }
        catch(PDOException $err){

            $err->getMessage();

        }

    }

    private function execute($parameter = false) {

        $this->pdo->query("SET NAMES 'utf8'");

        if($this->prepare) {

            if($parameter and is_array($parameter)) {
echo 'ok';
                $execute = $this->prepare->execute($parameter);

            }else{

                $execute = $this->prepare->execute();

            }

            if($execute) {

                if($lastInsertId = $this->pdo->lastInsertId()) {

                    return $lastInsertId;

                }else{

                    return true;

                }

            }else{

                echo '[ERROR]: execute()';

                //Usunac w srodowisku produkcyjnym
                var_dump($this->prepare);
                //--

                return false;

            }

        }else{

            echo '[ERROR]: execute()';

            return false;
        }

    }

    public function prepare($sql = false) {

        if($this->pdo and $sql) {

            $this->prepare = $this->pdo->prepare($sql);

        }

    }

    public function run($type = false, $parameter = false) {

        if($parameter and is_array($parameter)) {

            $execute = $this->execute($parameter);

        }else{

            $execute = $this->execute();

        }

        if ($execute) {

            if ($type) {

                if (stristr($type, 'select:')) {

                    $type = explode(':', $type);

                    switch ($type[1]) {

                        case 'all':
                            return $this->prepare->fetchAll();
                            break;

                        case 'object':
                            return $this->prepare->fetchObject();
                            break;

                        default:
                            return $this->prepare->fetchAll();
                            break;

                    }

                }

            } else return $execute;

        } else {

            echo '[ERROR]: run()';

            exit();
        }

    }

}