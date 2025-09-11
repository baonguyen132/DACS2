const xhttp = new XMLHttpRequest();
const scanner = new Html5QrcodeScanner("reader", {
    qrbox: {
        width: 250,
        height: 250,
    },
    fps: 200,
});

scanner.render(success, error);
function success(result) {
    gethttp = "http://localhost:8000/admin/history/confirm/" + result;

    $.get(gethttp, function (data, status) {
        console.log(data);
        if (data == "successful") {
            alert("successful");
            window.location = "http://localhost:8000/admin/history";
        } else {
            alert(data);
            location.reload();
        }
    });
    scanner.clear();
    document.getElementById("reader").remove();
}
function error(err) {}
