<?php
require "../../../php/conexao.php";
$pdo = mysqlConnect();

// Consulta para obter todos os funcionarios
$funcionarios = "SELECT id, nome, especialidade FROM funcionario";
$stmt_funcionario = $pdo->query($funcionarios);

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
    <script type="module" src="../../../../assets/js/validaAgendamento.js"></script>
    <script src="../../../../assets/js/bootstrap.bundle.min.js"></script>
    <title>Agendar Consulta</title>
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
                <h3>Agendar Consultaaa</h3>
                <form action="../../../php/agendarConsulta.php" method="POST">
                    <fieldset>
                        <legend>Informações da consulta</legend>

                        <div class="row">

                            <div class="col-sm-6">
                                <select class="form-select" name="id" id="id">
                                    <option value="">Profissional</option>
                                    <?php foreach ($stmt_funcionario as $funcionario): ?>
                                        <option value="<?php echo $funcionario['id']; ?>">
                                            <?php echo $funcionario['nome']; ?> -
                                            <?php echo $funcionario['especialidade']; ?>
                                        </option>
                                    <?php endforeach; ?>


                                </select>
                                <div class="alert alert-danger alert-dismissible" id="alertaNomeProfissional">
                                    <span>O profissional deve ser selecionado!</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="date" name="data_consulta" id="data_consulta" class="form-control">
                                    <label for="data">Data consulta</label>
                                </div>

                                <div class="alert alert-danger alert-dismissible" id="alertaData">
                                    <span>A data deve ser selecionada!</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <select class="form-select" name="hora_consulta" id="hora_consulta">
                                    <option value="">Horário</option>
                                    <option value="7:00 - 8:00">7:00 - 8:00</option>
                                    <option value="8:00 - 9:00">8:00 - 9:00</option>
                                    <option value="9:00 - 10:00">9:00 - 10:00</option>
                                    <option value="10:00 - 11:00">10:00 - 11:00</option>
                                    <option value="11:00 - 12:00">11:00 - 12:00</option>
                                    <option value="12:00 - 13:00">12:00 - 13:00</option>
                                    <option value="13:00 - 14:00">13:00 - 14:00</option>
                                    <option value="14:00 - 15:00">14:00 - 15:00</option>
                                    <option value="15:00 - 16:00">15:00 - 16:00</option>
                                    <option value="16:00 - 17:00">16:00 - 17:00</option>
                                    <option value="17:00 - 18:00">17:00 - 18:00</option>
                                </select>

                                <div class="alert alert-danger alert-dismissible" id="alertaHorario">
                                    <span>O horário deve ser selecionado!</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <select class="form-select" name="convenio" id="convenio">
                                    <option value="">Convênio</option>
                                    <option value="Nenhum">Sem Convênio</option>
                                    <option value="Unimed">Unimed</option>
                                    <option value="SF">São Francisco</option>
                                </select>
                                <div class="alert alert-danger alert-dismissible" id="alertaConvenio">
                                    <span>O convênio deve ser selecionado!</span>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend>Dados pessoais</legend>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input class="form-control" type="text" id="nome_paciente" name="nome_paciente"
                                        placeholder=" ">
                                    <label for="nome_paciente">Nome</label>

                                    <div class="alert alert-danger alert-dismissible" id="alertaNome">
                                        <span>O nome deve ser preenchido!</span>
                                    </div>

                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input class="form-control" type="date" id="data_nascimento" name="data_nascimento">
                                    <label for="data_nascimento">Data de nascimento</label>
                                    <div class="alert alert-danger alert-dismissible" id="alertaDataNascimento">
                                        <span>A data de nascimento deve ser preenchida!</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <select name="sexo" id="sexo" class="form-select">
                                    <option value="">Sexo</option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Feminino">Feminino</option>
                                    <option value="Outro">Outro</option>
                                </select>
                                <div class="alert alert-danger alert-dismissible" id="alertaSexo">
                                    <span>O sexo deve ser preenchido!</span>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend>Informações de contato</legend>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input class="form-control" type="email" id="email" name="email" placeholder=" ">
                                    <label for="email">E-mail</label>
                                    <div class="alert alert-danger alert-dismissible" id="alertaEmail">
                                        <span>O e-mail deve ser preenchido!</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input class="form-control" type="tel" id="telefone" name="telefone"
                                        placeholder=" ">
                                    <label for="telefone">Telefone</label>
                                    <div class="alert alert-danger alert-dismissible" id="alertaTelefone">
                                        <span>O telefone deve ser preenchido!</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>


                    <button class="btn btn-success col-sm-12" id="botao">Agendar</button>
                </form>
            </div>
        </div>
    </main>
    <footer>
        <p>ClínicaVitalis - Trabalho final PPI</p>
    </footer>
</body>
</html>