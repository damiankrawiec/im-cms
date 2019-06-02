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

    public function prepare($sql = false) {

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
    public function run($parameter = false, $display = false) {

        if($this->prepare) {

            $this->pdo->query("SET NAMES 'utf8'");

            $execute = false;

            if($parameter and is_array($parameter) and count($parameter) > 0) {

                if(substr_count($this->sql, ':') == count($parameter)) {

                    foreach ($parameter as $p) {

                        $execute = $this->prepare->bindValue($p['name'], $p['value'], $this->bindType($p['type']));

                    }

                }else{

                    var_dump('SQL query variable unmatch: '.$this->sql);

                    exit();

                }

            }else{

                $execute = $this->prepare->execute();

            }

            if ($execute) {

                if ($display) {

                    if (stristr($display, 'select:')) {

                        $displayType = explode(':', $display);

                        $displayReturn = false;

                        switch ($displayType[1]) {

                            case 'array-one':
                                $displayReturn = $this->prepare->fetch();
                                break;

                            case 'array-all':
                                $displayReturn = $this->prepare->fetchAll();
                                break;

                            case 'object-one':
                                $displayReturn = $this->prepare->fetchObject();
                                break;

                            default:
                                $displayReturn = $this->prepare->fetchAll();
                                break;

                        }

                        return $displayReturn;

                    }else{

                        var_dump('wrong delimiter in select run()');

                        exit();

                    }

                } else{

                    $executeReturn = false;

                    if($this->pdo->lastInsertId()) {

                        $executeReturn = $this->pdo->lastInsertId();

                    }else{

                        $executeReturn = true;


                    }

                    return $executeReturn;

                }

            } else {

                //Usunac w srodowisku produkcyjnym

                var_dump('error execute() in run()');

                var_dump($this->prepare);

                exit();
            }

        }

    }

}