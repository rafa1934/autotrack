<?php
session_start();
include("../config/conexao.php");

$id = $_GET['id'];

$sql = "SELECT * FROM ordens_servico WHERE id = $id";
$resultado = $conn->query($sql);
$os = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Analisar OS</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>

<div class="container">

    <h1>AutoTrack</h1>
    <h3>Analisar Ordem de Serviço</h3>

    <form action="atualizar_os.php" method="POST">

        <input type="hidden" name="id" value="<?php echo $os['id']; ?>">

        <input type="text" name="placa" value="<?php echo $os['placa']; ?>" readonly>

        <input type="text" name="defeito" value="<?php echo $os['defeito']; ?>" readonly>

        <input type="number" step="0.01" name="valor_pecas" value="<?php echo $os['valor_pecas']; ?>">

        <input type="number" step="0.01" name="valor_mao_obra" value="<?php echo $os['valor_mao_obra']; ?>">

        <select name="status" required>
            <option value="Aprovada">Aprovar</option>
            <option value="Reprovada">Reprovar</option>
        </select>
        <textarea
            name="observacao"
            placeholder="Observações do gestor"
            rows="5">
        </textarea>

        <button type="submit">Atualizar OS</button>

    </form>

    <br>
    <a href="dashboard.php">Voltar</a>

</div>

</body>
</html>