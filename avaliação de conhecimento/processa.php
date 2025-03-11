<?php
include_once("conexaoDB/conexao.php");

$nome = $_POST['nome'];
$nome_social = $_POST['nome_social'];
$cpf = $_POST['cpf'];
$pai = $_POST['pai'];
$mae = $_POST['mae'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];

$sql = "insert into usersb (nome, nome_social, cpf, pai, mae, telefone, email) values ('$nome', '$nome_social', '$cpf', '$pai', '$mae', '$telefone', '$email')";
$salvar = mysqli_query($conexao, $sql);

$conexao->close();
?>

<div class="cadastrolink">
    <a href="cadastrob.php">Cadastrar endereço</a>
</div>