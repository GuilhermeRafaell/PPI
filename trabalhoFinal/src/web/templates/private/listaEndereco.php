<?php
require "../../php/conexao.php";

$pdo = mysqlConnect();

$sql = "SELECT cep, estado, cidade, bairro, logradouro FROM endereco";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <link rel="stylesheet" href="../../../assets/css/media.css">
    <link rel="stylesheet" href="../../../assets/css/bootstrap.min.css">
    <script src="../../../assets/js/bootstrap.bundle.min.js"></script>
    <title>ClínicaVitalis</title>
</head>

<body>
<header>
            <nav class="navbar navbar-expand-xl navbar-dark fixed-top"
                id="navbar">
                <a class="navbar-brand" href="./index.html">
                    <div class="d-flex align-items-center">
                        <img src="../../../assets/images/logotipo.jpg" class="logo"
                            alt="Logomarca CiniSimples">
                        <h1 id="ClínicaVitalis" class="ml-2">ClínicaVitalis</h1>
                    </div>
                </a>
                <button class="navbar-toggler" type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse"
                    id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto" id="dropdownlist">
                        <li class="nav-item active">
                            <a class="nav-link color-white" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link color-white"
                                href="../../../.../../../../src/web/templates/public/galeria.html">Galeria</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link color-white"
                                href="../../../../src/web/templates/private/paciente/agendarConsulta.php">Agendar
                                de Consulta</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link color-white"
                                href="../../../../src/web/templates/public/cadastroEndereco.html">Novo
                                Endereço</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link color-white"
                                href="../../../../src/web/templates/public/login.html">Login</a>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>

    <main>
        <div class="container-fluid">
            <div class="table-responsive" id="homePage">
                <h2 class="text-center mt-4">Endereços</h2>
                <table id="table" class="table table-bordered bg-black mt-4">
                    <thead>
                        <tr>
                            <th scope="col">CEP</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Cidade</th>
                            <th scope="col">Bairro</th>
                            <th scope="col">Rua</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($resultados as $endereco) : ?>
                            <tr>
                                <td><?php echo $endereco['cep']; ?></td>
                                <td><?php echo $endereco['estado']; ?></td>
                                <td><?php echo $endereco['cidade']; ?></td>
                                <td><?php echo $endereco['bairro']; ?></td>
                                <td><?php echo $endereco['logradouro']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <footer>
        <p>ClínicaVitalis - Trabalho final PPI</p>
    </footer>
</body>

</html>
