let randompass = Math.floor(Math.random()*22);
let passlist = new Array(22);
passlist[0] = "Wszyscy kłamią";
passlist[1] = "Wszyscy umierają";
passlist[2] = "Ciekawi mnie twoje zaciekawienie";
passlist[3] = "Bo jeśli umrzesz zostanę sam";
passlist[4] = "Kiedy umierasz wszyscy cię kochają";
passlist[5] = "Bóg w niej zamieszkał To jest gorsze od raka";
passlist[6] = "Lubię swoją nogę Mam ją od kiedy pamiętam";
passlist[7] = "Na YouTube wyglądało to łatwiej";
passlist[8] = "Śmierć zmienia wszystko";
passlist[9] = "Ludzie się nie zmieniają";
passlist[10] = "Jeśli jest wtorek to mam kaca";
passlist[11] = "Kochasz wszystkich to twoja choroba";
passlist[12] = "Ludzkość jest przereklamowana";
passlist[13] = "Mam laskę i nie zawaham się jej użyć";
passlist[14] = "Możemy żyć z godnością nie możemy z nią umrzeć";
passlist[15] = "Mówiąc my miała na myśli siebie";
passlist[16] = "Przestań zanim zainteresujesz mnie na śmierć";
passlist[17] = "Ratowanie życia to tylko skutek uboczny";
passlist[18] = "Skoro kłamiesz kłam na całego";
passlist[19] = "Zakładam że wszyscy pacjenci kłamią";
passlist[20] = "Zwariowałeś Jestem z ciebie dumny";
passlist[21] = "Życzę ich zdeformowanym dzieciom szczęścia";

let password = passlist[randompass];
password = password.toUpperCase();

let length = password.length;
let how_skuch = 0;

let yes = new Audio("yes.wav");
let no = new Audio("no.wav");

let pass = "";

for (i=0; i<length; i++)
{
    if(password.charAt(i)==" ")
    {
        pass = pass + " ";
    }
    else
    {
        pass = pass + "-";
    }
}

function write_pass()
{
    document.getElementById('board').innerHTML = pass;
}

window.onload = letter;

let letters = new Array(35);

letters[0] = "A";
letters[1] = "Ą";
letters[2] = "B";
letters[3] = "C";
letters[4] = "Ć";
letters[5] = "D";
letters[6] = "E";
letters[7] = "Ę";
letters[8] = "F";
letters[9] = "G";
letters[10] = "H";
letters[11] = "I";
letters[12] = "J";
letters[13] = "K";
letters[14] = "L";
letters[15] = "Ł";
letters[16] = "M";
letters[17] = "N";
letters[18] = "Ń";
letters[19] = "O";
letters[20] = "Ó";
letters[21] = "P";
letters[22] = "Q";
letters[23] = "R";
letters[24] = "S";
letters[25] = "Ś";
letters[26] = "T";
letters[27] = "U";
letters[28] = "V";
letters[29] = "W";
letters[30] = "X";
letters[31] = "Y";
letters[32] = "Z";
letters[33] = "Ż";
letters[34] = "Ź";

function letter()
{

    let content = "";

    for (i=0; i<=34; i++)
    {
        let element = "let" + i;
        content = content + '<div class="letter" onclick="check('+i+')" id="'+element+'">'+letters[i]+'</div>';
        if ((i+1) % 7 ==0)
        {
            content = content + '<div style="clear:both;"></div>';
        }
    }

    document.getElementById('alphabet').innerHTML = content;


    write_pass();
}

String.prototype.setsign = function(location, sign)
{
    if (location > this.length - 1)
    {
    return this.toString();
    }

    else
    {
        return this.substr(0, location) + sign + this.substr(location + 1);
    }
}

function check(nr)
{
    let correct = false;
    for (i=0; i<length; i++)
    {
        if (password.charAt(i) == letters[nr])
        {
            pass = pass.setsign(i,letters[nr]);
            correct = true;
        }
    }

    if(correct == true)
    {
        yes.play();
        let element = "let" + nr;
        document.getElementById(element).style.background = "#003300";
        document.getElementById(element).style.color = "#00C000";
        document.getElementById(element).style.border = "3px solid #00C000";
        document.getElementById(element).style.cursor = "default";

        write_pass();
    }

    else
    {
        no.play();
        let element = "let" + nr;
        document.getElementById(element).style.background = "#330000";
        document.getElementById(element).style.color = "#C00";
        document.getElementById(element).style.border = "3px solid #C00";
        document.getElementById(element).style.cursor = "default";
        document.getElementById(element).setAttribute("onclick",";");

        how_skuch++;
        let image = "img/s"+how_skuch+".jpg";
        document.getElementById("gallows").innerHTML = '<img src="'+image+'" alt="" />';
    }

    //win
    if (password == pass)
    {
        document.getElementById("alphabet").innerHTML = '<font color="green">Zgadza się!</font> Podano prawdiłowy cytat:<br /><br /><i>'+password+
        '</i><br /><br /><span class="reset" onclick="location.reload()">JESZCZE RAZ?</span>';
        document.getElementById("gallows").innerHTML = '<img src="img/house.png" alt="" width="300" height="280" />';
    }

    //lose
    if (how_skuch>=9)
    {
        document.getElementById("alphabet").innerHTML = '<font color="red">Przegrana!</font>  Prawidłowy cytat:<br /><br /><i>'+password+
        '</i><br /><br /><span class="reset" onclick="location.reload()">JESZCZE RAZ?</span>';
    }

}

function show_quote()
{
    document.getElementById("alphabet").innerHTML = 'Prawidłowy cytat to:<br /><br /><i>'+password+
    '</i><br /><br /><span class="reset" onclick="location.reload()">JESZCZE RAZ?</span>';
    document.getElementById("gallows").innerHTML = '<img src="img/house.png" alt="" width="300" height="280" />';
}
