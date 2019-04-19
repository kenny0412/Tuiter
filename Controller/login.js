function login() {
    console.log("estatus");
    var div = document.getElementById("divErrorLogin");
    var email = document.getElementById('email').value;
    var pass = document.getElementById('pass').value;
    var request = new XMLHttpRequest();
    request.open('GET', '../Model/login.php', true);
    request.send(null);
    request.onreadystatechange = function() {
        if (request.onreadystatechange == 4 && request.status == 200) {
            if (request.responseText == "1") {
                div.innerHTML = "Error en la conexion.";
            } else if (request.responseText == "2") {
                div.innerHTML = "Usuario o contraseña incorrectos";
            } else {
                var resp = JSON.parse(request.responseText);
                div.innerHTML = resp;
            }
        }
    }
}