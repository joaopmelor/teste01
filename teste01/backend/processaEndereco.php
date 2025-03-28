<?php
include('conexaoDB/conexao.php');
include('consultaSQL.php');

// Receber valores do formulário de cadastro de endereço
$tipo_endereco = $_POST['tipo_endereco'];
$cep = $_POST['cep'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$compl = $_POST['compl'];
$bairro = $_POST['bairro'];
$estado = $_POST['estado'];
$cidade = $_POST['cidade'];

// Formatar CEP
function formatCEP($cep) {
    $cep = preg_replace('/\D/', '', $cep);

    $cep = preg_replace('/(\d{5})(\d)/', '$1-$2', $cep);
    
    return $cep;
}

// Receber valor formatado
$cep = formatCEP($cep);

// Buscar novo ID
$result = $conexao->query($sqlNovoId);
$row = $result->fetch_assoc();
$novo_id = $row['novo_id'];

// Preparar e executar query de inserção
$stmt = $conexao->prepare($sqlEndereco);
$stmt->bind_param("ssssssssi", $tipo_endereco, $cep, $rua, $numero, $compl, $bairro, $estado, $cidade, $novo_id);

$salvar = $stmt->execute();

if ($salvar) {
    echo "Endereço salvo com sucesso!";
} else {
    echo "Erro ao salvar endereço: " . $stmt->error;
}

$stmt->close();

header('Location: ../frontend/index.php');

$conexao->close();
?>