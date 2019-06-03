<?php


class Database extends systemSetting
{

    private $sql;

    private $pdo;

    private $prepare;

    public function __construct() {

        $this->sql = false;

        $this->pdo = false;

        $this->prepare = false;

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

        $typeReturn = false;

        switch ($type) {

            case 'int':
                $typeReturn = PDO::PARAM_INT;
                break;

            default:
                var_dump('Wrong binding type: '.$type);
                exit();
                break;

        }

        return $typeReturn;

    }

    private function prepare($sql = false) {

        if($sql and $this->pdo) {

            $this->sql = $sql;

            $this->prepare = $this->pdo->prepare($this->sql);

        }

    }


    /**
     * @param bool $parameter
     *
     * Parametr bedacy tablica ktora w petli przyjmuje "bindy" do zapytania SQL
     * liczba parametrow do zbindowania w zapytaniu select (:) musi się rownac wielkosci tablicy (count())
     * Pozycje w tablicy $parameter:
     * 1. odniesienie do zmiennej w zapytaniu sql (name)
     * 2. wartosc (value)
     * 3. typ zmiennej (type)
     */
    private function run($parameter = false, $display = false) {

        if($this->prepare) {

            $this->pdo->query("SET NAMES 'utf8'");

            $execute = false;

            if($parameter and is_array($parameter) and count($parameter) > 0) {

                if(substr_count($this->sql, ':') == count($parameter)) {

                    foreach ($parameter as $p) {

                        $this->prepare->bindValue($p['name'], $p['value'], $this->bindType($p['type']));

                    }

                }else{

                    var_dump('SQL query variables do not match: '.$this->sql);

                    exit();

                }

            }

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

                    $executeReturn = false;

                    if($this->pdo->lastInsertId()) {

                        $executeReturn = $this->pdo->lastInsertId();

                    }else{

                        $executeReturn = true;


                    }

                    return $executeReturn;

                }

            } else {

                //Remove in "production environment"

                var_dump('error execute() in run()');

                var_dump($this->sql);

                exit();
            }

        }

    }

    public function sql($sql = false) {

        if($sql) {

            $this->prepare($sql['query']);

            return $this->run($sql['parameter'], $sql['display']);

        }else{

            var_dump('wrong array sql parameter');

        }

    }

}