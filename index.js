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
        console.log(n);
        document.getElementById("my_name").innerHTML = n;
        //document.getElementById("email").value = e;
        //for (var k = 0; k < 900000000; k++);
        //window.location.href = "index.html";
    }
}