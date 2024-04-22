<?php
require "conexao.php";
$pdo = mysqlConnect();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Resgata os dados do formulário
    $cep = $_POST["cep"] ?? "";
    $bairro = $_POST["bairro"] ?? "";
    $cidade = $_POST["cidade"] ?? "";
    $estado = $_POST["estado"] ?? "";

    // Insere na tabela endereci
    $sql = <<<SQL
        INSERT INTO endereco (cep, bairro, cidade, estado)
        VALUES (?, ?, ?, ?)
    SQL;

   try {
        // Inserção na tabela endereco
        $stmt = $pdo->prepare($sql);
        if (!$stmt->execute([$cep, $bairro, $cidade, $estado])) {
            throw new Exception('Falha na inserção de funcionário');
        }

        // Redireciona para a página inicial
        header("location: ../templates/private/listaEndereco.html");
        
        exit();
    } catch (Exception $e) {
        exit('Falha ao cadastrar os dados: ' . $e->getMessage());
    }
}
