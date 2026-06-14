<?php

session_start();

include("config/conexao.php");

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";

$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {

    $usuario = $resultado->fetch_assoc();

    $_SESSION['usuario_id'] = $usuario['id'];
    $_SESSION['nome'] = $usuario['nome'];
    $_SESSION['tipo'] = $usuario['tipo'];

    if ($usuario['tipo'] == 'oficina') {
        header("Location: oficina/dashboard.php");
    } else {
        header("Location: gestor/dashboard.php");
    }

} else {
    echo "Login incorreto";
}

?>