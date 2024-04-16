<?php

// Define uma classe chamada Endereco
class Endereco
{
  // Propriedades da classe Endereco
  public $rua;
  public $bairro;
  public $cidade;

  // Construtor da classe Endereco
  // É chamado quando um novo objeto Endereco é criado
  function __construct($rua, $bairro, $cidade)
  {
    // Atribui os valores passados como argumentos às propriedades do objeto
    $this->rua = $rua;
    $this->bairro = $bairro;
    $this->cidade = $cidade;
  }
}

// Obtém o valor do parâmetro 'cep' da URL
// Se 'cep' não estiver definido, usa uma string vazia como valor padrão
$cep = $_GET['cep'] ?? '';

// Verifica o valor de 'cep' e cria um novo objeto Endereco com os valores correspondentes
if ($cep == '38400-100')
  $endereco = new Endereco('Av Floriano', 'Centro', 'Uberlândia');
else if ($cep == '38400-200')
  $endereco = new Endereco('Rua Tiradentes', 'Fundinho', 'Uberlândia');
else {
  // Se 'cep' não for nenhum dos valores esperados, cria um novo objeto Endereco com valores vazios
  $endereco = new Endereco('', '', '');
}

// Define o tipo de conteúdo da resposta como JSON
header('Content-type: application/json');

// Converte o objeto Endereco em uma string JSON e a envia como resposta
echo json_encode($endereco);