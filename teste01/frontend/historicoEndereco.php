<?php
include('../backend/conexaoDB/conexao.php');
include('../backend/consultaSQL.php');

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    $stmt = $conexao->prepare($sqlHistEndereco);

    if ($stmt === false) {
        die("Erro na preparação da consulta SQL: " . $conexao->error);
    }

    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $stmt->close();
} else {
    die('ID do usuário não fornecido.');
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <script src="https://kit.fontawesome.com/457a315592.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/historicoEndereco.css">
    <title>Consulta teste 01</title>
</head>
<body>
<?php if ($result->num_rows > 0): ?>
    <?php $row = $result->fetch_assoc(); ?>
    <h2>Histórico de endereços</h2>
    <h3><?php echo $row['nome']; ?></h3>
    <div id="table-bg">
        <div id="table-div">
            <table>
                <tr>
                    <th>Tipo de endereço</th>
                    <th>CEP</th>
                    <th>Rua</th>
                    <th>Número</th>
                    <th>Complemento</th>
                    <th>Bairro</th>
                    <th>Estado</th>
                    <th>Cidade</th>
                    <th>Data e Hora</th>
                </tr>
                <?php
                    $result->data_seek(0);
                    while ($row = $result->fetch_assoc()):
                ?>
                    <tr>
                        <td><?php echo $row['tipo_endereco']; ?></td>
                        <td><?php echo $row['cep']; ?></td>
                        <td><?php echo $row['rua']; ?></td>
                        <td><?php echo $row['numero']; ?></td>
                        <td><?php echo $row['compl']; ?></td>
                        <td><?php echo $row['bairro']; ?></td>
                        <td><?php echo $row['estado']; ?></td>
                        <td><?php echo $row['cidade']; ?></td>
                        <td><?php echo date('d/m/Y H:i', strtotime($row['action_timestamp'])); ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </div>
<?php else: ?>
    <p id="nenhum">Nenhum endereço encontrado para este usuário.</p>
<?php endif; ?>

<?php $conexao->close(); ?>

<a id="home-link" href="../frontend/"><i class="bi bi-house-fill"></i></a>

</body>
</html>