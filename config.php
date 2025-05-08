<?php 
$dbname = 'loja';
$localhost = 'localhost';
$user = 'root';
$pass = '';

$pdo = new PDO("mysql:dbname=$dbname;host=$localhost", $user, $pass);
?>