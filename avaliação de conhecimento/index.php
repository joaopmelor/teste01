<?php
    include('conexaoDB/conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="consulta.css">
    <title>Consulta teste 01</title>
</head>
<body>
<div class="form">
        <form method="POST">
            <fieldset>
                <legend>Consulta</legend>
                <div class="inputForm">
                    <input type="text" name="nome" id="nome" class="user" required>
                    <label for="nome" class="label-input">Nome</label>
                </div>
                <br><br>
                <div class="inputForm">
                    <input type="text" name="cpf" id="cpf" class="cpf" required>
                    <label for="cpf" class="label-input">CPF</label>
                </div>
                <br><br>
                <div id="consultar-div"><button type="submit" name="consultar" id="consultar">Consultar cadastros</button></div>
            </fieldset>
        </form>

        <div class="cadastrolink">
            <a href="cadastro.php">Cadastrar conta</a>
        </div>
    </div>

    <?php
        
    ?>
</body>
</html>