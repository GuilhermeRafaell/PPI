<?php

// Define uma função para verificar o login
function checkLogin($pdo, $email, $senha)
{
  // Cria uma consulta SQL para buscar a hash da senha do cliente com base no email
  $sql = <<<SQL
    SELECT hash_senha
    FROM cliente
    WHERE email = ?
    SQL;

  try {
    // Utiliza prepared statements para prevenir injeção de SQL, pois precisamos inserir dados fornecidos pelo usuário na consulta SQL (o email do usuário)
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $row = $stmt->fetch();
    if (!$row) return false; // Se não houver resultado (email não encontrado), retorna false

    // Verifica se a senha fornecida, quando hasheada, corresponde à hash armazenada no banco de dados
    return password_verify($senha, $row['hash_senha']);
  } 
  catch (Exception $e) {
    // Se ocorrer algum erro, termina a execução e exibe a mensagem de erro
    exit('Falha inesperada: ' . $e->getMessage());
  }
}

// Importa o script de conexão com o banco de dados
require "../conexaoMysql.php";
$pdo = mysqlConnect();

// Obtém o email e a senha fornecidos pelo usuário
$email = $_POST["email"] ?? "";
$senha = $_POST["senha"] ?? "";

// Verifica se o login é válido
if (checkLogin($pdo, $email, $senha))
  // Se o login for válido, redireciona para a página home.html
  header("location: home.html");
else
  // Se o login não for válido, redireciona de volta para a página index.html
  header("location: index.html");