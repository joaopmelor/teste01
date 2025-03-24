<?php
include('../conexaoDB/conexao.php');

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
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/cadastroEndereco.css">
    <script src="../js/format.js" defer></script>
    <script src="../js/apiCep.js" defer></script>
    <title>Cadastro teste01</title>
</head>
<body>
    <div id="form-div">
        <form id="endereco-form" action="../backend/processaEndereco.php" method="POST">
            <fieldset>
                <legend>Endereço</legend>
                <div class="inputForm">
                    <select name="tipo_endereco" id="tipo_endereco" class="form-input" required>
                        <option id="disabled" disabled selected value>Tipo de endereço</option>
                        <option value="Residencial">Residencial</option>
                        <option value="Comercial">Comercial</option>
                    </select>
                </div>
                <br>
                <div class="inputForm">
                    <input type="text" name="cep" id="cep" class="form-input" oninput="formatCEP(this)" maxlength="9" placeholder="CEP" required>
                </div>
                <br>
                <div class="inputForm">
                    <input type="text" name="estado" id="estado" class="form-input" placeholder="Estado" required>
                </div>
                <br>
                <div class="inputForm">
                    <input type="text" name="cidade" id="cidade" class="form-input" placeholder="Cidade" required>
                </div>
                <br>
                <div class="inputForm">
                    <input type="text" name="bairro" id="bairro" class="form-input" placeholder="Bairro" required>
                </div>
                <br>
                <div class="inputForm">
                    <input type="text" name="rua" id="rua" class="form-input" placeholder="Rua" required>
                </div>
                <br>
                <div class="dois">
                    <div class="inputForm">
                        <input type="integer" name="numero" id="numero" class="form-input" placeholder="Número" required>
                    </div>
                    <div class="inputForm">
                        <input type="text" name="compl" id="compl" class="form-input" placeholder="Complemento">
                    </div>
                </div>
            </fieldset>

            
            <div id="enviar-div">
                <input type="submit" name="submit" id="enviar" value="Enviar">
            </div>
        </form>
    </div>
</body>
</html>