<?php

// Importa o script de conexão com o banco de dados
require "../conexaoMysql.php";
// Cria uma conexão com o banco de dados
$pdo = mysqlConnect();

// Obtém o parâmetro 'telefone' da URL
$telefone = $_GET['telefone'] ?? '';

// Define uma consulta SQL para buscar o registro do aluno com o telefone especificado
$sql = <<<SQL
  SELECT *
  FROM aluno
  WHERE telefone = ?
SQL;

try {
  // Prepara a consulta SQL
  $stmt = $pdo->prepare($sql);
  // Executa a consulta com o parâmetro 'telefone'
  $stmt->execute([$telefone]);
  // Busca o resultado e o armazena como um objeto
  $aluno = $stmt->fetch(PDO::FETCH_OBJ);
  // Define o tipo de conteúdo da resposta como JSON
  header('Content-Type: application/json; charset=utf-8');
  // Codifica o resultado como JSON e o exibe
  echo json_encode($aluno);
} 
catch (Exception $e) {
  // Se ocorrer algum erro, termina a execução e exibe a mensagem de erro
  exit('Falha inesperada: ' . $e->getMessage());
}