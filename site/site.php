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
</head>

<body>
    <div class="box">
        <form id="cadastro-form" method="POST">
            <div id="popup2" class="popup" style="display: none;">
                <p id="popup-message2" class="popup-message2"></p>
            </div>
            <fieldset>
                <legend><b>Cadastro</b></legend>
                <br>
                <div class="inputBox">
                    <input type="number" name="Idade" id="idade" class="inputUser" required maxlength="3" oninput="this.value = this.value.slice(0, 3)">
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
                <div>
                    <input type="radio" class="sex-check" id="feminino" name="genero" value="feminino" required>
                    <label class="sex" for="feminino">Feminino</label><br>
                    <input type="radio" class="sex-check" id="masculino" name="genero" value="masculino" required>
                    <label class="sex" for="masculino">Masculino</label>
                    <input type="radio" class="sex-check" id="outro" name="genero" value="outro" required>
                    <label class="sex" for="outro">Outro</label>
                </div>
                <br><br>
                <button type="submit" id="submit">Salvar</button>
            </fieldset>
        </form>
        <br>
        <div class="popup-prosseguir" id="popup-prosseguir" style="display: none;">
            <p>Prosseguir?</p>
            <button class="popup-button" id="sim">SIM</button>
            <button class="popup-button" id="nao">NÃO</button>
        </div>
    </div>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <button type="submit" name="logout" class="logout-button">Sair</button>
        <?php
        if (isset($_POST["logout"])) {
            logout();
        }
        ?>
    </form>

    <script src="site.js"></script>
</body>

</html>