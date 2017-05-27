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
    /**
     * Created by marko on 23/04/2017.
     */

