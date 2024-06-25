<?php
$url = "localhost";
$usuario = "root";
$senha = "";
$dbname = "provaaaaaa";

$conn = mysqli_connect($url, $usuario, $senha, $dbname);

if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}
?>
