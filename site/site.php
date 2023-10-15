<?php
session_start();

require_once "config.php";

function logout()
{
    session_unset();
    session_destroy();
    header("Location: login_paciente.php");
    exit;
}

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: login_paciente.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Icon.png" type="image/x-icon">
    <link rel="stylesheet" href="site.css">
    <title>Consulta</title>
    <style>
        
    </style>
</head>

<body>
    <div class="box">
        <form action="">
            <fieldset>
                <legend><b>Fórmulário de Clientes</b></legend>
                <br>
                <div class="inputBox">
                    <input type="number" name="Idade" id="idade" class="inputUser" required maxlength="3"
                        oninput="this.value = this.value.slice(0, 3)">
                    <label for="idade" class="labelInput">Idade</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                    <label for="telefone" class="labelInput">Telefone</label>
                </div>        
                <br><br>
                <label for="data_nascimento"><b>Data de Nascimento:</b></label>
                <input type="date" name="data_nascimento" id="data_nascimento" required>
                <br><br>
                <p>Sexo:</p>
                <input type="radio" id="feminino" name="genero" value="feminino" required>
                <label for="feminino">Feminino</label>
                <br>
                <input type="radio" id="masculino" name="genero" value="masculino" required>
                <label for="masculino">Masculino</label>
                <br>
                <input type="radio" id="outro" name="genero" value="outro" required>
                <label for="outro">Outro</label>
                <br><br>

                <input type="submit" name="submit" id="submit" value="Salvar">
            </fieldset>
        </form>
    </div>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="submit" name="logout" value="Sair" class="logout-button">

        <?php
        if (isset($_POST["logout"])) {
            logout();
        }
        ?>
    </form>

    <script>
        document.getElementById("telefone").addEventListener("input", function () {
        this.value = this.value.replace(/[^0-9]/g, "");
    });
    document.getElementById('submit').addEventListener('click', function() {
            window.location.href = 'agendamento.php';
        });
    </script>
</body>

</html>