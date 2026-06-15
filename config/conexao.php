<?php

$host = "sql301.infinityfree.com";
$user = "if0_42184127";
$password = "D:bsVuYxpEq2Mh9";
$database = "if0_42184127_autotrack";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

?>