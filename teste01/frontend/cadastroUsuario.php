<?php
include('../backend/conexaoDB/conexao.php');
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
    <link rel="stylesheet" href="css/cadastroUsuario.css">
    <link rel="stylesheet" href="css/mensagem.css">
    <title>Cadastro teste01</title>
</head>

<?php if (isset($_GET['status'])): ?>
    <div id="mensagem-bg" style="display: flex;">
        <div id="mensagem-fs">
            <div id="mensagem">
                <h4>Cadastro de usuário:</h4>
                <p>
                    <?php 
                        if ($_GET['status'] == 'sucesso') {
                            echo 'Usuário cadastrado com sucesso!';
                        } else if ($_GET['status'] == 'erro') {
                            echo 'Erro ao cadastrar o usuário.<br>Tente novamente.';
                        }
                    ?>
                </p>
                <?php
                    if ($_GET['status'] == 'sucesso') {
                        echo "<a href='../frontend/cadastroEndereco.php'><button id='btn-s'>Continuar</button></a>";
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

    <a id="home-link" href="../frontend/"><i class="bi bi-house-fill"></i></a>

<script src="../backend/js/format.js" defer></script>
<script src="../backend/js/mensagem.js" defer></script>
</body>
</html>