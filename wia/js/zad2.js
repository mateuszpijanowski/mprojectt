// JS SCRIPT by MATEUSZ PIJANOWSKI

// MAIN FUNCTION
function letter()
{
    var star = document.getElementById('star');
    var connect = document.getElementById('connect');
    var caption = document.getElementById('caption');
    var sign = document.getElementById('sign');
    var number = sign.value.length;
    var stars = "";
    var nl = "<br />";

    for (i=number; i>=0; i--)
    {
        for (a=0; a<i; a++)
        {
            stars = stars + "*";
        }
        nl = nl + stars + "<br />";
        stars = "";
    }
    star.innerHTML = nl;
    caption.innerHTML = "Łączna liczba znaków to: "
    connect.innerHTML = number;
}
