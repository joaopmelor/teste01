<?php
include_once("conexaoDB/conexao.php");

// Receber valores do formulário de cadastro de endereço
$tipo_endereco = $_POST['tipo_endereco'];
$cep = $_POST['cep'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$compl = $_POST['compl'];
$bairro = $_POST['bairro'];
$estado = $_POST['estado'];
$cidade = $_POST['cidade'];
$user_id = $_POST['user_id'];

// Inserir valores na tabela do banco de dados
$sql = "insert into endereco (tipo_endereco, cep, rua, numero, compl, bairro, estado, cidade, user_id) values ('$tipo_endereco', '$cep', '$rua', '$numero', '$compl', '$bairro', '$estado', '$cidade', '$user_id')";
$salvar = mysqli_query($conexao, $sql);

$conexao->close();
?>

<!-- Link para a página de consulta de usuários cadastrados -->
<div class="consultalink">
    <a href="index.php">Consultar usuários</a>
</div>