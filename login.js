var firebaseConfig = {
    apiKey: "AIzaSyCClz1s0RlmBAFjLgtnO8pXMofV2Fjufl4",
    authDomain: "e-week-login.firebaseapp.com",
    databaseURL: "https://e-week-login.firebaseio.com",
    projectId: "e-week-login",
    storageBucket: "e-week-login.appspot.com",
    messagingSenderId: "919927265746",
    appId: "1:919927265746:web:8bce96c4738f08b9c6100b"
};

firebase.initializeApp(firebaseConfig);
var login_details = firebase.database().ref().child("Login-details");
function WriteCookie() {
    var name = document.getElementById("name").value;
    var eid = document.getElementById("email").value;
    var v = validateemail();
    var name_valid = validatename();
    if (v == true && name_valid == true) {
        var det = name + "*" + eid;
        cookievalue = escape(det) + ";";
        //cookievalue = name + ";";

        var d = new Date();
        d.setTime(d.getTime() + (100*24*60*60*1000));
        var expires = "expires="+ d.toUTCString();
        document.cookie = "Loginforcbit=" + cookievalue + ";" + expires;


        //document.cookie = "Entertheevent=" + cookievalue;
        var details = {
            Name: name,
            Email: eid
        }
        //login_details.push(details);
        for (var i = 0; i < 100000000; i++);
        window.location.href = "index.html";
    }
    else {
        alert("Enter valid details!");
        document.getElementById("name").value = "";
        document.getElementById("email").value = "";
    }
}

function validatename() {
    var name = document.getElementById("name");
    var letters = /^[A-Za-z ]+$/;
    if (name.value.match(letters)) {
        return true;
    }
    return false;
}

function validateemail() {
    var x = document.getElementById("email").value;
    var atposition = x.indexOf("@");
    var dotposition = x.lastIndexOf(".");
    if (atposition < 1 || dotposition < atposition + 2 || dotposition + 2 >= x.length) {
        return (false);
    }
    return true;
}

function getCookie(name) {
    var dc = document.cookie;
    var prefix = name + "=";
    var begin = dc.indexOf("; " + prefix);
    if (begin == -1) {
        begin = dc.indexOf(prefix);
        if (begin != 0) return null;
    }
    else {
        begin += 2;
        var end = document.cookie.indexOf(";", begin);
        if (end == -1) {
            end = dc.length;
        }
    }
    return decodeURI(dc.substring(begin + prefix.length, end));
}

window.onload = function () {
    var myCookie = getCookie("Loginforcbit");
    if (myCookie != null) {
        var det = myCookie.split("*");
        var n = det[0];
        var e = det[1];
        document.getElementById("name").value = n;
        document.getElementById("email").value = e;
        for (var k = 0; k < 900000000; k++);
        //window.location.href = "index.html";
    }
}
/*
function myFunction(x){
    if(x.matches){
        document.getElementById("btn").style.height = "10px";
    }
    else
    document.getElementById("btn").style.height = "100px";
}

var x  = window.matchMedia("(max-width: 700px)");
myFunction(x);
x.addListener(myFunction);
*/