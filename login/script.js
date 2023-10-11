document.addEventListener("DOMContentLoaded", function () {
    const loginForm = document.querySelector("form");
    const loginMessage = document.getElementById("login-message");

    loginForm.addEventListener("submit", function (e) {
        e.preventDefault(); // Impede o envio padrão do formulário

        const username = document.getElementById("username").value;
        const password = document.getElementById("password").value;

        const serverResponse = { message: "Login bem-sucedido" };

        loginMessage.textContent = serverResponse.message;

        document.getElementById("username").value = "";
        document.getElementById("password").value = "";
    });
});
