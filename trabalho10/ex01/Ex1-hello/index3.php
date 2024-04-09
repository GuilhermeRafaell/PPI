<?php

// Este exemplo é apenas uma variação do index.php
// que utiliza o método fetchAll e restringe o número
// de alunos no SELECT para um máximo de 10 (pois buscar de uma vez
// todo o conteúdo com fetchAll pode causar problemas de sobrecarga
// no servidor ou na rede)
require "../conexaoMysql.php";
$pdo = mysqlConnect();

try { //Consulta restringindo o nro de aluno para 10
  $sql = <<<SQL
    SELECT nome, telefone
    FROM aluno
    LIMIT 10 
  SQL;

  $stmt = $pdo->query($sql);
} 
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
      <?php // Exibe os resultados da consulta em formato de tabela
      $alunosTurma = $stmt->fetchAll(PDO::FETCH_OBJ); // Retorna todas as linhas de resultado como um array de objetos
      foreach ($alunosTurma as $aluno) // Cada iteração de fetch() retorna a próxima linha de resultado
      {
        $nome = htmlspecialchars($aluno->nome); // O valor de cada propriedade do objeto é convertido para string
        $telefone = htmlspecialchars($aluno->telefone); // htmlspecialchars é usado para evitar ataques de injeção de código

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