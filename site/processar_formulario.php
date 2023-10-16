<?php
session_start();
require_once "config.php";

$successMessage = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION["user_id"])) {
        $user_id = $_SESSION["user_id"];
        $idade = $_POST['Idade'];
        $telefone = $_POST['telefone'];
        $data_nascimento = $_POST['data_nascimento'];
        $sexo = $_POST['genero'];

        $checkSQL = "SELECT id FROM pacientes WHERE user_id = ?";
        $checkStmt = $conn->prepare($checkSQL);
        $checkStmt->bind_param("i", $user_id);
        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();

        if ($checkResult->num_rows > 0) {
            $updateSQL = "UPDATE pacientes SET idade = ?, telefone = ?, data_nascimento = ?, sexo = ? WHERE user_id = ?";
            $updateStmt = $conn->prepare($updateSQL);
            $updateStmt->bind_param("isssi", $idade, $telefone, $data_nascimento, $sexo, $user_id);

            if ($updateStmt->execute()) {
                $successMessage = "Cadastro atualizado com sucesso!";
            } else {
                echo "Erro na atualização: " . $updateStmt->error;
            }
            $updateStmt->close();
        } else {
            $insertSQL = "INSERT INTO pacientes (user_id, idade, telefone, data_nascimento, sexo) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($insertSQL);
            $stmt->bind_param("iissi", $user_id, $idade, $telefone, $data_nascimento, $sexo);

            if ($stmt->execute()) {
                $successMessage = "Cadastro salvo com sucesso!";
            } else {
                echo "Erro na inserção: " . $stmt->error;
            }
            $stmt->close();
        }
        $checkStmt->close();
    } else {
        $successMessage = "Erro: user_id não está definido na sessão.";
    }
}

$conn->close();
?>
