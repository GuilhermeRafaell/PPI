<?php

require "conexaoMysql.php";

require "produto.php";// Importa a classe Produto

// resgata a ação a ser executada
$acao = $_GET['acao'];

// conecta ao servidor do MySQL
$pdo = mysqlConnect();

switch ($acao) {
  
  case "adicionarProduto":
    // recupera os dados do formulário
    $nome_do_produto = $_POST["nome_do_produto"] ?? "";
    $marca = $_POST["marca"] ?? "";
    $descricao = $_POST["descricao"] ?? "";

    $novoProduto = new Produto(
      $nome_do_produto, $marca, $descricao
    );

    // adiciona o Produto na tabela do banco de dados
    $novoProduto->AddToDatabase($pdo);
    header("location: controlador.php?acao=listarProdutos");
    break;

  //-----------------------------------------------------------------
  case "excluirProduto":
    $marca = $_GET["marca"] ?? "";
    $pdo = mysqlConnect();
    Produto::RemoveBymarca($pdo, $marca);
    header("location: controlador.php?acao=listarProdutos");
    break;

  //-----------------------------------------------------------------
  case "listarProdutos":
    $arrayProdutos = Produto::GetFirst30($pdo);
    
    // O script mostra-produtoss.php produzirá uma página dinâmica
    // utilizando os dados do array acima ($arrayProdutos)
    include "mostra-produtos.php";
    break;

  //-----------------------------------------------------------------
  default:
    exit("Ação não disponível");
}
