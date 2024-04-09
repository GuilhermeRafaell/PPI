<?php

// Importa o script de conexão com o banco de dados
require "../conexaoMysql.php";
// Cria uma conexão com o banco de dados
$pdo = mysqlConnect();

// Define uma consulta SQL para buscar todos os registros da tabela 'aluno'
$sql = <<<SQL
  SELECT *
  FROM aluno
SQL;

try {
  // Executa a consulta SQL
  $stmt = $pdo->query($sql);
  // Busca todos os resultados e os armazena como objetos
  $alunos = $stmt->fetchAll(PDO::FETCH_OBJ);
  // Define o tipo de conteúdo da resposta como JSON
  header('Content-Type: application/json; charset=utf-8');
  // Codifica os resultados como JSON e os exibe
  echo json_encode($alunos);
} 
catch (Exception $e) {
  // Se ocorrer algum erro, termina a execução e exibe a mensagem de erro
  exit('Falha inesperada: ' . $e->getMessage());
}