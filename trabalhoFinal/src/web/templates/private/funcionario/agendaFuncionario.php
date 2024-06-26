<?php
require "../../../php/conexao.php";
require "sessionmanager.php";
session_start();

$sessionManager = new SessionManager();
$pdo = mysqlConnect();

$id_paciente = $sessionManager->get("id");

// Consulta para obter as consultas com base no id_paciente
$consulta_paciente = "SELECT C.data_consulta, C.hora_consulta, P.nome as nome_paciente, F.especialidade
FROM AGENDA C 
JOIN paciente P ON P.NOME = C.nome_paciente
JOIN funcionario F on F.ID = C.id_funcionario
WHERE F.ID = ?";
$stmt_consultaPaciente = $pdo->prepare($consulta_paciente);
$stmt_consultaPaciente->execute([$id_paciente]);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../assets/css/style.css">
    <link rel="stylesheet" href="../../../../assets/css/formulario.css">
    <link rel="stylesheet" href="../../../../assets/css/media.css">
    <link rel="stylesheet" href="../../../../assets/css/bootstrap.min.css">
    <script src="../../../../assets/js/bootstrap.bundle.min.js"></script>
    <title>Seus agendamentos</title>
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
            <div class="agendamento">
                <h2>Agendamentos</h2>
                <table class="table table-striped table-sm text-center">
                    <thead>
                        <tr class="text-center table-success">
                            <th>Data</th>
                            <th>Hora</th>
                            <th>Especialidade</th>
                            <th>Profissional</th>
                        </tr>
                    </thead>
                    <?php
                    if ($stmt_consultaPaciente->rowCount() > 0) {
                        while ($consulta = $stmt_consultaPaciente->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr>";
                            echo "<td>" . (isset($consulta['data_consulta']) ? $consulta['data_consulta'] : '') . "</td>";
                            echo "<td>" . (isset($consulta['hora_consulta']) ? $consulta['hora_consulta'] : '') . "</td>";
                            echo "<td>" . (isset($consulta['especialidade']) ? $consulta['especialidade'] : '') . "</td>";
                            echo "<td>" . (isset($consulta['nome_paciente']) ? $consulta['nome_paciente'] : '') . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>Nenhum profissional encontrado.</td></tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </main>

    <footer>
        <p>ClínicaVitalis - Trabalho final PPI</p>
    </footer>

</body>

</html>