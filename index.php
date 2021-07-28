<?php
session_start();
require(__DIR__ .'/vendor/autoload.php');
$_ENV = parse_ini_file('.env');
use Kingkernel\Database\DB;

//DB::RAW("show tables");
DB::call("selforid_users", [20]);

