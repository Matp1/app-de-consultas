<?php
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = 'projetoterca';
$dbName = 'terca';

$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Verificar se a conexão foi bem-sucedida
if ($conexao->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
}

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar o email e senha do formulário
    $email = $conexao->real_escape_string($_POST['username']);
    $senha = $conexao->real_escape_string($_POST['password']);

    // Inserir os dados no banco de dados (você deve modificar a consulta SQL de acordo com a estrutura da sua tabela)
    $sql = "INSERT INTO terca (email, senha) VALUES ('$email', '$senha')";

    if ($conexao->query($sql) === TRUE) {
        echo "Dados inseridos com sucesso!";
    } else {
        echo "Erro ao inserir dados: " . $conexao->error;
    }
}

$conexao->close();
?>
