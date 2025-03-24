<?php
include("../conexaoDB/conexao.php");
include("consultaSQL.php");

// Receber valores do formulário de cadastro do usuário
$nome = $_POST['nome'];
$nome_social = $_POST['nome_social'];
$cpf = $_POST['cpf'];
$pai = $_POST['pai'];
$mae = $_POST['mae'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];

// Preparar e executar query de inserção
$stmt = $conexao->prepare($sqlUsuario);
$stmt->bind_param("sssssss", $nome, $nome_social, $cpf, $pai, $mae, $telefone, $email);

$salvar = $stmt->execute();

if ($salvar) {
    echo "Usuário cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar usuário: " . $stmt->error;
}

$stmt->close();

header('Location: ../frontend/cadastroEndereco.php');

$conexao->close();
?>