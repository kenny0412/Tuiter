function tuits() {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../Model/show-tuits.php', true);
    xhr.send(null);

    request.onreadystatechange = function() {
        if (request.onreadystatechange == 4 && request.status == 200) {
            if (request.responseText == "") {
                console.log("Error.");
            } else {
                var resp = JSON.parse(request.responseText);
                console.log(resp);
            }
        }
    }
}