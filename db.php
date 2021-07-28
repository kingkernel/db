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
    private static $connect;
    private static $queryString;
    private static $query;
    private static $data;
    private static $th;

    public function __construct()
    {

    }
    public static function init()
    {
        $_ENV["DATABASE"] = parse_ini_file(".env");
        return $_ENV["DATABASE"];
    }
    public static function connect()
    {
        $dbInfo = self::init();
        $pdoConfig  = $dbInfo["DB_DRIVER"] . ":". "host=" . $dbInfo["DB_HOST"] . ";";
        $pdoConfig .= "dbname=".$dbInfo["DB_NAME"];
        try {
            $connection = new \PDO($pdoConfig, $dbInfo["DB_USER"], $dbInfo['DB_PASSWORD']);
            $connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            self::$connect = $connection;
            return self::$connect;
            } catch (\Throwable $th) {
                self::$th = $th;
                return self::$th;
        };
    }
    public static function RAW($query)
    {
        $cn = self::connect();
        self::$queryString = $query;
        self::$query = $cn->query(self::$queryString);
        self::$data = self::$query->fetchall(\PDO::FETCH_ASSOC);
        //return self::$data;
        self::get();
    }
    public static function get()
    {
        $data = json_encode(self::$data, JSON_PRETTY_PRINT);
        echo $data;
    }
    public static function call($string, $argArry)
    {
        if(!is_string($string)){
            echo 'the first argument must be string';
            exit;
        };
        if(!is_array($argArry)){
            echo 'the second argument must be an array';
            exit;
        };
        $cn = self::connect();
        $query = 'call '. $string .'('.implode(',', array_map('self::doubleQuotes', $argArry)).')';
        self::$queryString = $query;
        try {
            self::$query = $cn->query(self::$queryString);
            self::$data = self::$query->fetchall(\PDO::FETCH_ASSOC);
            self::get();
        } catch (\Throwable $th) {
            //throw $th;
            print_r($th);
        }
        //return self::$data;
        //self::get();
        //echo $query;
    }
    public static function doubleQuotes($string){
        $newString = '"'.$string.'"';
        return $newString;
    }
    public function __get($feacture)
    {
        switch ($feacture) {
            case 'get':
                echo "metodo get";
                break;
            case 'toJson':
                echo "metodo get";
                break;
            default:
                # code...
                break;
        }
    }
}
