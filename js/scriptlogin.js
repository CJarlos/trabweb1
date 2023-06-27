function validarForm() {
    var username = document.getElementById("usernamebx").value;
    var password = document.getElementById("passwordbx").value;

    if (username === "" || password === "") {
        alert("Por favor, preencha todos os campos requeridos!");
        return false;
    }
}

login.btn()