<?php
session_start();

// verifica se o usuario está logado
// se nao estiver logado, volta para tela de login
if (!isset($_SESSION["login"]) || $_SESSION["login"] !== "1") {
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../assets/css/style.css">
    <link rel="stylesheet" href="../../../../assets/css/media.css">
    <link rel="stylesheet" href="../../../../assets/css/bootstrap.min.css">
    <script src="../../../../assets/js/bootstrap.bundle.min.js"></script>
    <title>Página Inicial</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-xl navbar-dark fixed-top" id="navbar">
            <a class="navbar-brand" href="./home.php">
                <div class="d-flex align-items-center">
                    <img src="../../../../assets/images/logotipo.jpg" class="logo" alt="Logomarca CiniSimples">
                    <h1 id="ClínicaVitalis" class="ml-2">ClínicaVitalis</h1>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link color-white" href="./homePaciente.php">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link color-white" href="./perfil.php">Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link color-white" href="./agenda.php">Agendamentos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link color-white" href="./agendarConsulta.php">Agendar consulta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link color-white" href="../../../../../index.html">Sair</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <div class="container">
            <div class="boas-vindas">
                <div class="row">
                    <h2>Olá, seja bem vindo,
                        <?php echo htmlspecialchars($_SESSION["nome"]); ?>!
                    </h2>
                </div>
                <div class="row">
                    <h2>Como posso ajudar?</h2>
                </div>
                <div class=row>
                    <div class="col-sm">
                        <img src="../../../../assets/images/banner.png" alt="Banner" id="banner">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <a href="./agenda.php">
                            <img src="../../../../assets/images/agenda.png" alt="Agendamentos">
                            <h3>Agendamentos</h3>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="./agendarConsulta.php">
                            <img src="../../../../assets/images/agendarConsulta.png" alt="Agendar consulta">
                            <h3>Agendar consulta</h3>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="./perfil.php">
                            <img src="../../../../assets/images/usuario.png" alt="Perfil">
                            <h3>Perfil</h3>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="../../../../../index.html">
                            <img src="../../../../assets/images/logout.png" alt="Logout">
                            <h3>Logout</h3>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <p>ClínicaVitalis - Trabalho final PPI</p>
    </footer>
</body>

</html>