<?php
/**
 * Class name: DB
 * Function: work all basic feactures of database, like conncet and CRUD
 * Autors: Daniels Hogans - daniel.santos.ap@gmail.com
 * Data creation: 2021-07-09
 */
namespace Kingkernel\Database;

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
    public function load_databases()
    {

    }
    public static function teste()
    {
        echo "ola mundo";
    }
    public static function getConnection() {

        switch (DB_DRIVER){
            case 'sqlsrv':
                $pdoConfig  = DB_DRIVER . ":". "Server=" . DB_HOST . ";";
                $pdoConfig .= "Database=".DB_NAME.";";
            break;
            case 'mysql' :
                $pdoConfig  = DB_DRIVER . ":". "host=" . DB_HOST . ";";
                $pdoConfig .= "dbname=".DB_NAME.";";
            break;
            }

        try {
            if(!isset($connection)){
                $connection =  new PDO($pdoConfig, DB_USER, DB_PASSWORD);
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
                return $connection;
            } catch (PDOException $e) {
                $mensagem = "Drivers disponiveis: " . implode(",", PDO::getAvailableDrivers());
                $mensagem .= "\nErro: " . $e->getMessage();
                throw new Exception($mensagem);
         }
     }
}
