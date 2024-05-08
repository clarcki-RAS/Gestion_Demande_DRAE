<?php
$dsn="mysql:host=localhost;dbname=drae_agri";
$user="root";
$pwd="";
$pdo = new PDO ($dsn,$user,$pwd,array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
$pdo->exec("SET NAMES utf8");
?>