<?php 
include('conexaoDB/conexao.php');
include('consultaSQL.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conexao->prepare($sqlBuscaId);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Verifica se foi encontrado o usuário
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        die('Usuário não encontrado.');
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Atualizar os dados do usuário
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $nome_social = $_POST['nome_social'];
    $pai = $_POST['pai'];
    $mae = $_POST['mae'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];

    // Atualizar os dados de endereço
    $tipo_endereco = $_POST['tipo_endereco'];
    $cep = $_POST['cep'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $compl = $_POST['compl'];
    $bairro = $_POST['bairro'];
    $estado = $_POST['estado'];
    $cidade = $_POST['cidade'];

    $stmtUsuario = $conexao->prepare($sqlUpdateUsuario);
    $stmtUsuario->bind_param('sssssssi', $nome, $cpf, $nome_social, $pai, $mae, $telefone, $email, $id);
    $stmtUsuario->execute();

    $stmtEndereco = $conexao->prepare($sqlUpdateEndereco);
    if ($stmtEndereco === false) {
        die('Erro ao preparar a consulta: ' . $conexao->error);
    } else {
        $stmtEndereco->bind_param('sssissssi', $tipo_endereco, $cep, $rua, $numero, $compl, $bairro, $estado, $cidade, $id);
        $stmtEndereco->execute();
    }

    // Verificar se as alterações foram bem-sucedidas
    if ($stmtUsuario->affected_rows > 0 || $stmtEndereco->affected_rows > 0) {
       // Redirecionar com sucesso
       header('Location: ../backend/editar.php?id=' . $id . '&status=sucesso');
    } else {
       // Redirecionar com erro
       header('Location: ../backend/editar.php?id=' . $id . '&status=erro');
    }

    exit();
}

// Incluir o formulário de edição
include('../frontend/editarForm.php');

$conexao->close();
?>