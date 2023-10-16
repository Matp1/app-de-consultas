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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="site.css">
    <link rel="shortcut icon" href="Icon.png" type="image/x-icon">
    <title>Document</title>
</head>

<body>
    <a href="site.php" class="alterar-dados-button">Alterar Dados</a>

    <div class="box">
        <form form method="POST" class="formAgendamento" id="agendamento-form">
            <fieldset>
                <legend><b>teste</b></legend>
                <div>
                    <label for="medico">Médico</label>
                    <select name="medico">
                        <option value="medico1">Ortopedia - Dr.Chiquito </option>
                        <option value="medico2">Cardiologista - Dr.Luciano</option>
                        <option value="medico3">Oftalmologista - Dr.Gustavo</option>
                        <option value="medico4">Dermatologista - Dr.Prado</option>
                    </select>
                </div>

                <div>
                    <p>Selecione um Período:</p>
                    <input type="radio" id="manha" name="P" value="manha" required />
                    <label for="manha">Período Manhã 07:00 - 12:00</label><br>
                    <input type="radio" id="tarde" name="P" value="tarde" required />
                    <label for="tarde">Período Tarde 13:00 - 18:00</label>
                </div>
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
</body>

</html>
