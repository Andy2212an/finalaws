<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

$serverName = getenv('DB_HOST') ?: 'tcp:crudmascotas4.database.windows.net,1433';
$connectionInfo = [
    "UID" => getenv('DB_USER') ?: 'Andysql',
    "pwd" => getenv('DB_PASS') ?: 'YOUR_PASSWORD_HERE',
    "Database" => getenv('DB_DATABASE') ?: 'bd_crud',
    "LoginTimeout" => 30,
    "Encrypt" => 1,
    "TrustServerCertificate" => 0
];

$conn = sqlsrv_connect($serverName, $connectionInfo);
if ($conn === false) {
    echo "Error sqlsrv:\n";
    print_r(sqlsrv_errors());
} else {
    echo "Conexión sqlsrv OK\n";
    sqlsrv_close($conn);
}

