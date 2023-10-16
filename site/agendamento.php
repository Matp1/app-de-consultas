<?php
session_start();

require_once "config.php";

function logout()
{
    session_unset();
    session_destroy();
    header("Location: card.html");
    exit;
}

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: card.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="agendamento.css">
    <link rel="shortcut icon" href="Icon.png" type="image/x-icon">
    <title>Consulta</title>
</head>

<body>
    <a href="site.php" class="alterar-dados-button">Alterar Dados</a>

    <div class="box">
        <form form method="POST" id="agendamento-form">
            <div id="popup2" class="popup" style="display: none;">
                <p id="popup-message2" class="popup-message2"></p>
            </div>  
            <fieldset>
                <legend><b>Consultas</b></legend>
                <p>Médico:</p>
                <div class="custom-radio-select">
                    <input type="radio" id="drChiquito" name="medico" value="Dr.Chiquito" required />
                    <label for="drChiquito">Ortopedia - Dr.Chiquito</label><br>
                    <input type="radio" id="drLuciano" name="medico" value="Dr.Luciano" required />
                    <label for="drLuciano">Cardiologista - Dr.Luciano</label><br>
                    <input type="radio" id="drGustavo" name="medico" value="Dr.Gustavo" required />
                    <label for="drGustavo">Oftalmologista - Dr.Gustavo</label><br>
                    <input type="radio" id="drPrado" name="medico" value="Dr.Prado" required />
                    <label for="drPrado">Dermatologista - Dr.Prado</label><br><br>
                </div>
                <p>Selecione um Horário:</p>
                <div class="custom-radio-select">
                    <input type="radio" id="manha" name="P" value="manha" required />
                    <label for="manha">Período Manhã: 07:00 - 12:00</label><br>
                    <input type="radio" id="tarde" name="P" value="tarde" required />
                    <label for="tarde">Período Tarde: 13:00 - 18:00</label>
                </div>
                <br><br>
                <button type="submit" id="submit">Agendar</button>
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
    <script src="agendamento.js"></script>
</body>
</html>
