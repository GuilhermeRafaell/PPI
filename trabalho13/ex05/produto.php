<?php

class Produto
{
  public $nome_do_produto;
  public $marca;
  public $descricao;

  function __construct($nome_do_produto, $marca, $descricao)
  {
    $this->nome_do_produto = $nome_do_produto;
    $this->marca = $marca;
    $this->descricao = $descricao;
  }

  // Adiciona os dados do objeto (produto)
  // na tabela produto do banco de dados
  public function AddToDatabase($pdo)
  {
    try {
      $sql = <<<SQL
      -- Repare que a coluna Id foi omitida por ser auto_increment
      INSERT INTO produto (nome_do_produto, marca, descricao)
      VALUES (?, ?, ?)
      SQL;

      // Neste caso utilize prepared statements para prevenir
      // inj. de S Q L, pois precisamos
      // cadastrar dados fornecidos pelo usuário 
      $stmt = $pdo->prepare($sql);
      $stmt->execute([
        $this->nome_do_produto, $this->marca, $this->descricao
      ]);
    } catch (Exception $e) {
      exit('Falha inesperada: ' . $e->getMessage());
    }
  }

  // Método estático para retornar, na forma de um
  // array de objetos, os 30 produtos iniciais da tabela.
  // O método retorna os dados sanitizados e com a data
  // de nascimento no formato dia/mês/ano. Métodos estáticos
  // estão associados à classe em si, e não a uma instância.
  // No PHP devem ser chamados com a sintaxe:
  // nome_do_produtoDaClasse::nome_do_produtoDoMétodo
  public static function GetFirst30($pdo)
  {
    try {
      $sql = <<<SQL
      SELECT nome_do_produto, marca, descricao
      FROM produto
      LIMIT 30
      SQL;

      // Neste exemplo não é necessário utilizar prepared statements
      // porque não há a possibilidade de inj. de S Q L, 
      // pois nenhum parâmetro do usuário é utilizado na query SQL. 
      $stmt = $pdo->query($sql);

      $arrayprodutos = [];
      while ($row = $stmt->fetch()) {
        // Sanitiza os dados produzidos pelo usuário
        // que oferecem risco de X S S
        $nome_do_produto = htmlspecialchars($row['nome_do_produto']);
        $marca = htmlspecialchars($row['marca']);
        $descricao = htmlspecialchars($row['descricao']);

        // Cria um novo objeto do tipo produto e adiciona
        // no final do array de produtos
        $novoproduto = new produto(
          $nome_do_produto,
          $marca,
          $descricao,
        );
        $arrayprodutos[] = $novoproduto;
      }
      return $arrayprodutos;
    } catch (Exception $e) {
      exit('Falha inesperada: ' . $e->getMessage());
    }
  }

  // Método estático para excluir um produto dado sua marca
  public static function RemoveBymarca($pdo, $marca)
  {
    try {
      $sql = <<<SQL
      DELETE FROM produto
      WHERE marca = ?
      LIMIT 1
      SQL;

      // Necessário utilizar prepared statements devido ao parâmetro
      // informado pelo usuário
      $stmt = $pdo->prepare($sql);
      $stmt->execute([$marca]);
    } catch (Exception $e) {
      exit('Falha inesperada: ' . $e->getMessage());
    }
  }
}
