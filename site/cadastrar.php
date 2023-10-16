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
        <form method="POST" class="formLogin" id="cadastro-form">
            <h1>Cadastro</h1>
            <div id="popup" class="popup">
                <p id="popup-message" class="popup-message"></p>
            </div>
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
    

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('cadastro-form').addEventListener('submit', function(e) {
                e.preventDefault(); // Impede o envio do formulário padrão

                // Obtenha os dados do formulário
                var name = document.querySelector("input[name='name']").value;
                var email = document.querySelector("input[name='email']").value;
                var password = document.querySelector("input[name='password']").value;

                // Verifique se os campos estão preenchidos
                if (name.trim() === '' || email.trim() === '' || password.trim() === '') {
                    exibirPopup('Insira algum dado');
                    return; // Impede a submissão do formulário se os campos estiverem vazios
                }

                var formData = new FormData(this);

                // Faça a chamada AJAX real para o servidor
                fetch('cadastro.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        exibirPopup('Cadastro efetuado com sucesso!');
                    } else {
                        exibirPopup(data.message);
                    }
                })
                .catch(error => {
                    exibirPopup('Erro na solicitação: ' + error.message);
                });
            });

            function exibirPopup(mensagem) {
                var popup = document.getElementById('popup');
                var popupMessage = document.getElementById('popup-message');
                popupMessage.textContent = mensagem;
                popup.style.display = 'block';

                setTimeout(function() {
                    popup.style.display = 'none';
                }, 6000); // O popup desaparecerá após 6 segundos
            }
        });
    </script>
</body>
</html>
