<?php
    include('../backend/conexaoDB/conexao.php');
    include('../backend/busca.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <script src="https://kit.fontawesome.com/457a315592.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/consulta.css">
    <script src="../backend/js/format.js"></script>
    <title>Consulta teste 01</title>
</head>
<body>
<div id="form-div">
    <form name="consultaForm" action="" method="POST">
        <fieldset>
            <legend>Consulta</legend>
            <div class="inputForm">
                <input type="text" name="nome" id="nome" class="form-input" placeholder="Nome" value="<?= isset($nome) ? $nome : '' ?>">
            </div>
            <br>
            <div class="inputForm">
                <input type="text" name="cpf" id="cpf" class="form-input" oninput="formatCPF(this)" maxlength="14" placeholder="CPF" value="<?= isset($cpf) ? $cpf : '' ?>">
            </div>
        </fieldset>

        
        <div id="consultar-div">
            <button type="submit" name="consultar" id="consultar">Consultar cadastros</button>
        </div>
    </form>

    <div id="cadastro-div">
        <a href="cadastroUsuario.php" id="cadastro">Cadastrar usuário</a>
    </div>
</div>

<?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
<?php if (!empty($busca)): ?>
    <div id="table-bg">
        <div id="table-div">
            <table>
                <tr>
                    <th>Nome</th>
                    <th>Nome Social</th>
                    <th>CPF</th>
                    <th>Pai</th>
                    <th>Mãe</th>
                    <th>Telefone</th>
                    <th>E-mail</th>
                    <th>Tipo de endereço</th>
                    <th>CEP</th>
                    <th>Rua</th>
                    <th>Número</th>
                    <th>Complemento</th>
                    <th>Bairro</th>
                    <th>Estado</th>
                    <th>Cidade</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
                <?php foreach ($busca as $row): ?>
                    <tr>
                        <td><?php echo $row['nome']; ?></td>
                        <td><?php echo $row['nome_social']; ?></td>
                        <td><?php echo $row['cpf']; ?></td>
                        <td><?php echo $row['pai']; ?></td>
                        <td><?php echo $row['mae']; ?></td>
                        <td><?php echo $row['telefone']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['tipo_endereco']; ?></td>
                        <td><?php echo $row['cep']; ?></td>
                        <td><?php echo $row['rua']; ?></td>
                        <td><?php echo $row['numero']; ?></td>
                        <td><?php echo $row['compl']; ?></td>
                        <td><?php echo $row['bairro']; ?></td>
                        <td><?php echo $row['estado']; ?></td>
                        <td><?php echo $row['cidade']; ?></td>
                        <td class="icon-center"><?php echo "<a href='../backend/editar.php?id=" . $row['id'] . "'><i class='bi bi-pencil-square'></i></a>"?></td>
                        <td class="icon-center"><?php echo "<a href='../backend/deletar.php?id=" . $row['id'] . "'><i class='bi bi-file-earmark-x'></i></a>"?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
<?php else: ?>
    <p>Nenhum usuário encontrado</p>
<?php endif; ?>
<?php endif; ?>

<?php $conexao->close(); ?>

</body>
</html>