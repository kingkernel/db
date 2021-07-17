<?php
session_start();
require(__DIR__ .'/vendor/autoload.php');

use Kingkernel\Database\DB;
DB::select("show tables");
