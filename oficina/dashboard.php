<?php
session_start();
include("../config/conexao.php");

$usuario_id = $_SESSION['usuario_id'];

$sql = "SELECT * FROM ordens_servico WHERE usuario_id = $usuario_id";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Painel da Oficina</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>

<div class="container">

    <h1>AutoTrack</h1>
    <h3>Painel da Oficina</h3>

    <p>Bem-vindo, <?php echo $_SESSION['nome']; ?></p>
    <?php

    if(isset($_GET['msg'])){

    if($_GET['msg'] == 'cadastrada'){
        echo "<p style='color:green; font-weight:bold;'>
                Ordem de Serviço cadastrada com sucesso!
              </p>";
    }

    if($_GET['msg'] == 'atualizada'){
        echo "<p style='color:green; font-weight:bold;'>
                Ordem de Serviço atualizada pelo gestor!
              </p>";
    }

    if($_GET['msg'] == 'erro'){
        echo "<p style='color:red; font-weight:bold;'>
                Ocorreu um erro na operação.
              </p>";
    }
    }
    ?>

    <a href="nova_os.php">Cadastrar nova OS</a>
    <br><br>

    <?php while($os = $resultado->fetch_assoc()) { ?>

        <p>
            <strong>Placa:</strong> <?php echo $os['placa']; ?><br>
            <strong>Defeito:</strong> <?php echo $os['defeito']; ?><br>
            <strong>Peças:</strong> R$ <?php echo $os['valor_pecas']; ?><br>
            <strong>Mão de obra:</strong> R$ <?php echo $os['valor_mao_obra']; ?><br>
            <strong>Status:</strong>

            <span class="<?php echo strtolower($os['status']); ?>">
            <?php echo $os['status']; ?>
            </span><br>

            <strong>Observação:</strong>

            <?php
            if(!empty($os['observacao'])){
            echo $os['observacao'];
            }else{
            echo "Nenhuma observação";
            }
            ?>

            <br>

            <strong>Data:</strong>
            <?php echo date("d/m/Y H:i", strtotime($os['data_criacao'])); ?>
            <?php if($os['status'] == 'Pendente'){ ?>
            <br>
            <a href="editar_os.php?id=<?php echo $os['id']; ?>">
            Editar valores da OS
            </a>
            <?php } ?>
        </p>

        <hr>

    <?php } ?>

    <a href="../logout.php">Sair</a>

</div>

</body>
</html>