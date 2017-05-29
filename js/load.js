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
function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('time').innerHTML =
        h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};
    return i;
}
/**
 * Created by marko on 23/04/2017.
 */
// $(document).ready(function(){
//     $('#onenter').keypress(function(e){
//         if(e.keyCode==13)
//             $('#onenter').click();
//     });
// });