<?php
    session_start();
    
    require_once "config.php"; 

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
    }

    $sql = "SELECT * FROM users WHERE name = ? AND email = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $name, $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) { 
            $_SESSION["loggedin"] = true;
        
            header("Location: site.php");
            exit;
        }
    } else {
        $error = "Email ou senha incorretos";
    }
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <div class="page">
        <form method="POST" class="formLogin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <h1>Login</h1>
            <p>Digite os seus dados de acesso no campo abaixo.</p>
            <label for="name">Nome</label>
            <input type="text" name="name" placeholder="Digite seu nome" />
            <label for="email">E-mail</label>
            <input type="email" name="email" placeholder="Digite seu e-mail" autofocus="true" />
            <label for="password">Senha</label>
            <input type="password" name="password" placeholder="Digite sua senha" />
            <input type="submit" value="Acessar" class="btn" />
            <br>
            <p>Ainda não tem uma conta? <a href="cadastrar.php">Crie uma agora</a></p>
        </form>

    </div>
    
</body>
</html>