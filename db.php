<?php
/**
 * Class name: DB
 * Function : Work all basic functions like connect and CRUD
 * Data creation : 2021-07-09
 * Autors : Daniels Hogans
 * Email : daniel.santos.ap@gmail.com
 */

namespace Kingkernel\Database;

abstract class DB
{
    private $host;
    private $dbname;
    private $dbuser;
    private $dbpassword;
    private $port;
    private $drive;
    public $connection;

    public function __construct($env)
    {
        $this->dbhost = $_ENV['DB_HOST'];
        $this->dbuser = $_ENV['DB_USER'];
        $this->dbpassword = $_ENV['DB_PASSWORD'];
        $this->dbname = $_ENV['DB_NAME'];
        $this->drive = $_ENV['DB_DRIVER'];
        return $this;
    }
    private function connection()
    {

    }
    public function load_databases()
    {

    }
    public static function teste()
    {
       
    }
    public static function getConnection() {

        switch ($this->drive){
            case 'sqlsrv':
                $pdoConfig  = DB_DRIVER . ":". "Server=" . DB_HOST . ";";
                $pdoConfig .= "Database=".DB_NAME.";";
            break;
            case 'mysql' :
                $pdoConfig  = $this->drive . ":". "host=" . $this->dbhost . ";";
                $pdoConfig .= "dbname=".$this->dbname.";";
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