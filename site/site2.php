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
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="formulario.css">
    <link rel="shortcut icon" href="Icon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Consulta</title>
</head>

<body>
    


    <div class="m-5">
    <h1>Painel de Controle</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Idade</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Gênero</th>
                    <th scope="col">Médico</th>
                    <th scope="col">Período</th>
                    <th scope="col">Data de Nascimento</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $conn = new mysqli("localhost", "root", "", "login");
                if ($conn->connect_error) {
                    die("Erro na conexão: " . $conn->connect_error);
                }
                $sql = "SELECT u.name, p.idade, u.email, p.telefone, p.sexo, c.medico, c.periodo, p.data_nascimento
                    FROM pacientes p
                    INNER JOIN users u ON p.user_id = u.id
                    INNER JOIN consultas c ON c.user_id = u.id";

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td></td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["idade"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["telefone"] . "</td>";
                        echo "<td>" . $row["sexo"] . "</td>";
                        echo "<td>" . $row["medico"] . "</td>";
                        echo "<td>" . $row["periodo"] . "</td>";
                        echo "<td>" . $row["data_nascimento"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "Nenhum resultado encontrado.";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>



    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <button type="submit" name="logout" class="logout-button">Sair</button>
        <?php
        if (isset($_POST["logout"])) {
            logout();
        }
        ?>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>