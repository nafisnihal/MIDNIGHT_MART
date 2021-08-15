"use strict"
var namevalid = false;
var emailvalid = false;
var gendervalid = false;
var pconvalid = false;
var unamevalid = false;
var datevalid = false;
var passwordvalid = false;
var utypevalid = false;
var addvalid = false;
var contactvalid = false;



var i;

//name validation
function nameEmpty() {
    var name = document.getElementById("name").value;
    var lent = name.length;
    var correct_way = /^[A-Za-z]+$/;

    if (name == "") {
        document.getElementById("nameMsg").innerHTML = "*field can't be empty!";

        namevalid = false;
    }
    if (name.length <= 3) {
        document.getElementById("nameMsg").innerHTML = "*Name should be greater than 3 character!";

        namevalid = false;
    } else if (!isNaN(name)) {
        document.getElementById("nameMsg").innerHTML = "*Only Characters are allowed!";
        namevalid = false;
    } else if (name.match(correct_way)) {
        document.getElementById("nameMsg").innerHTML = "*Name format is not valid!";
        namevalid = true;
    } else {
        namevalid = false;
    }


}


function nameRemover() {
    document.getElementById('nameMsg').innerHTML = "";

}
//Contact number validation

function contactEmpty() {
    var contact_number = document.getElementById("contact_number").value;
    if (contact_number == "") {
        document.getElementById("contactMsg").innerHTML = "contact number should not be empty!";
        contactvalid = false;
    }
    if (contact_number.length != 11) {
        document.getElementById("contactMsg").innerHTML = "contact number should be 11 digit!";
        contactvalid = false;
    } else {
        contactvalid = true;
    }
}


function contactRemover() {
    document.getElementById('contactMsg').innerHTML = "";

}

//email validation
function emailEmpty() {
    var email = document.getElementById("email").value;

    var email_datas = '' +
        'check_email=' + window.encodeURIComponent('ON') +
        '&emailId=' + window.encodeURIComponent(email);
    let xhttp = new XMLHttpRequest();

    if (email == "") {
        document.getElementById("emailMsg").innerHTML = "  *field can't be empty!";
        emailvalid = false;
    } else if (email.indexOf('@') <= 0) {

        document.getElementById("emailMsg").innerHTML = "  *Invalid @ format!";
        emailvalid = false;
    } else if (email.charAt(email.length - 4) != '.') {
        document.getElementById("emailMsg").innerHTML = "  *Invalid .(dot) position!";
        emailvalid = false;
    } else if (email != "") {

        xhttp.open('POST', '../php/regCheck.php', true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(email_datas);
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                document.getElementById("emailMsg").innerHTML = this.responseText;
            } else {
                emailvalid = true;
            }
        }

        emailvalid = false;
    } else {
        emailvalid = true;
    }
}

function emailRemover() {
    document.getElementById('emailMsg').innerHTML = "";

}


//Username Validation
function unameEmpty() {
    var uname = document.getElementById("username").value;
    var username_datas = '' +
        'check_user=' + window.encodeURIComponent('ON') +
        '&userName=' + window.encodeURIComponent(uname);
    let xhttp = new XMLHttpRequest();

    if (uname == "") {
        document.getElementById("usernameMsg").innerHTML = "  *field can't be empty!";

        unamevalid = false;
    } else if (uname != "") {
        xhttp.open('POST', '../php/regCheck.php', true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(username_datas);
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                document.getElementById("usernameMsg").innerHTML = this.responseText;


            }
        }
    } else {
        unamevalid = true;
    }
}

function unameRemover() {
    document.getElementById('usernameMsg').innerHTML = "";

}



// gender validation

function genderEmpty() {
    if (document.getElementById("Male").checked) {
        gendervalid = true;
    } else if (document.getElementById("Female").checked) {
        gendervalid = true;
    } else if (document.getElementById("Other").checked) {
        gendervalid = true;
    } else {
        document.getElementById("genderMsg").innerHTML = "  *please choose a gender!";
        gendervalid = false;

    }
}

function genderRemover() {
    document.getElementById("genderMsg").innerHTML = "";
}

//date of birth validation

function dobEmpty() {
    var date = document.getElementById("dob").value;
    //alert(date);
    if (date == "") {
        document.getElementById("dobMsg").innerHTML = "  *field can't be empty!";

        datevalid = false;
    } else {
        datevalid = true;
    }

}

function dobRemover() {
    document.getElementById("dobMsg").innerHTML = "";

}

//Address validation
function addEmpty() {
    var address = document.getElementById("address").value;
    //alert(date);
    if (address == "") {
        document.getElementById("addMsg").innerHTML = "  *field can't be empty!";

        addvalid = false;
    } else {
        addvalid = true;
    }

}

function addRemover() {
    document.getElementById("addMsg").innerHTML = "";

}

//user type  validation
function usertypeEmpty() {
    var userType = document.getElementById("user_type").value;

    if (userType == "") {
        document.getElementById("utMsg").innerHTML = "*please choose at least one.";
        utypevalid = false;

    } else {
        utypevalid = true;
    }
}

function uTRemover() {
    document.getElementById("utMsg").innerHTML = "";
}

//password validation
function PEmpty() {
    var password = document.getElementById("password").value;
    var plength = password.length;
    if (password == "") {
        document.getElementById("passMsg").innerHTML = "*password field can't be empty!";
        window.pvalid = false;

    } else if ((plength < 6) || (plength > 8)) {
        document.getElementById("passMsg").innerHTML = "*password field should between 6 to 8 !";
        window.pvalid = false;

    } else {
        window.pvalid = true; 

    }
}

function pRemover() {
    document.getElementById("passMsg").innerHTML = "";
}


function PconEmpty() {
    var password = document.getElementById("password").value;
    var conpassword = document.getElementById("confirm_password").value;

    if (conpassword == "") {
        document.getElementById("cpassMsg").innerHTML = "*confirm password field can't be empty!";
        passwordvalid = false;

    }

    if (conpassword != password) {
        document.getElementById("cpassMsg").innerHTML = "*password and confirmpassword is not maching!";
        passwordvalid = false;

    } else {
        passwordvalid = true;

    }
}

function pconRemover() {
    document.getElementById("cpassMsg").innerHTML = "";
}



function validation() {
    if (namevalid == true && emailvalid == true && gendervalid == true && pconvalid == true && unamevalid == true &&
        datevalid == true && passwordvalid == true && utypevalid == true && addvalid == true && contactvalid == true) {
        return true;
    } else {
        return false;
    }
}