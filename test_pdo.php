<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

$server = getenv('DB_HOST') ?: 'tcp:crudmascotas4.database.windows.net,1433';
$db = getenv('DB_DATABASE') ?: 'bd_crud';
$user = getenv('DB_USER') ?: 'Andysql';
$pass = getenv('DB_PASS') ?: 'YOUR_PASSWORD_HERE';

try {
    $conn = new PDO("sqlsrv:server=$server;Database=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión PDO OK\n";
} catch (PDOException $e) {
    echo "Error PDO: " . $e->getMessage() . "\n";
}

