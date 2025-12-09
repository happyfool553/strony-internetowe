<?php
$host='localhost';
$dbname = "Klimchi";
$user = 'admin';
$pass = 'adminPass';
$dsn = "mysql:host=$host;dbname=$dbname;";


try{
    $pdo = new PDO($dsn, $user, $pass);
} catch (PDOException $e){
    echo "Connection error: " .$e->getMessage();
}
?>