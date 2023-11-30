
function sayHi(string) {
    //alert(string)
}

$(document).ready(function () {
    //.ready zorgt ervoor dat het document eerst helemaal geladen is. 
    // Daarna worden deze functies pas uitgevoerd
    // $("#content").html("<h1>JQuery says Hi!</h1>")
    // sayHi('hello')

    $("#s1").click(function () {
        $("#s1").addClass("checked");
    })
    $("#s2").click(function () {
        $("#s1, #s2").addClass("checked");
    })
    $("#s3").click(function () {
        $("#s1, #s2, #s3").addClass("checked");
    })
    $("#s4").click(function () {
        $("#s1, #s2, #s3, #s4").addClass("checked");
    })
    $("#s5").click(function () {
        $("#s1, #s2, #s3, #s4, #s5").addClass("checked");
    })
});




//ik denk dat ik later een click method (jquery) wil gaan toevoegen aan de sterren (dat worden buttons)
// $("button").click(function(){
//  doe iets
//});


// Hier jQuery gaan schrijven