<?php
$dsn="mysql:host=localhost;dbname=drae_agri";
$user="root";
$pwd="";
$bdd = new PDO ($dsn,$user,$pwd,array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
$bdd->exec("SET NAMES utf8");
?>