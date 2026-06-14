<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Nova OS - AutoTrack</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<script src="../js/validacao.js"></script>
<body>

<div class="container">

    <h1>AutoTrack</h1>
    <h3>Nova Ordem de Serviço</h3>

    <form action="salvar_os.php" method="POST">

        <input type="text" name="placa" maxlength="8" placeholder="ABC1D23 ou ABC-1234" required>

        <input type="text" name="defeito" placeholder="Descrição da falha" required>

        <input type="number" step="0.01" name="valor_pecas" placeholder="Valor das peças" required>

        <input type="number" step="0.01" name="valor_mao_obra" placeholder="Valor da mão de obra" required>

        <button type="submit">Salvar OS</button>

    </form>

    <br>

    <a href="dashboard.php">Voltar ao painel</a>

</div>

</body>
</html>