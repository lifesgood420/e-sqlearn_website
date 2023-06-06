let butTog = false;

function toggleButtons(){
    butTog = !butTog;
    if (butTog){
        document.getElementById('regGomb').style.visibility = 'visible';
        document.getElementById('logGomb').style.visibility = 'visible';
    }
    if (!butTog){
        document.getElementById('regGomb').style.visibility = 'hidden';
        document.getElementById('logGomb').style.visibility = 'hidden';
    }
}