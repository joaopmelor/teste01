<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/cadastroEndereco.css">
    <link rel="stylesheet" href="../css/editar.css">
    <script src="../js/format.js"></script>
    <script src="../js/apiCep.js" defer></script>
    <title>Editar Cadastro teste01</title>
</head>
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
                            <option id="opaco" disabled value>Tipo de endereço</option>
                            <option value="Residencial">Residencial</option>
                            <option value="Comercial">Comercial</option>
                        </select>
                    </div>
                    <br>
                    <div class="inputForm">
                        <input type="text" name="cep" id="cep" class="form-input" oninput="formatCEP(this)" maxlength="9" placeholder="CEP" value="<?= $user['cep'] ?>" required>
                    </div>
                    <br>
                    <div class="inputForm">
                        <input type="text" name="estado" id="estado" class="form-input" placeholder="Estado" value="<?= $user['estado'] ?>" required>
                    </div>
                    <br>
                    <div class="inputForm">
                        <input type="text" name="cidade" id="cidade" class="form-input" placeholder="Cidade" value="<?= $user['cidade'] ?>" required>
                    </div>
                    <br>
                    <div class="inputForm">
                        <input type="text" name="bairro" id="bairro" class="form-input" placeholder="Bairro" value="<?= $user['bairro'] ?>" required>
                    </div>
                    <br>
                    <div class="inputForm">
                        <input type="text" name="rua" id="rua" class="form-input" placeholder="Rua" value="<?= $user['rua'] ?>" required>
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
</body>
</html>