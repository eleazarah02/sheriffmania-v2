<?php
session_start();
define('DB_SERVER', 'mysql.webcindario.com');
define('DB_USERNAME', 'sheriffmania');
define('DB_PASSWORD', 'Eleazar2019');
define('DB_DATABASE', 'sheriffmania');
define("BASE_URL", "https://sheriffmania.webcindario.com/"); 

function getDB() 
{
$dbhost=DB_SERVER;
$dbuser=DB_USERNAME;
$dbpass=DB_PASSWORD;
$dbname=DB_DATABASE;
try {
$dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass); 
$dbConnection->exec("set names utf8");
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
return $dbConnection;
}
catch (PDOException $e) {
echo 'La conexión falló: ' . $e->getMessage();
}

}
?>