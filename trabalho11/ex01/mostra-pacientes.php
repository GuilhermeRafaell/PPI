<?php

require "../conexaoMysql.php";
$pdo = mysqlConnect();

try {
  $nome = $_POST['nome'] ?? '';
  $cpf = $_POST['cpf'] ?? '';
  $dataNascimento = $_POST['dataNascimento'] ?? '';
  $peso = $_POST['peso'] ?? '';
  $altura = $_POST['altura'] ?? '';
  $tipoSanguineo = $_POST['tipoSanguineo'] ?? '';

  $pdo->beginTransaction();

  $sql = "INSERT INTO Pessoa (nome, cpf, dataNascimento) VALUES (?, ?, ?)";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$nome, $cpf, $dataNascimento]);

  $idPessoa = $pdo->lastInsertId();

  $sql = "INSERT INTO Paciente (idPessoa, peso, altura, tipoSanguineo) VALUES (?, ?, ?, ?)";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$idPessoa, $peso, $altura, $tipoSanguineo]);

  $pdo->commit();
} catch (Exception $e) {
  $pdo->rollBack();
  throw $e;
}
?>
<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <!-- 1: Tag de responsividade -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lista de Pacientes</title>

  <!-- 2: Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

  <style>
    body {
      padding-top: 2rem;
    }
  </style>
</head>

<body>

  <div class="container">
    <h3>Clientes e seus endereços</h3>
    <table class="table table-striped table-hover">
      <tr>
        <th>Cliente</th>
        <th>Email</th>
        <th>Endereço</th>
        <th>Bairro</th>
        <th>Cidade</th>
      </tr>

      <?php
      while ($row = $stmt->fetch()) {

        // Limpa os dados produzidos pelo usuário
        // com possibilidade de X S S
        $nome = htmlspecialchars($row['nome']);
        $email = htmlspecialchars($row['email']);
        $endereco = htmlspecialchars($row['endereco']);
        $bairro = htmlspecialchars($row['bairro']);
        $cidade = htmlspecialchars($row['cidade']);

        echo <<<HTML
          <tr>
            <td>$nome</td> 
            <td>$email</td>
            <td>$endereco</td>
            <td>$bairro</td>
            <td>$cidade</td>
          </tr>      
        HTML;
      }
      ?>

    </table>
    <a href="../index.html">Menu de opções</a>
  </div>

</body>

</html>