<?php
include_once("conexaoDB/conexao.php");

// Receber valores do formulário de cadastro do usuário
$nome = $_POST['nome'];
$nome_social = $_POST['nome_social'];
$cpf = $_POST['cpf'];
$pai = $_POST['pai'];
$mae = $_POST['mae'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];

// Inserir valores na tabela do banco de dados
$sql = "insert into usersb (nome, nome_social, cpf, pai, mae, telefone, email) values ('$nome', '$nome_social', '$cpf', '$pai', '$mae', '$telefone', '$email')";
$salvar = mysqli_query($conexao, $sql);

$conexao->close();
?>

<!-- Link para a página de cadastro do endereço do usuário cadastrado -->
<div class="cadastrolink">
    <a href="cadastrob.php">Cadastrar endereço</a>
</div>