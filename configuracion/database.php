<?php
$host = "127.0.0.1";
$user = "root";
$password = "";
$bd = "tienda_insumo";
$port = "3306";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $conn = new mysqli($host, $user, $password, $bd, $port);
    $conn->set_charset("utf8");
} catch (mysqli_sql_exception $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>