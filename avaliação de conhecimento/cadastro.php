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
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cadastro.css">
    <title>Cadastro teste01</title>
</head>
<body>
<?php
    $sql = "SELECT MAX(user_id) AS last_id FROM usersb";
    $result = $conexao->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $last_id = $row['last_id'];
        $next_id = $last_id + 1;

        echo "ID de cadastro do usuário: " . $next_id;
    } else {
        echo "ID de cadastro do usuário: 1";
    }

    $conexao->close();
?>

<div class="form">
        <form action="processa.php" method="POST">
            <fieldset>
                <legend>Cadastre-se</legend>
                <div class="inputForm">
                    <input type="text" name="nome" id="nome" class="user" required>
                    <label for="nome" class="label-input">Nome</label>
                </div>
                <br><br>
                <div class="inputForm">
                    <input type="text" name="nome_social" id="nome_social" class="user" required>
                    <label for="nome_social" class="label-input">Nome Social</label>
                </div>
                <br><br>
                <div class="inputForm">
                    <input type="text" name="cpf" id="cpf" class="user" required>
                    <label for="cpf" class="label-input">CPF</label>
                </div>
                <br><br>
                <div class="inputForm">
                    <input type="text" name="pai" id="pai" class="user" required>
                    <label for="pai" class="label-input">Nome do pai</label>
                </div>
                <br><br>
                <div class="inputForm">
                    <input type="text" name="mae" id="mae" class="user" required>
                    <label for="mae" class="label-input">Nome da mãe</label>
                </div>
                <br><br>
                <div class="inputForm">
                    <input type="text" name="telefone" id="telefone" class="user" required>
                    <label for="telefone" class="label-input">Telefone</label>
                </div>
                <br><br>
                <div class="inputForm">
                    <input type="email" name="email" id="email" class="user" required>
                    <label for="email" class="label-input">E-mail</label>
                </div>
                <br><br>
            </fieldset>

            <div id="enviar">
                <input type="submit" name="submit" id="submit" value="Continue">
            </div>
        </form>
    </div>
</body>
</html>