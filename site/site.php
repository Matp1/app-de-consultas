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
    <title>Consulta</title>
</head>
<body>
    <h1>Logado</h1>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <input type="submit" name="logout" value="Logout">

    <?php
    if (isset($_POST["logout"])){
        logout();
    }
    ?>
    </form>
</body>
</html>
