<?php
include('../backend/conexaoDB/conexao.php');
$conexao->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/cadastroUsuario.css">
    <script src="../backend/js/format.js"></script>
    <title>Cadastro teste01</title>
</head>
<body>

<div id="form-div">
        <form action="../backend/processaUsuario.php" method="POST">
            <fieldset>
                <legend>Cadastro</legend>
                <div class="inputForm">
                    <input type="text" name="nome" id="nome" class="form-input" placeholder="Nome" required>
                </div>
                <br>
                <div class="inputForm">
                    <input type="text" name="nome_social" id="nome_social" class="form-input" placeholder="Nome social">
                </div>
                <br>
                <div class="inputForm">
                    <input type="text" name="cpf" id="cpf" class="form-input" oninput="formatCPF(this)" maxlength="14" placeholder="CPF" required>
                </div>
                <br>
                <div class="inputForm">
                    <input type="text" name="pai" id="pai" class="form-input" placeholder="Nome do pai" required>
                </div>
                <br>
                <div class="inputForm">
                    <input type="text" name="mae" id="mae" class="form-input" placeholder="Nome da mãe" required>
                </div>
                <br>
                <div class="inputForm">
                    <input type="text" name="telefone" id="telefone" class="form-input" oninput="formatTelefone(this)" maxlength="14" placeholder="Telefone" required>
                </div>
                <br>
                <div class="inputForm">
                    <input type="email" name="email" id="email" class="form-input" placeholder="E-mail" required>
                </div>
            </fieldset>

            <div id="enviar-div">
                <input type="submit" name="submit" id="enviar" value="Continuar">
            </div>
        </form>
    </div>


</body>
</html>