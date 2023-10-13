<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <div class="page">
        <form method="POST" class="formLogin" action="cadastro.php">
            <h1>Cadastro</h1>
            <p>Digite os seus dados para efetuar seu cadastro.</p>
            <label for="name">Nome</label>
            <input type="text" name="name" placeholder="Digite seu nome" />
            <label for="email">E-mail</label>
            <input type="email" name="email" placeholder="Digite seu e-mail" autofocus="true" />
            <label for="password">Senha</label>
            <input type="password" name="password" placeholder="Digite sua senha" />
            <input type="submit" value="Cadastrar" class="btn" />
            <br>
            <p>Já está cadastrado? <a href="login.php">Acesse agora</a></p>
        </form>
    </div>
    
</body>
</html>