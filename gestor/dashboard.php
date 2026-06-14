<?php
session_start();
include("../config/conexao.php");

$sql = "SELECT * FROM ordens_servico WHERE status = 'Pendente'";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Painel do Gestor</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>

<div class="container">

    <h1>AutoTrack</h1>
    <h3>Painel do Gestor</h3>

    <p>Bem-vindo, <?php echo $_SESSION['nome']; ?></p>
    <?php

    if(isset($_GET['msg'])){

    if($_GET['msg'] == 'atualizada'){
        echo "<p style='color:green; font-weight:bold;'>
                Ordem de Serviço atualizada com sucesso!
              </p>";
    }

    if($_GET['msg'] == 'erro'){
        echo "<p style='color:red; font-weight:bold;'>
                Erro ao atualizar a Ordem de Serviço.
              </p>";
    }
    }
    ?>
    <?php if($resultado->num_rows == 0){ ?>

    <p>Nenhuma Ordem de Serviço pendente no momento.</p>

    <?php } ?>

    <?php while($os = $resultado->fetch_assoc()) { ?>

        <p>
            <strong>Placa:</strong> <?php echo $os['placa']; ?><br>
            <strong>Defeito:</strong> <?php echo $os['defeito']; ?><br>
            <strong>Peças:</strong> R$ <?php echo $os['valor_pecas']; ?><br>
            <strong>Mão de obra:</strong> R$ <?php echo $os['valor_mao_obra']; ?><br>
            <strong>Status:</strong>

            <span class="<?php echo strtolower($os['status']); ?>">
            <?php echo $os['status']; ?>
            </span><br><br>
            <strong>Data:</strong>
            <?php echo date("d/m/Y H:i", strtotime($os['data_criacao'])); ?>
            <br><br>
            <strong>Observação:</strong>

            <?php
            if(!empty($os['observacao'])){
            echo $os['observacao'];
            }else{
            echo "Nenhuma observação";
            }
            ?> 
            <br><br>

            <a href="analisar.php?id=<?php echo $os['id']; ?>">
                Analisar OS
            </a>
        </p>

        <hr>

    <?php } ?>

    <a href="../logout.php">Sair</a>

</div>

</body>
</html>