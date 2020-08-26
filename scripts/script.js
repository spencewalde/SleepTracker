/*  
    Spencer Williams-Waldemar
    08/5/20
    script.js
    javaScript for toggling the login and register button 
    and its respective input field  
*/


var lin = document.getElementById("login");
var reg = document.getElementById("register");
var btn = document.getElementById("btn");

function register() {
    lin.style.left = "-400px";
    reg.style.left = "50px";
    btn.style.left = "110px";
}
function login() {
    lin.style.left = "50px";
    reg.style.left = "450px";
    btn.style.left = "0px";
}