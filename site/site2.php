<?php
    session_start();

    require_once "config.php";

    function logout()
    {
        session_unset();
        session_destroy();
        header("Location: login.php");
        exit;
    }

    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("Location: login.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="site2.css">
    <link rel="shortcut icon" href="Icon.png" type="image/x-icon">
    <title>Consulta</title>
</head>
<body>
    <h1>TESTANDO</h1>

    <div class="page">
        <form method="POST" class="formAgendamento" id="agendamento-form">
            <h1>Agendamento de Consulta</h1>
            <p>Preencha os dados para agendar sua consulta.</p>
            <label for="nome">Nome</label>
            <input type="text" name="nome" placeholder="Seu nome" />
            <label for="data">Data da Consulta</label>
            <input type="date" name="data" />
            <label for="medico">Médico</label>
            <select name="medico">
                <option value="medico1">Médico 1</option>
                <option value="medico2">Médico 2</option>
                <option value="medico3">Médico 3</option>
            </select>
            <button type="button" id="confirmar-btn" class="btn">Confirmar</button>
        </form>
        
    </div>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <input type="submit" name="logout" value="Logout">

    <?php
    if (isset($_POST["logout"])){
        logout();
    }
    ?>
    </form>
    <div id="popup" class="popup">
        <p id="popup-message"></p>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('confirmar-btn').addEventListener('click', function() {
                exibirPopup('Consulta agendada');
            });

            function exibirPopup(mensagem) {
                var popup = document.getElementById('popup');
                var popupMessage = document.getElementById('popup-message');
                popupMessage.textContent = mensagem;
                popup.style.display = 'block';

                setTimeout(function() {
                    popup.style.display = 'none';
                }, 3000); // O popup desaparecerá após 3 segundos
            }
        });
    </script>
</body>
</html>
