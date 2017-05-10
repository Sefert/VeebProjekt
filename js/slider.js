/**
 * Created by marko on 15/04/2017.
 */
window.onload = function () {
    if (window.location.href.match('index.php') !== null) {
        var left = document.getElementById("left");
        var right = document.getElementById("right");
        left.onmouseover = function () {
            left.style.boxShadow= "0px 0px 16px rgba(102, 51, 153, 1)";
        }
        left.onmouseout = function () {
            left.style.boxShadow= "0px 0px 16px white";
        }
        right.onmouseover = function () {
            right.style.boxShadow= "0px 0px 16px rgba(102, 51, 153, 1)";
        }
        right.onmouseout = function () {
            right.style.boxShadow= "0px 0px 16px white";
        }
    }
}
function subtract(i) {
    console.log("left");
    var variableToSend = parseInt(i)-1;
    console.log(i);
    // $.post('galerii.php', {i: variableToSend});
    document.location = 'http://enos.itcollege.ee/~mmozniko/index.php?addim='+variableToSend;
}
function add(i) {
    console.log("right");
    var variableToSend = parseInt(i)+1;
    console.log(i);
    // $.post('galerii.php', {i: variableToSend});
    document.location = 'http://enos.itcollege.ee/~mmozniko/index.php?addim='+variableToSend;
}