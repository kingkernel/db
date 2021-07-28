<?php
session_start();
require(__DIR__ .'/vendor/autoload.php');

use Kingkernel\Database\DB;

//DB::RAW("show tables");
DB::call("selforid_users", [20]);
