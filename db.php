<?php
/**
 * Class name: DB
 * Function: work all basic feactures of database, like conncet and CRUD
 * Autors: Daniels Hogans - daniel.santos.ap@gmail.com
 * Data creation: 2021-07-09
 */
namespace kingkernel\Database;

abstract class DB 
{
    private $drive;
    private $dbname;
    private $dbhost;
    private $dbuser;
    public $connection;

    public function __construct()
    {
        env()
    }
    private function connection()
    {

    }
    public static function ifExists()
    {
        echo "ola mundo";
    }
    public static function connect ()
    {

    }
    public static function getConnection() {

        $pdoConfig  = DB_DRIVER . ":". "Server=" . DB_HOST . ";";
        $pdoConfig .= "Database=".DB_NAME.";";

        try {
            if(!isset($connection)){
                $connection =  new PDO($pdoConfig, DB_USER, DB_PASSWORD);
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
                return $this->connection;

            } catch (PDOException $e) {
                $mensagem = "Drivers disponiveis: " . implode(",", PDO::getAvailableDrivers());
                $mensagem .= "\nErro: " . $e->getMessage();
                throw new Exception($mensagem);
         }
     }
}
