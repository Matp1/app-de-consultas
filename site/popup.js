document.addEventListener('DOMContentLoaded', function() {
    var cadastroForm = document.getElementById('cadastro-form');
    var popup = document.getElementById('popup2'); 
    var popupMessage = document.getElementById('popup-message2'); 

    cadastroForm.addEventListener('submit', function(e) {
        e.preventDefault();

        var name = document.querySelector("input[name='name']").value;
        var email = document.querySelector("input[name='email']").value;
        var password = document.querySelector("input[name='password']").value;

        if (name.trim() === '' || email.trim() === '' || password.trim() === '') {
            exibirPopup('Dados inválidos');
            return; 
        }

        var formData = new FormData(this);

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
        popupMessage.textContent = mensagem;
        popup.style.display = 'block';

        setTimeout(function() {
            popup.style.display = 'none';
        }, 3000);
    }
});
