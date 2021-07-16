<?php
session_start();
require(__DIR__ .'/vendor/autoload.php');

use Kingkernel\Database\DB;
//$_SESSION["DB"] = parse_ini_file(".env");
//$_ENV["DBCONFIG"] = parse_ini_file(".env");
//print_r($_ENV["DBCONFIG"]);
//echo "ola";
DB::load_databases();

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
