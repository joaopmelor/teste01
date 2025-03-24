<?php 
// Consulta para inserir dados na tabela users
$sqlUsuario = "INSERT INTO users (nome, nome_social, cpf, pai, mae, telefone, email) 
VALUES (?, ?, ?, ?, ?, ?, ?)";

// Consulta para pegar o maior ID da tabela users
$sqlNovoId = "SELECT MAX(id) AS novo_id FROM users";

// Consulta para inserir dados na tabela endereco
$sqlEndereco = "INSERT INTO endereco (tipo_endereco, cep, rua, numero, compl, bairro, estado, cidade, user_id) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Consulta para buscar informações de usuários cadastrados
$sqlBusca = "SELECT u.id, u.nome, u.nome_social, u.cpf, u.pai, u.mae, u.telefone, u.email, e.tipo_endereco, e.cep, e.rua, e.numero, e.compl, e.bairro, e.estado, e.cidade
            FROM users u
            LEFT JOIN endereco e ON u.id = e.user_id
            WHERE 1"; // Cláusula 1 significa que a condição sempre será verdadeira, servindo para adicionar filtros

// Consulta para buscar o usuário no banco de dados
$sqlBuscaId = "SELECT u.id, u.nome, u.nome_social, u.cpf, u.pai, u.mae, u.telefone, u.email, e.tipo_endereco, e.cep, e.rua, e.numero, e.compl, e.bairro, e.estado, e.cidade
            FROM users u
            LEFT JOIN endereco e ON u.id = e.user_id
            WHERE u.id = ?";

// Consulta para atualizar dados do usuário
$sqlUpdateUsuario = "UPDATE users SET nome = ?, cpf = ?, nome_social = ?, pai = ?, mae = ?, telefone = ?, email = ?
        WHERE id = ?";

// Consulta para atualizar endereço do usuário
$sqlUpdateEndereco = "UPDATE endereco SET tipo_endereco = ?, cep = ?, rua = ?, numero = ?, compl = ?, bairro = ?, estado = ?, cidade = ?
        WHERE user_id = ?";

// Consulta para deletar usuário do banco de dados
$sqlDelete = "DELETE FROM users WHERE id = ?";
?>