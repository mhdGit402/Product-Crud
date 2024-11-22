<?php

namespace app\inc;

require_once("config.php");
class Database
{
    public $conn;
    public function __construct()
    {
        $this->conn = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
}
