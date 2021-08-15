"use strict"

window.uvalid = false;
window.pvalid = false;

function userEmpty() {
    var uname = document.getElementById("username").value;
    if (uname == "") {
        document.getElementById("userMsg").innerHTML = "  *field can't be empty!";

        window.uvalid = false;
    } else {
        window.uvalid = true;
    }



}

function userRemover() {
    document.getElementById('userMsg').innerHTML = "";

}


function passwordEmpty() {
    var password = document.getElementById("password").value;
    if (password == "") {
        document.getElementById("passMsg").innerHTML = "*password field can't be empty!";
        window.pvalid = false;

    } else {
        window.pvalid = true;

    }
}

function pRemover() {
    document.getElementById("passMsg").innerHTML = "";
}