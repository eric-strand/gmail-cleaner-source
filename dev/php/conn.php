<?php 
$host = 'localhost';
$user = 'eristr368';
$pass = '';
$db = 'c9';

$dsn = "mysql:dbname=$db;host=$host;charset=utf8";

$settings = array(
        
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION

);

try {
    $pdo = new PDO($dsn, $user, $pass, $settings);
} catch(PDOException $e) {
    echo "Kunde inte koppla mot db. <br>" . $e->getMessage();
    exit;
}
