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
    <link rel="stylesheet" href="site.css">
    <link rel="shortcut icon" href="Icon.png" type="image/x-icon">
    <title>Consulta</title>
</head>
<body>

    <div class="box">
        <form method="POST" class="formAgendamento" id="agendamento-form">
            
            <fieldset><legend><b>Agendamento de Consultas</b></legend>
            
            <div>
                <label for="idade">Idade</label>
                <input type="number" name="numero" id="numero" placeholder="Sua Idade" class="InputUser" required/>
            </div>
            
            <div>
                <label for="telefone">Telefone</label>
                <input type="tel" name="telefone" id="telefone" placeholder="Seu telefone" class="InputUser" required/>
            </div>

            <div>
                <label for="data"><b>Data de Nascimento:</b></label>
                <input type="date" name="data" id="data" class="InputUser"  required/>
            </div>

                <p>Gênero:</p>
                <input type="radio" id="masculino" name="G" value="masculino" required/>
                <label for="masculino">Masculino</label><br>
                <input type="radio" id="feminino" name="G" value="feminino" required/>
                <label for="feminino">Feminino</label><br>
                <input type="radio" id="nao binario" name="G" value="nao binario" required/>
                <label for="nao binario">Não Binário</label><br>

            

            </fieldset>
            
            </form>

            <button type="button" id="confirmar-btn" class="btn">Enviar</button>

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
        document.getElementById('confirmar-btn').addEventListener('click', function() {
            // Redireciona para a página desejada
            window.location.href = 'agendamento.html';
        });
    </script>
</body>
</html>
