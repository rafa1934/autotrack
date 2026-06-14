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
    <title>Editar OS</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>

<div class="container">

    <h1>AutoTrack</h1>
    <h3>Editar Ordem de Serviço</h3>

    <form action="atualizar_os.php" method="POST">

        <input type="hidden" name="id" value="<?php echo $os['id']; ?>">

        <label>Placa</label>
        <input type="text"
               value="<?php echo $os['placa']; ?>"
               readonly>

        <label>Defeito</label>
        <input type="text"
               value="<?php echo $os['defeito']; ?>"
               readonly>

        <label>Valor das Peças</label>
        <input type="number"
               step="0.01"
               name="valor_pecas"
               value="<?php echo $os['valor_pecas']; ?>"
               required>

        <label>Valor da Mão de Obra</label>
        <input type="number"
               step="0.01"
               name="valor_mao_obra"
               value="<?php echo $os['valor_mao_obra']; ?>"
               required>

        <button type="submit">
            Salvar Alterações
        </button>

    </form>

    <br>

    <a href="dashboard.php">Voltar</a>

</div>

</body>
</html>