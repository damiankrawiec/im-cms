<?php


class Database extends systemSetting
{

    private $sql;

    private $pdo;

    private $prepare;

    private $parameter;

    public function __construct() {

        $this->sql = false;

        $this->pdo = false;

        $this->prepare = false;

        $this->parameter = 'No parameters';

        $this->connect();

    }

    private function connect() {

        try {

            $this->pdo = new PDO(
                $this->dsn,
                $this->user,
                $this->password
            );

        }catch(PDOException $err){

            $err->getMessage();

        }

    }

    private function bindType($type) {

        switch ($type) {

            case 'int':
                $typeReturn = PDO::PARAM_INT;
                break;

            case 'string':
                $typeReturn = PDO::PARAM_STR;
                break;

            case 'bool':
                $typeReturn = PDO::PARAM_BOOL;
                break;

            default:
                var_dump('Wrong binding type: '.$type);
                exit();
                break;

        }

        return $typeReturn;

    }

    public function prepare($sql = false) {

        if($sql and $this->pdo) {

            $this->pdo->query("set names 'utf8'");

            $this->sql = $sql;

            $this->prepare = $this->pdo->prepare($this->sql);

        }

    }

    public function bind($parameter = false) {

        if($parameter and is_array($parameter) and count($parameter) > 0) {

            if(substr_count($this->sql, ':') == count($parameter)) {

                $this->parameter = $parameter;

                foreach ($parameter as $p) {

                    $this->prepare->bindValue($p['name'], $p['value'], $this->bindType($p['type']));

                }

            }else{

                var_dump('SQL query variables do not match: '.$this->sql);

                exit();

            }

        }else{

            var_dump('Bind parameter must exists: '.$this->sql);

            exit();

        }

    }

    //display: all (array), one (object)
    public function run($display = false) {

        if($this->prepare) {

            $execute = $this->prepare->execute();

            if ($execute) {

                //select query
                if ($display) {

                    $displayReturn = false;

                    //When return many records (more than 1), then return 2D array
                    //When return one record, then return object with his properties
                    switch ($display) {

                        case 'all':
                            $arrayRow = $this->prepare->fetchAll();
                            if(count($arrayRow) > 0) {

                                $displayReturn = $arrayRow;

                            }else{

                                $displayReturn = false;

                            }
                            break;

                        case 'one':
                            $displayReturn = $this->prepare->fetchObject();
                            break;


                    }

                    //Return "false" when count of row is 0
                    return $displayReturn;



                //insert, update, delete query
                }else{

                    if($this->pdo->lastInsertId()) {

                        return $this->pdo->lastInsertId();

                    }else{

                        return true;

                    }

                }

            }else{

                //Remove in "production environment"

                var_dump('Error execute() in run()');

                echo $this->sql;

                var_dump($this->parameter);

                exit();
            }

        }else{

            var_dump('Prepare statement is not defined');

            exit();

        }

    }

}