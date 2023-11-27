
function sayHi(string) {
    alert(string)
}

$(document).ready(function () {
    $("#content").html("<h1>JQuery says Hi!</h1>")
    sayHi('hello')
});
