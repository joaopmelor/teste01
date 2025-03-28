<?php
    header('Content-Type: text/html; charset=utf-8');

    $dbHost = 'localhost';
    $dbUser = 'root';
    $dbPassword = '';
    $dbName = 'cadastro';

    $conexao = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

    if (!$conexao->set_charset("utf8")) {
        echo "Erro ao definir charset: " . $conexao->error;
    }

    if (!$conexao) {
        echo "ERRO AO CONECTAR COM BANCO DE DADOS: " . $conexao->connect_error;
    }
?>