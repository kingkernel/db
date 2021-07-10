<?php
define('DB_HOST'        , "localhost");
define('DB_USER'        , "root");
define('DB_PASSWORD'    , "root");
define('DB_NAME'        , "dbkingkernel");
define('DB_DRIVER'      , "mysql");

require(__DIR__ .'/vendor/autoload.php');

use Kingkernel\Database\DB;

//DB::teste();

/*
try{

    $Conexao = Conexao::getConnection();
    $query = $Conexao->query('show databases');
    $tabelas = $query->fetchAll();

 }catch(Exception $e){

    echo $e->getMessage();
    exit;

 }
*/
