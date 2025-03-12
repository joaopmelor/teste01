<?php
include('conexaoDB/conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $data = $_REQUEST['val1'];
    
    if (empty($data)) {
        echo "usuário não encontrado";
    } else {
        echo $data;
    }
}

$conexao->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/scripts.js" defer></script>
    <title>Cadastro teste01</title>
</head>
<body>
    <div class="form">
        <form id="endereco-form" action="processab.php" method="POST">
            <fieldset>
                <legend>Cadastre-se</legend>
                <div class="inputForm">
                    <input type="integer" name="user_id" id="user_id" class="user" required>
                    <label for="user_id" class="label-input">ID do usuário cadastrado</label>
                </div>
                <br><br>
                <div class="inputForm">
                    <label for="tipo_endereco">Tipo de endereço</label>
                        <select name="tipo_endereco" id="tipo_endereco" required>
                            <option id="opaco" disabled selected value>Tipo de endereço</option>
                            <option value="residencial">Residencial</option>
                            <option value="comercial">Comercial</option>
                        </select>
                </div>
                <br><br>
                <div class="inputForm">
                    <input type="text" name="cep" id="cep" class="user" required>
                    <label for="cep" class="label-input">CEP</label>
                </div>
                <br><br>
                <div class="inputForm">
                    <input type="text" name="rua" id="rua" class="user" required>
                    <label for="rua" class="label-input">Rua</label>
                </div>
                <br><br>
                <div class="inputForm">
                    <input type="integer" name="numero" id="numero" class="user" required>
                    <label for="numero" class="label-input">Número</label>
                </div>
                <br><br>
                <div class="inputForm">
                    <input type="text" name="compl" id="compl" class="user">
                    <label for="compl" class="label-input">Complemento</label>
                </div>
                <br><br>
                <div class="inputForm">
                    <input type="text" name="bairro" id="bairro" class="user" required>
                    <label for="bairro" class="label-input">Bairro</label>
                </div>
                <br><br>
                <div class="inputForm">
                    <input type="text" name="estado" id="estado" class="user" required>
                    <label for="estado" class="label-input">Estado</label>
                </div>
                <br><br>
                <div class="inputForm">
                    <input type="text" name="cidade" id="cidade" class="user" required>
                    <label for="cidade" class="label-input">Cidade</label>
                </div>
                <br><br>
                <div id="enviar">
                    <a href="index.php">
                        <input type="submit" name="submit" id="submit" value="Submit">
                    </a>
                </div>
            </fieldset>
        </form>
    </div>
</body>
</html>