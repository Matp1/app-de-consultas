<?php
session_start();

require_once "config.php";

function logout()
{
    session_unset();
    session_destroy();
    header("Location: index.html");
    exit;
}

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: index.html");
    exit;
}

if (isset($_POST["logout"])) {
    logout();
}

$user_id = $_SESSION["user_id"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="agendamentoo.css">
    <link rel="shortcut icon" href="Icon.png" type="image/x-icon">
    <title>Consulta</title>

</head>

<body>
    <a href="site.php?id=<?php echo $user_id; ?>" class="alterar-dados-button">Alterar Dados</a>

    <div class="box">
        <form form method="POST" id="agendamento-form">
            <div id="popup2" class="popup" style="display: none;">
                <p id="popup-message2" class="popup-message2"></p>
            </div>
            <fieldset>
                <legend><b>Consultas</b></legend>
                <p>Médico:</p>
                <div>
                    <input type="radio" class="med-check" id="drChiquito" name="medico" value="Dr.Chiquito" required />
                    <label class="med" for="drChiquito">Ortopedia - Dr.Chiquito</label><br>
                    <input type="radio" class="med-check" id="drLuciano" name="medico" value="Dr.Luciano" required />
                    <label class="med" for="drLuciano">Cardiologista - Dr.Luciano</label><br>
                    <input type="radio" class="med-check" id="drGustavo" name="medico" value="Dr.Gustavo" required />
                    <label class="med" for="drGustavo">Oftalmologista - Dr.Gustavo</label><br>
                    <input type="radio" class="med-check" id="drPrado" name="medico" value="Dr.Prado" required />
                    <label class="med" for="drPrado">Dermatologista - Dr.Prado</label><br><br>
                </div>
                <p>Selecione um Horário:</p>
                <div>
                    <input type="radio" class="btn-check" id="manha" name="P" value="manha" autocomplete="off" required/>
                    <label class="btn" for="manha">Período Manhã: 07:00 - 12:00</label><br>
                    <input type="radio" class="btn-check" id="tarde" name="P" value="tarde" autocomplete="off" required />
                    <label class="btn" for="tarde">Período Tarde: 13:00 - 18:00</label>
                </div>
                <br><br>
                <button type="submit" id="submit">Agendar</button>
            </fieldset>
        </form>
    </div>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="submit" name="logout" value="Sair" class="logout-button">
    </form>
    
    <script src="agendamento.js"></script>
</body>

</html>