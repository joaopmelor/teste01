<?php
    include('conexaoDB/conexao.php');
    include('busca.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/consulta.css">
    <title>Consulta teste 01</title>
</head>
<body>
<div class="form">
    <form action="" method="POST">
        <fieldset>
            <legend>Consulta</legend>
            <div class="inputForm">
                <input type="text" name="nome" id="nome" class="user" value="<?= isset($nome) ? $nome : '' ?>">
                <label for="nome" class="label-input">Nome</label>
            </div>
            <br><br>
            <div class="inputForm">
                <input type="text" name="cpf" id="cpf" class="user" value="<?= isset($cpf) ? $cpf : '' ?>">
                <label for="cpf" class="label-input">CPF</label>
            </div>
            <br><br>
            <div id="consultar-div">
                <button type="submit" name="consultar" id="consultar">Consultar cadastros</button>
            </div>
        </fieldset>
    </form>

    <div class="cadastrolink">
        <a href="cadastro.php">Cadastrar usuário</a>
    </div>
</div>

<?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
    <?php if (!empty($busca)): ?>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome Social</th>
            <th>CPF</th>
            <th>Nome do pai</th>
            <th>Nome da mãe</th>
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
            </tr>
        <?php endforeach; ?>
    </table>
    <?php else: ?>
        <tr>
            <td colspan="6">Nenhum usuário encontrado</td>
        </tr>
    <?php endif; ?>
<?php endif; ?>

<?php $conexao->close(); ?>
</body>
</html>