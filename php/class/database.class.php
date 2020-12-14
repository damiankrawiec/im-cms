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
                $this->error('Error in bindType(), type of parameter is wrong', $type);
                exit();

        }

        return $typeReturn;

    }
    private function error($mainInfo, $mainInfoSupplement = false, $supplementInfo = false) {

        echo '<div style="background-color: #fff; padding: 10px; border: 5px solid #aaa; margin-top: 10px">';

            echo '<div style="color: #000; font-family: Courier; padding: 10px; background-color: #eee; font-weight: bold">'.$mainInfo.': '.__LINE__.'</div>';

            if($mainInfoSupplement)
                echo '<p style="color: #bd3535; font-family: Courier">'.$mainInfoSupplement.'</p>';

            if($supplementInfo)
                var_dump($supplementInfo);

            $debugArray = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);

            foreach ($debugArray as $i => $d) {

                echo '<br><strong>'.$i.':</strong>';
                echo '<div style="padding: 10px; border: 1px solid red">';

                    var_dump($d);

                echo '</div>';



            }

        echo '</div>';

        exit();

    }

    public function prepare($sql = false) {

        if ($this->pdo) {

            if ($sql) {

                $this->pdo->query("set names 'utf8'");

                $this->sql = $sql;

                $this->prepare = $this->pdo->prepare($this->sql);

            } else {

                $this->error('Error in prepare(), sql query is no set');

            }

        } else {

            $this->error('Error in prepare(), connection with database is not established');

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

                $this->error('Error in bind(), sql query is set, prepare is set, number parameters in bind not match in parameters array', $this->sql, $this->parameter);

            }

        }else{

            $this->error('Error in bind(), sql query is set, prepare is set, parameters are not defined, but in sql query are variables with ":"', $this->sql);

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

                $this->error('Error in run(), sql query is set, prepare is set, parameters match, error is probably in query or in parameters (type, empty, etc.): ', $this->sql, $this->parameter);

            }

        }else{

            var_dump('Prepare statement is not defined');

            exit();

        }

    }

}