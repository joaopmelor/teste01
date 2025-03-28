<?php
include('conexaoDB/conexao.php');
include('consultaSQL.php');

// Inicializar array de busca
$busca = [];

// Verificar e receber valores da busca
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
    $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';

    // Adicionar um filtro na consulta caso o nome tenha sido informado
    if (!empty($nome)) {
        $sqlBusca .= " AND u.nome LIKE ?"; // Adicionar um filtro de busca pelo nome
    }

    // Adicionar um filtro na consulta caso o CPF tenha sido informado
    if (!empty($cpf)) {
        $sqlBusca .= " AND u.cpf = ?"; // Adicionar um filtro de busca pelo CPF
    }

    // Preparar a consulta SQL
    $stmt = $conexao->prepare($sqlBusca);

    $params = []; // Array para armazenar os parâmetros a serem passados

    // Adicionar o parâmetro para o nome, se informado
    if (!empty($nome)) {
        $params[] = "%$nome%"; // O caractere '%' serve para buscar o nome de forma parcial
    }

    // Adicionar o parâmetro para o CPF, se informado
    if (!empty($cpf)) {
        $params[] = $cpf;
    }

    // Passar parâmetros para a consulta preparada
    if (!empty($params)) {
        $types = str_repeat('s', count($params));
        $stmt->bind_param($types, ...$params);
    }

    // Executa e recebe os resultados da busca
    $stmt->execute();
    $result = $stmt->get_result();

    // Armazena os resultados encontrados na array 'busca'
    while ($row = $result->fetch_assoc()) {
        $busca[] = $row;
    }

    $stmt->close();
}
?>