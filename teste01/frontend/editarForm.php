<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="../frontend/css/style.css">
    <link rel="stylesheet" href="../frontend/css/cadastroEndereco.css">
    <link rel="stylesheet" href="../frontend/css/editar.css">
    <link rel="stylesheet" href="../frontend/css/mensagem.css">
    <title>Editar Cadastro teste01</title>
</head>

<?php if (isset($_GET['status'])): ?>
    <div id="mensagem-bg" style="display: flex;">
        <div id="mensagem-fs">
            <div id="mensagem">
                <h4>Alteração de dados:</h4>
                <p>
                    <?php 
                        if ($_GET['status'] == 'sucesso') {
                            echo 'Dados atualizados com sucesso!';
                        } else if ($_GET['status'] == 'erro') {
                            echo 'Erro ao atualizar os dados.<br>Tente novamente.';
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
        <form id="endereco-form" action="../backend/editar.php?id=<?= $user['id'] ?>" method="POST">
            <div id="fieldset-div">
                <fieldset>
                    <legend>Usuário</legend>

                    <!-- Dados pessoais -->
                    <div class="inputForm">
                        <input type="text" name="nome" id="nome" class="form-input" placeholder="Nome" value="<?= $user['nome'] ?>" required>
                    </div>
                    <br>
                    <div class="inputForm">
                        <input type="text" name="nome_social" id="nome_social" class="form-input" placeholder="Nome Social" value="<?= $user['nome_social'] ?>">
                    </div>
                    <br>
                    <div class="inputForm">
                        <input type="text" name="cpf" id="cpf" class="form-input" placeholder="CPF" oninput="formatCPF(this)" maxlength="14" value="<?= $user['cpf'] ?>" required>
                    </div>
                    <br>
                    <div class="inputForm">
                        <input type="text" name="pai" id="pai" class="form-input" placeholder="Nome do Pai" value="<?= $user['pai'] ?>" required>
                    </div>
                    <br>
                    <div class="inputForm">
                        <input type="text" name="mae" id="mae" class="form-input" placeholder="Nome da Mãe" value="<?= $user['mae'] ?>" required>
                    </div>
                    <br>
                    <div class="inputForm">
                        <input type="text" name="telefone" id="telefone" class="form-input" oninput="formatTelefone(this)" maxlength="14" placeholder="Telefone" value="<?= $user['telefone'] ?>" required>
                    </div>
                    <br>
                    <div class="inputForm">
                        <input type="email" name="email" id="email" class="form-input" placeholder="E-mail" value="<?= $user['email'] ?>" required>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Endereço</legend>

                    <!-- Dados de endereço -->
                    <div class="inputForm">
                        <select name="tipo_endereco" id="tipo_endereco" class="form-input" value="<?= $user['tipo_endereco'] ?>" required>
                            <option disabled value>Tipo de endereço</option>
                            <option value="Residencial" <?= ($user['tipo_endereco'] == 'Residencial') ? 'selected' : '' ?>>Residencial</option>
                            <option value="Comercial" <?= ($user['tipo_endereco'] == 'Comercial') ? 'selected' : '' ?>>Comercial</option>
                        </select>
                    </div>
                    <br>
                    <div class="inputForm">
                        <input type="text" name="cep" id="cep" class="form-input" oninput="formatCEP(this)" maxlength="9" placeholder="CEP" value="<?= $user['cep'] ?>" required>
                    </div>
                    <br>
                    <div class="inputForm">
                        <input type="text" name="estado" id="estado" class="form-input" placeholder="Estado" value="<?= $user['estado'] ?>" required readonly>
                    </div>
                    <br>
                    <div class="inputForm">
                        <input type="text" name="cidade" id="cidade" class="form-input" placeholder="Cidade" value="<?= $user['cidade'] ?>" required readonly>
                    </div>
                    <br>
                    <div class="inputForm">
                        <input type="text" name="bairro" id="bairro" class="form-input" placeholder="Bairro" value="<?= $user['bairro'] ?>" required readonly>
                    </div>
                    <br>
                    <div class="inputForm">
                        <input type="text" name="rua" id="rua" class="form-input" placeholder="Rua" value="<?= $user['rua'] ?>" required readonly>
                    </div>
                    <br>
                    <div class="dois">
                        <div class="inputForm">
                            <input type="text" name="numero" id="numero" class="form-input" placeholder="Número" value="<?= $user['numero'] ?>" required>
                        </div>
                        <div class="inputForm">
                            <input type="text" name="compl" id="compl" class="form-input" placeholder="Complemento" value="<?= $user['compl'] ?>">
                        </div>
                    </div>
                </fieldset>
            </div>

            <div id="enviar-div">
                <input type="submit" name="submit" id="enviar" value="Salvar">
            </div>
        </form>
    </div>

    <div id="mensagem-bg">
        <div id="mensagem-fs">
            <div id="mensagem">
                <h4>Mensagem:</h4>
                <p>CEP inválido.</p>
            </div>
            <button id='btn-n'>Fechar</button>
        </div>
    </div>

<a id="home-link" href="../frontend/"><i class="bi bi-house-fill"></i></a>

<script src="../backend/js/format.js"></script>
<script src="../backend/js/apiCep.js" defer></script>
<script src="../backend/js/mensagem.js" defer></script>
</body>
</html>