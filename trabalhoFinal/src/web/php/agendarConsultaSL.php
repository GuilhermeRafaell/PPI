<?php
require "conexao.php";
require "sessionmanager.php";
$pdo = mysqlConnect();
$sesh = session_start(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pega o ID da sessão 
    $sessionManager = new SessionManager();
    $id = $sessionManager->get("id");
    $id_paciente = $id;

    // Resgata os dados do formulário
    $nome_paciente = $_POST["nome_paciente"] ?? "";
    $data_nascimento = $_POST["data_nascimento"] ?? "";
    $sexo = $_POST["sexo"] ?? "";
    $email = $_POST["email"] ?? "";
    $telefone = $_POST["telefone"] ?? "";
    $id_funcionario = $_POST["id"] ?? "";

    // Consulta para obter o nome_funcionario com base no id_funcionario
    $consulta_nomeFuncionario = "SELECT nome FROM funcionario WHERE id = ?";
    $stmt_nomeFuncionario = $pdo->prepare($consulta_nomeFuncionario);
    $stmt_nomeFuncionario->execute([$id_funcionario]);

    $resultado_nomeFuncionario = $stmt_nomeFuncionario->fetch(PDO::FETCH_ASSOC);
    $nome_funcionario = $resultado_nomeFuncionario["nome"];

    // Consulta para obter o especialidade com base no id_funcionario
    $consulta_especialidadeFuncionario = "SELECT especialidade FROM funcionario WHERE id = ?";
    $stmt_especialidadeFuncionario = $pdo->prepare($consulta_especialidadeFuncionario);
    $stmt_especialidadeFuncionario->execute([$id_funcionario]);

    $resultado_especialidadeFuncionario = $stmt_especialidadeFuncionario->fetch(PDO::FETCH_ASSOC);
    $especialidade = $resultado_especialidadeFuncionario["especialidade"];


    $data_consulta = $_POST["data_consulta"] ?? "";
    $hora_consulta = $_POST["hora_consulta"] ?? "";
    $convenio = $_POST["convenio"] ?? "";

    try {
        // Iniciar a transação
        $pdo->beginTransaction();

        // Insere dados na tabela consulta
        $consulta = "INSERT INTO AGENDA (data_consulta, hora_consulta, nome_paciente, sexo, email, id_funcionario)
                     VALUES (?, ?, ?, ?, ?, ?)";

        $stmt_consulta = $pdo->prepare($consulta);
        $stmt_consulta->execute([$data_consulta, $hora_consulta, $nome_paciente, $sexo, $email, $id_funcionario]);

        if ($stmt_consulta->rowCount() <= 0) {
            throw new Exception('Falha na inserção na tabela consulta');
        }
        $pdo->commit();

        // Redireciona para a homepage
        header("location: ../../../index.html");

        exit();
    } catch (Exception $e) {
        // Rollback em caso de falha
        $pdo->rollback();
        exit('Falha ao cadastrar os dados: ' . $e->getMessage());
    }
}
?>