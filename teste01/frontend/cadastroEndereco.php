<?php
include('../backend/conexaoDB/conexao.php');

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
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/cadastroEndereco.css">
    <link rel="stylesheet" href="css/mensagem.css">
    <title>Cadastro teste01</title>
</head>

<?php if (isset($_GET['status'])): ?>
    <div id="mensagem-bg" style="display: flex;">
        <div id="mensagem-fs">
            <div id="mensagem">
                <h4>Cadastro de endereço:</h4>
                <p>
                    <?php 
                        if ($_GET['status'] == 'sucesso') {
                            echo 'Endereço cadastrado com sucesso!';
                        } else if ($_GET['status'] == 'erro') {
                            echo 'Erro ao cadastrar endereço.<br>Tente novamente.';
                        }
                    ?>
                </p>
                <?php
                    if ($_GET['status'] == 'sucesso') {
                        echo "<a href='../frontend/index.php'><button id='btn-s'>Voltar para página inicial</button></a>";
                    } else if ($_GET['status'] == 'erro') {
                        echo "<button id='btn-n'>Fechar</button>";
                    }
                ?>
            </div>
        </div>
    </div>
<?php endif; ?>


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

    <div id="mensagem-bg">
        <div id="mensagem-fs">
            <div id="mensagem">
                <h4>Mensagem:</h4>
                <p>CEP inválido.</p>
            </div>
            <button>Fechar</button>
        </div>
    </div>

    <a id="home-link" href="../frontend/"><i class="bi bi-house-fill"></i></a>

<script src="../backend/js/format.js" defer></script>
<script src="../backend/js/apiCep.js" defer></script>
<script src="../backend/js/mensagem.js" defer></script>
</body>
</html>