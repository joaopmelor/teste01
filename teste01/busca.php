<?php
include('conexaoDB/conexao.php');

if (!$conexao) {
    die("Conexão com o banco de dados falhou: " . mysqli_connect_error());
}

// Inicializar array de busca
$busca = [];

// Verificar e receber valores da busca
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
    $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';

    // Montar query SQL
    $sql = "SELECT u.user_id, u.nome, u.nome_social, u.cpf, u.pai, u.mae, u.telefone, u.email, e.tipo_endereco, e.cep, e.rua, e.numero, e.compl, e.bairro, e.estado, e.cidade
            FROM usersb u
            LEFT JOIN endereco e ON u.user_id = e.user_id
            WHERE 1"; // Cláusula 1 significa que a condição sempre será verdadeira, servindo para adicionar filtros

    // Adicionar um filtro na consulta caso o nome tenha sido informado
    if (!empty($nome)) {
        $sql .= " AND u.nome LIKE ?"; // Adicionar um filtro de busca pelo nome
    }

    // Adicionar um filtro na consulta caso o CPF tenha sido informado
    if (!empty($cpf)) {
        $sql .= " AND u.cpf = ?"; // Adicionar um filtro de busca pelo CPF
    }

    // Preparar a consulta SQL
    $stmt = $conexao->prepare($sql);

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