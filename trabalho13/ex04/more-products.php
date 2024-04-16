<?php

// Define a classe do produto
class Product
{
  public $id;
  public $name;
  public $price;
  public $imagePath;

  // Construtor para inicializar as propriedades do produto
  function __construct($id, $name, $price, $imagePath)
  {
    $this->id = $id;
    $this->name = $name;
    $this->price = $price;
    $this->imagePath = $imagePath;
  }
}

// Cria uma matriz de produtos
$products = array(
  new Product(1, 'Smart TV LED 55', 2900, 'tv.webp'),
  new Product(2, 'Smartphone 6.5 ABC', 1590, 'smartphone.webp'),
  new Product(3, 'Notebook 17 Ultra Slim', 4299, 'notebook.webp'),
  new Product(4, 'Mouse Óptico XYZ', 149, 'mouse.webp'),
  new Product(5, 'Monitor 28 4k', 1460, 'monitor.webp'),
  new Product(6, 'Fone Headset ABC', 250, 'headset.webp'),
  new Product(7, 'Pen-drive de 64GB', 90, 'pen-drive.webp')
);

// Cria uma matriz de produtos aleatórios
$randProds = [
  $products[rand(0, 6)],
  $products[rand(0, 6)],
  $products[rand(0, 6)],
  $products[rand(0, 6)],
  $products[rand(0, 6)]
];

// Define o tipo de conteúdo da resposta como JSON
header('Content-type: application/json');
// Envia a matriz de produtos aleatórios como uma resposta JSON
echo json_encode($randProds);

/*
Este código PHP define uma classe Product com quatro propriedades: id, name, price e imagePath.
Ele então cria uma matriz de produtos e uma matriz de produtos aleatórios selecionados dessa matriz.
Finalmente, ele envia a matriz de produtos aleatórios como uma resposta JSON.
*/