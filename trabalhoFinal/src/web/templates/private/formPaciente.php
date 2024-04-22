<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <link rel="stylesheet" href="../../../assets/css/formulario.css">
    <link rel="stylesheet" href="../../../assets/css/media.css">
    <link rel="stylesheet" href="../../../assets/css/bootstrap.min.css">
    <script type="module" src="../../../assets/js/validaCadastroPaciente.js"></script>
    <script src="../../../assets/js/bootstrap.bundle.min.js"></script>
    <title>Cadastro paciente</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-xl navbar-dark fixed-top" id="navbar">
            <a class="navbar-brand" href="./index.html">
                <div class="d-flex align-items-center">
                    <img src="../../../assets/images/logotipo.jpg" id="logo" class="logo" alt="Logomarca CiniSimples">
                    <h1 id="ClínicaVitalis" class="ml-2">ClínicaVitalis</h1>
                </div>
            </a>
            <button class="navbar-toggler"  type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                <ul class="navbar-nav ml-auto" id="dropdownlist">
                    <li class="nav-item active">
                        <a class="nav-link color-white" href="../../../../index_2.html">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle color-white" href="#" id="listarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Cadastrar
                        </a>
                        <div class="dropdown-menu" id="dropdown-menu" aria-labelledby="listarDropdown">
                            <a class="dropdown-item" id="dropdown-item" href="./cadastroPaciente.html">Novo
                                Paciente</a>
                            <a class="dropdown-item" id="dropdown-item" href="./cadastroFuncionario.html">Novo
                                Funcionário</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle color-white" href="#" id="listarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Relatórios
                        </a>
                        <div class="dropdown-menu" id="dropdown-menu" aria-labelledby="listarDropdown">
                            <a class="dropdown-item" id="dropdown-item" href="./listaPaciente.html">Listar
                                Pacientes</a>
                            <a class="dropdown-item" id="dropdown-item" href="./listaFuncionario.html">Listar
                                Funcionários</a>
                            <a class="dropdown-item" id="dropdown-item" href="./listaEndereco.html">Listar
                                Endereços</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle color-white" href="#" id="listarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Agenda
                        </a>
                        <div class="dropdown-menu" id="dropdown-menu" aria-labelledby="listarDropdown">
                            <a class="dropdown-item" id="dropdown-item" href="./listaAgendamentos.html">Listar Agendamentos</a>
                            <a class="dropdown-item" id="dropdown-item" href="./listaAgenda.html">Meus
                                Agendamentos</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link color-white" href="../../../../index.html">Público</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link color-white" href="./login.html">Login</a>
                    </li>

                </ul>
            </div>
        </nav>
    </header>

    <main>
        <form action="../../php/cadastroPaciente.php" method="POST">
            <div class="container">
                <div class="cadastro">
                    <h3>Cadastro paciente</h3>

                    <fieldset>
                        <legend>Dados pessoais</legend>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input class="form-control" type="text" id="nome" name="nome" placeholder=" "
                                        autofocus>
                                    <label for="nome">Nome</label>
                                    <div class="alert alert-danger alert-dismissible" id="alertaNome">
                                        <span>O nome deve ser preenchido!</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input class="form-control" type="text" id="cpf" name="cpf" placeholder=" ">
                                    <label for="cpf">CPF</label>
                                    <div class="alert alert-danger alert-dismissible" id="alertaCpf">
                                        <span>O CPF deve ser preenchido!</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input class="form-control" type="date" id="data-nascimento" name="data-nascimento">
                                    <label for="data-nascimento">Data de nascimento</label>
                                    <div class="alert alert-danger alert-dismissible" id="alertaDataNascimento">
                                        <span>A data de nascimento deve ser preenchida!</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class ="form-floating">
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
                        </div>

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
                                    <input class="form-control" type="password" id="senha" name="senha" placeholder=" ">
                                    <label for="senha">Senha</label>
                                    <div class="alert alert-danger alert-dismissible" id="alertaSenha">
                                        <span>A senha deve ser preenchida!</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>



                    <fieldset>
                        <legend>Telefone de contato</legend>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-floating">
                                    <input class="form-control" type="text" id="telefone" name="telefone"
                                        placeholder=" ">
                                    <label for="telefone">Telefone</label>
                                    <div class="alert alert-danger alert-dismissible" id="alertaTelefone">
                                        <span>O telefone deve ser preenchido!</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend>Endereço</legend>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-floating">
                                    <input class="form-control" type="text" id="cep" name="cep" placeholder=" ">
                                    <label for="cep">CEP</label>
                                    <div class="alert alert-danger alert-dismissible" id="alertaCep">
                                        <span>O CEP deve ser preenchido!</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input class="form-control" type="text" id="rua" name="rua" placeholder=" ">
                                    <label for="rua">Rua</label>
                                    <div class="alert alert-danger alert-dismissible" id="alertaRua">
                                        <span>A rua deve ser preenchida!</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input class="form-control" type="text" id="bairro" name="bairro" placeholder=" ">
                                    <label for="bairro">Bairro</label>
                                    <div class="alert alert-danger alert-dismissible" id="alertaBairro">
                                        <span>O bairro deve ser preenchido!</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input class="form-control" type="text" id="cidade" name="cidade" placeholder=" ">
                                    <label for="cidade">Cidade</label>
                                    <div class="alert alert-danger alert-dismissible" id="alertaCidade">
                                        <span>A cidade deve ser preenchida!</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating">
                                <select class="form-select" name="estado" id="estado">
                                    <option value=""> Estado</option>
                                    <option value="AC">Acre</option>
                                    <option value="AL">Alagoas</option>
                                    <option value="AP">Amapá</option>
                                    <option value="AM">Amazonas</option>
                                    <option value="BA">Bahia</option>
                                    <option value="CE">Ceará</option>
                                    <option value="DF">Distrito Federal</option>
                                    <option value="ES">Espírito Santo</option>
                                    <option value="GO">Goiás</option>
                                    <option value="MA">Maranhão</option>
                                    <option value="MT">Mato Grosso</option>
                                    <option value="MS">Mato Grosso do Sul</option>
                                    <option value="MG">Minas Gerais</option>
                                    <option value="PA">Pará</option>
                                    <option value="PB">Paraíba</option>
                                    <option value="PR">Paraná</option>
                                    <option value="PE">Pernambuco</option>
                                    <option value="PI">Piauí</option>
                                    <option value="RJ">Rio de Janeiro</option>
                                    <option value="RN">Rio Grande do Norte</option>
                                    <option value="RS">Rio Grande do Sul</option>
                                    <option value="RO">Rondônia</option>
                                    <option value="RR">Roraima</option>
                                    <option value="SC">Santa Catarina</option>
                                    <option value="SP">São Paulo</option>
                                    <option value="SE">Sergipe</option>
                                    <option value="TO">Tocantins</option>
                                </select>
                                <div class="alert alert-danger alert-dismissible" id="alertaEstado">
                                    <span>O estado deve ser selecionado!</span>
                                </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <button class="btn btn-success col-sm-12" id="botao">Cadastrar</button>
                </div>
            </div>
        </form>
    </main>

    <footer>
        <p>ClínicaVitalis - Trabalho final PPI</p>
    </footer>

    <script href="../../../assets/js/ajaxBuscaEndereco.js"></script>
</body>

</html>