window.addEventListener("scroll", function(){
    var header = document.querySelector("header");
    header.classList.toggle("sticky", window.scrollY > 0);
})


$(document).ready(function(){
    $("#admin").click(function(){
    showpopup();
    });
});

function showpopup(){
    $("#loginform").fadeIn();
    $("#loginform").css({"visibility":"visible","display":"block"});
}