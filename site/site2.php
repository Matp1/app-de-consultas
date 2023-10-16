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
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="site2.css">
    <link rel="shortcut icon" href="Icon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
        <div class="m-5">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Idade</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Genêro</th>
                    <th scope="col">Médico</th>
                    <th scope="col">Dia</th>
                    <th scope="col">Período</th>
                    <th scope="col">...</th>
                    </tr>
                </thead>
                <tbody >
                    <?php
                        while($user_data = mysqli_fetch_assoc($result)){
                            echo "<tr>";
                            echo "<td>".$user_data['id']."</td>";
                            echo "<td>".$user_data['name']."</td>";
                            echo "<td>".$user_data['idade']."</td>";
                            echo "<td>".$user_data['email']."</td>";
                            echo "<td>".$user_data['telefone']."</td>";
                            echo "<td>".$user_data['sexo']."</td>";
                            echo "<td>".$user_data['id']."</td>";
                            echo "<td>".$user_data['id']."</td>";
                            echo "<td>".$user_data['id']."</td>";
                            echo "<td>".$user_data['id']."</td>";
                        }
                    ?>
                </tbody>
            </table>
        </div>           
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="submit" name="logout" value="Logout">

        <?php
        if (isset($_POST["logout"])) {
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>