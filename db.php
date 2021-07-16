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
    public $connection;
    public $config;
    public static $teste;

    public function __construct()
    {
        
    }
    public static function init()
    {
        $_ENV["DATABASE"] = parse_ini_file(".env");
        return $_ENV["DATABASE"];
    }
    public static function load_databases()
    {
        $dbInfo = self::init();
        $dbuser = $dbInfo["DB_USER"];
        $pdoConfig  = $dbInfo["DB_DRIVER"] . ":". "host=" . $dbInfo["DB_HOST"] . ";";
        $pdoConfig .= "dbname=".$dbInfo["DB_NAME"];
        try {
            $connection = new \PDO($pdoConfig, $dbInfo["DB_USER"], $dbInfo['DB_PASSWORD']);
            $connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\Throwable $th) {
            //throw $th;
            print_r($th);
        };
        //print_r($dbInfo);
        //print_r($pdoConfig);
        //print_r(self::init());
        //$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //$sql = 'show databases';
        //$query = $connection->query($sql);
        //$query->fetcAll();
        //print_r($query);
    }
    public static function teste()
    {
        print_r($this);
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
