<?php

session_start();

include("../config/conexao.php");

$placa = strtoupper($_POST['placa']);
$defeito = $_POST['defeito'];
$valor_pecas = $_POST['valor_pecas'];
$valor_mao_obra = $_POST['valor_mao_obra'];

$usuario_id = $_SESSION['usuario_id'];

$sql = "INSERT INTO ordens_servico
(
    placa,
    defeito,
    valor_pecas,
    valor_mao_obra,
    usuario_id
)

VALUES

(
    '$placa',
    '$defeito',
    '$valor_pecas',
    '$valor_mao_obra',
    '$usuario_id'
)";

if($conn->query($sql)){
    header("Location: dashboard.php?msg=cadastrada");
    exit();
}else{
    header("Location: dashboard.php?msg=erro");
    exit();
}

