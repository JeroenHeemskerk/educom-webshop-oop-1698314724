

$document.onLoad = getAllRatings();

// getAllRatings(){
// call naar de server Ajax
// }

$(document).ready(function () {
    //.ready zorgt ervoor dat het document eerst helemaal geladen is. 
    // Daarna worden deze functies pas uitgevoerd

    showRatings()

    function setRating() {
        $(".fa-star").click(function () {

            var userId = //iets
            var productId = //iets
            var rating = //iets
            
        })
    }

    function showRating() {
        var productId = starGroup.data("product-id");
        var url = "index.php?request=ajax&action=averageRatingByProduct&productId=" + productId;

    }
    function showRatings() {

    }
    function saveRating() {

    }

    $("#s1").click(function () {
        $(".fa-star").css("color", "darkgrey");
        $("#s1").css("color", "rgb(235, 182, 67)");
    })
    $("#s2").click(function () {
        $(".fa-star").css("color", "darkgrey");
        $("#s1, #s2").css("color", "rgb(235, 182, 67)");
    })
    $("#s3").click(function () {
        $(".fa-star").css("color", "darkgrey");
        $("#s1, #s2, #s3").css("color", "rgb(235, 182, 67)");
    })
    $("#s4").click(function () {
        $(".fa-star").css("color", "darkgrey");
        $("#s1, #s2, #s3, #s4").css("color", "rgb(235, 182, 67)");
    })
    $("#s5").click(function () {
        $(".fa-star").css("color", "darkgrey");
        $("#s1, #s2, #s3, #s4, #s5").css("color", "rgb(235, 182, 67)");
    })
});

