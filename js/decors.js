let butTog = false;

function toggleButtons() {
    butTog = !butTog;
    if (butTog) {
        document.getElementById('dDownWind').style.visibility = 'visible';
    }
    if (!butTog) {
        document.getElementById('dDownWind').style.visibility = 'hidden';
    }

};

//setInterval(function () { if (!document.getElementById('dDownWind').focus()) { document.getElementById('dDownWind').style.visibility = 'hidden' } }, 500);
//console.log(document.getElementById('dDownWind').focus() + "asd");

setInterval(function () {
    if (document.getElementById("errorDiv").textContent == "") {
        document.getElementById("errorDiv").style.visibility = "hidden";
    } else {
        document.getElementById("errorDiv").style.visibility = "visible";
    }
}, 500);