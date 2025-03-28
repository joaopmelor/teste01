<?php
include('conexaoDB/conexao.php');
include('consultaSQL.php');

// Verificar se ID foi recebido para deletar usuário
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Preparar e executar consulta de ID
    $stmt = $conexao->prepare($sqlDelete);
    $stmt->bind_param("i", $id);

    // Deletar usuário
    if ($stmt->execute()) {
        echo "Registro deletado com sucesso.";
        header("Location: ../frontend/index.php"); // Redireciona para a página de listagem
        exit();
    } else {
        echo "Erro ao deletar registro: " . $conexao->error;
    }
} else {
    echo "ID não fornecido.";
    exit();
}

$conexao->close();
?>