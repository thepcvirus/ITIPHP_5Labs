<?php
class Dbconf{
static $conn;
function __construct(){
    define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "PHPLABDB");
define("DB_PORT", "3306");

try {
$this->conn = mysqli_connect(DB_HOST, 'root', DB_PASSWORD, DB_DATABASE, DB_PORT);
//var_dump($conn);
echo 'Connection Success';
} catch (Exception $e) {
echo 'Connection failed: ' . $e->getMessage();
}   
}
}
