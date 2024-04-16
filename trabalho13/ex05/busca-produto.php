<?php
require "conexaoMysql.php";
require "produto.php";

if ($mysqli->connect_error) {
    die('Erro de Conexão (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

// Obtém a marca do produto da URL
$marca = $_GET['marca'];

// Prepara a consulta SQL
$stmt = $mysqli->prepare("SELECT nome_do_produto, descricao FROM Produto WHERE marca = ?");
$stmt->bind_param("s", $marca);

// Executa a consulta
$stmt->execute();

// Obtém o resultado
$result = $stmt->get_result();

// Cria um array para armazenar os produtos
$produtos = array();

// Adiciona cada linha do resultado ao array de produtos
while ($row = $result->fetch_assoc()) {
    $produtos[] = $row;
}

// Define o tipo de conteúdo da resposta como JSON
header('Content-type: application/json');

// Envia o array de produtos como uma resposta JSON
echo json_encode($produtos);