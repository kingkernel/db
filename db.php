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
            return $connection;
            } catch (\Throwable $th) {
            return $th;
        };
    }
    public static function select($query)
    {
        $cn = self::connect();
        self::$queryString = $query;
        self::$query = $cn->query(self::$queryString);
        self::$data = self::$query->fetchall(\PDO::FETCH_ASSOC);
        self::get();
    }
    public static function get()
    {
        self::connect();
        $data = json_encode(self::$data, JSON_PRETTY_PRINT);
        echo $data;
    }
    public static function toJson()
    {
        //$data = json_encode(self::$data);
        //self::$data = $data;
        //self::echo();
    }
}
