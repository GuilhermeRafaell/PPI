<?php

// Define uma classe chamada RequestResponse
class RequestResponse
{
  // Propriedades da classe RequestResponse
  public $success;
  public $detail;

  // Construtor da classe RequestResponse
  // É chamado quando um novo objeto RequestResponse é criado
  function __construct($success, $detail)
  {
    // Atribui os valores passados como argumentos às propriedades do objeto
    $this->success = $success;
    $this->detail = $detail;
  }
}

// Obtém os valores dos campos 'email' e 'senha' do formulário enviado via POST
// Se não estiverem definidos, usa uma string vazia como valor padrão
$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

// Verifica se o e-mail e a senha correspondem a 'teste@mail.com' e '123456', respectivamente
// Se sim, cria um novo objeto RequestResponse com 'success' definido como 'true' e 'detail' definido como 'home.html'
// Se não, cria um novo objeto RequestResponse com 'success' definido como 'false' e 'detail' definido como uma string vazia
// Nota: Esta é uma validação simplificada para fins didáticos.
if ($email == 'teste@mail.com' && $senha == '123456')
  $response = new RequestResponse(true, 'home.html');
else
  $response = new RequestResponse(false, '');

//  Caso o email e senha sejam iguais a 'teste@mail.com' e senha '123456', a variável $response será um objeto RequestResponse com 'success'
//definido como 'true' e 'detail' definido como 'home.html'.
//Caso contrário, 'success' será 'false' e 'detail' será uma string vazia.

// Define o tipo de conteúdo da resposta como JSON
header('Content-type: application/json');

// Converte o objeto RequestResponse em uma string JSON e a envia como resposta
echo json_encode($response);