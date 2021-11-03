<?php
$dbs = "mysql:host=localhost;dbname=bookstore";
$dbname = "root";
$dbpassword = "";
try{
    $connection = new PDO($dbs, $dbname , $dbpassword, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
}catch(PDOException $e){
    die($e -> getMessage());
}
?>