<?php

require "../conexaoMysql.php"; // Funções para operações com o MySQL
$pdo = mysqlConnect(); // Função definida em conexaoMysql.php

// Listar os dados da tabela Aluno armazenado na variável $stmt
try {
  $sql = <<<SQL
    SELECT nome, telefone
    FROM aluno
  SQL;

  $stmt = $pdo->query($sql); // $stmt contém o resultado da consulta
} //Se occorer um erro, exibe uma mensagem com o erro
catch (Exception $e) {
  exit('Ocorreu uma falha: ' . $e->getMessage());
}

?>
<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <!-- 1: Tag de responsividade -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hello World - Listagem de Dados em Tabela do MySQL</title>

  <!-- 2: Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <h3>Dados na tabela <b>aluno</b></h3>
    <table class="table table-striped table-hover">
      <tr>
        <th>Nome</th>
        <th>Telefone</th>
      </tr>
      <!-- Exibe os resultados da consulta em formato de tabela -->
      <?php
      while ($row = $stmt->fetch()) // Cada iteração de fetch() retorna a próxima linha de resultado
      {// O valor de cada coluna é convertido para string , specialchars é usado para evitar ataques de injeção de código
        $nome = htmlspecialchars($row['nome']); 
        $telefone = htmlspecialchars($row['telefone']);

        echo <<<HTML
        <tr>
          <td>$nome</td> 
          <td>$telefone</td>
        </tr>      
        HTML;
      }
      ?>
    </table>
    <a href="../index.html">Menu de opções</a>
  </div>

</body>

</html>