<?php

class Endereco
{
  public $rua;
  public $bairro;
  public $cidade;

  function __construct($rua, $bairro, $cidade)
  {
    $this->rua = $rua;
    $this->bairro = $bairro;
    $this->cidade = $cidade;
  }
}

// carrega a string JSON da requisição
// php://input retorna todos os dados que vem depois
// das linhas de cabeçalho HTTP da requisição, 
// independentemente do tipo do conteúdo
$stringJSON = file_get_contents('php://input');

/*  Os dados estao sendo recebidos atraves do corpo da
requisicao HTTP, a funcao le todo o corpo da requisicao
como uma string, em seguida ela é convertida em um
objeto PHP com a duncao json_decode
*/

// converte a string JSON em objeto PHP
$dados = json_decode($stringJSON);
$cep = $dados->cep;

if ($cep == '38400-100')
  $endereco = new Endereco('Av Floriano', 'Centro', 'Uberlândia');
else if ($cep == '38400-200')
  $endereco = new Endereco('Rua Tiradentes', 'Fundinho', 'Uberlândia');
else
  $endereco = new Endereco('', '', '');
  
header('Content-type: application/json');
echo json_encode($endereco);

/*
  Em resumo, a diferença está em como os dados do cliente
são recebidos: através de parâmetros na URL no primeiro
código, e através do corpo da requisição no segundo código.
*/