<?php
session_start();
require(__DIR__ .'/vendor/autoload.php');

use Kingkernel\Database\DB;
use Kingkernel\Database\table;
$table = new table;
$table::table("usuarios")->ola();
//DB::select("select * from usuarios");
//DB::get();
