<?php

// Importa o arquivo de conexão com o banco de dados
require "../PPI/trabalho10/ex01/conexaoMysql.php";
$pdo = mysqlConnect();

// Recupera os dados enviados pelo formulário
$nome = $_POST["nome"] ?? "";
$telefone = $_POST["telefone"] ?? "";

try {

  // Este bloco de código é inseguro porque os dados do usuário são inseridos diretamente na consulta SQL.
  // Isso permite que um usuário mal-intencionado manipule a consulta para realizar ações indesejadas no banco de dados.
  /*
  $sql = <<<SQL
  INSERT INTO aluno (nome, telefone)
  VALUES ('$nome', '$telefone');
  SQL;  
  */

  // Este bloco de código é seguro porque os dados do usuário são tratados antes de serem inseridos na consulta SQL.
  $sql = <<<SQL
  INSERT INTO aluno (nome, telefone)
  VALUES (?, ?);
  SQL;

  // Prepara a consulta SQL
  $stmt = $pdo->prepare($sql);
  // Executa a consulta SQL
  $stmt->execute([$nome, $telefone]);


  // Aqui a consulta SQL é executada. Se os dados do usuário não forem devidamente tratados, isso pode levar a problemas.
  //$pdo->exec($sql);

  // Redireciona o usuário para a página mostra-alunos.php
  header("location: mostra-alunos.php");
  exit();
} 
catch (Exception $e) {  
  // Se algo der errado, uma mensagem de erro é exibida
  exit('Falha ao cadastrar os dados: ' . $e->getMessage());
}