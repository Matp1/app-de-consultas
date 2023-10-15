document.addEventListener("DOMContentLoaded", function () {
    const telefoneInput = document.getElementById("telefone");

    telefoneInput.addEventListener("input", function () {
        this.value = this.value.replace(/[^0-9]/g, "");

        const numeroTelefone = this.value;
        if (numeroTelefone.length >= 10) {
            const numeroFormatado = `(${numeroTelefone.substr(0, 2)}) ${numeroTelefone.substr(2, 5)}-${numeroTelefone.substr(7)}`;
            this.value = numeroFormatado;
        }
    });

    document.getElementById('submit').addEventListener('click', function (e) {
        e.preventDefault();

        var popupSuccess = document.getElementById('popup-success');
        var popupProsseguir = document.getElementById('popup-prosseguir');
        var popupError = document.getElementById('popup-error');

        popupSuccess.style.display = 'none';
        popupProsseguir.style.display = 'none';
        popupError.style.display = 'none';

        var idade = document.getElementById('idade').value;
        var telefone = document.getElementById('telefone').value;
        var dataNascimento = document.getElementById('data_nascimento').value;

        if (idade.trim() === '' || telefone.trim() === '' || dataNascimento.trim() === '') {
            popupError.style.display = 'block';

            setTimeout(function () {
                popupError.style.display = 'none';
            }, 4000);
        } else {
            popupSuccess.style.display = 'block';
            popupProsseguir.style.display = 'block';

            setTimeout(function () {
                popupSuccess.style.display = 'none';
            }, 4000);
        }
    });

    document.getElementById('sim').addEventListener('click', function () {
        window.location.href = 'agendamento.php';
    });

    document.getElementById('nao').addEventListener('click', function () {
        var popupProsseguir = document.getElementById('popup-prosseguir');
        popupProsseguir.style.display = 'none';
    });
});
