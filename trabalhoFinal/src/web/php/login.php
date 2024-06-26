<?php
require "conexao.php";
$pdo = mysqlConnect();

require "sessionmanager.php";
$sessionManager = new SessionManager();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"] ?? "";
    $senha = $_POST["senha"] ?? "";

    try {
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->beginTransaction();

        // Verifica se é paciente
        $consulta_paciente = "SELECT * FROM paciente WHERE email = ?";
        $stmt_paciente = $pdo->prepare($consulta_paciente);
        $stmt_paciente->execute([$email]);

        if ($stmt_paciente->rowCount() > 0) {
            $dados_paciente = $stmt_paciente->fetch(PDO::FETCH_ASSOC);

            // Verifica se a senha corresponde com a senha hash
            if (password_verify($senha, $dados_paciente['hash_senha'])) {
                session_start();

                // Armazena o ID do paciente na sessão
                $sessionManager->set("id", $dados_paciente['id']);

                $_SESSION["login"] = "1";
                $_SESSION["nome"] = $dados_paciente['nome'];
                $_SESSION["id"] = $dados_paciente['id'];
                header("location: ../templates/private/paciente/homePaciente.php");

                // Armazena o ID do paciente na sessão
                // $sessionManager->set("id", $dados_paciente['id']);

                exit();
            }
        }

        // Verifica se é funcionário
        $consulta_funcionario = "SELECT * FROM funcionario WHERE email = ?";
        $stmt_funcionario = $pdo->prepare($consulta_funcionario);
        $stmt_funcionario->execute([$email]);

        if ($stmt_funcionario->rowCount() > 0) {
            $dados_funcionario = $stmt_funcionario->fetch(PDO::FETCH_ASSOC);

            // Verifica se a senha corresponde com a senha hash
            if (password_verify($senha, $dados_funcionario['hash_senha'])) {
                session_start();

                $_SESSION["login"] = "1";
                $_SESSION["nome"] = $dados_funcionario['nome'];
                $_SESSION["id"] = $dados_funcionario['id'];

                header("location: ../templates/private/funcionario/homeFuncionario.php");

                // Armazena o ID do funcionário na sessão
                // $sessionManager->set("id", $dados_funcionario['id']);

                exit();
            }
        }

        // Se chegou aqui, as credenciais não foram encontradas
        throw new Exception('Credenciais inválidas');
    } catch (Exception $e) {
        // Rollback em caso de falha
        $pdo->rollback();
        exit('Falha no login: ' . $e->getMessage());
    }
}
