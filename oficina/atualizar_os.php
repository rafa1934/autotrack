<?php

session_start();
include("../config/conexao.php");

$id = $_POST['id'];
$valor_pecas = $_POST['valor_pecas'];
$valor_mao_obra = $_POST['valor_mao_obra'];

$sql = "UPDATE ordens_servico
        SET valor_pecas = '$valor_pecas',
            valor_mao_obra = '$valor_mao_obra'
        WHERE id = $id";

if($conn->query($sql)){
    header("Location: dashboard.php");
    exit();
}else{
    echo "Erro ao atualizar.";
}

?>