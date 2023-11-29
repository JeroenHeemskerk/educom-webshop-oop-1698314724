
function sayHi(string) {
    //alert(string)
}

$(document).ready(function () {
    //.ready zorgt ervoor dat het document eerst helemaal geladen is. 
    // Daarna worden deze functies pas uitgevoerd
    $("#content").html("<h1>JQuery says Hi!</h1>")
    sayHi('hello')
});




//ik denk dat ik later een click method (jquery) wil gaan toevoegen aan de sterren (dat worden buttons)
// $("button").click(function(){
//  doe iets
//});