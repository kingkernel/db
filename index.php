<?php
require(__DIR__ .'/vendor/autoload.php');
$_ENV = parse_ini_file('.env');
use Kingkernel\Database\DB;


DB::teste();

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