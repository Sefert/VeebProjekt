$(document).ready(function(){
    $("#slide").click(function(){
        $(".hide").slideDown("slow").css('zoom', 1);
        $("#slide").hide();
    });
    $(".lefttoright").one("click",function(e) {
        $( "#move" ).animate({
            "left": "+=380px",
            "opacity":"1"
        }, 1500);
        e.preventDefault();
    });
});
window.onload = function () {
    if (window.location.href.match('index.php') !== null) {
    }
    ;
    /**
     * Created by marko on 23/04/2017.
     */
}
