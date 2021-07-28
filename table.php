<?php

namespace kingkernel\Database;

class table 
{
    public $env;
    static $table;
    public function __construct()
    {
        $_ENV["DATABASE"] = parse_ini_file(".env");
        $this->env = $_ENV["DATABASE"];
        return $this;
    }
    public function ola()
    {
        print_r($this->table);
    }
    public static function table($table)
    {
        $this->table = $table;
        return $this;
    }
}

