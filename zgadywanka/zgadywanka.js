
// GLOBAL VERIABLES
let time = 0;
let random;
let nr1;
let nr2 = 0;
let letter1;
let letter2 = 0;
let special1;
let special2 = 0;
let cl1;
let cl2 = 0;
let all1;
let all2 = 0;
let result = 0;
let result_space = 0;

// STARTING FUNCTION
function start()
{
    let amount = document.getElementById('letters').value;
    let time = document.getElementById('time').value;

    if (amount > 0 && time > 0)
    {
        document.getElementById('start_error').style.display = "none";
        gen_letters();
    }
    else {
        document.getElementById('start_error').style.display = "block";
    }
}

// GENERATE FUNCTION
function gen_letters()
{
    display_letters()
    document.getElementById('generator').style.display = "block";
    let setting = document.settings.tryb.value;
    let amount = document.getElementById('letters').value;
    let generator = document.getElementById('generating');

    // ONLY DIGITS
    if (setting == "digits")
    {
        let numbers = new Array(9);
        numbers[0] = "0";
        numbers[1] = "1";
        numbers[2] = "2";
        numbers[3] = "3";
        numbers[4] = "4";
        numbers[5] = "5";
        numbers[6] = "6";
        numbers[7] = "7";
        numbers[8] = "8";
        numbers[9] = "9";

        for (i=0; i<amount; i++)
        {
            random=Math.ceil(Math.random()*(numbers.length-1));
            nr1 = (numbers[random]);
            if ((i)%4==0) nr2 = nr2 + " ";
            nr2 = nr2 + nr1;
        }
        result = nr2.substr(2, nr2.length - 2);

        generator.innerHTML = result;

    }

    // ONLY LETTERS
    else if (setting == "lett")
    {
        let lett = new Array(25);
        lett[0] = "Q";
        lett[1] = "W";
        lett[2] = "E";
        lett[3] = "R";
        lett[4] = "T";
        lett[5] = "Y";
        lett[6] = "U";
        lett[7] = "I";
        lett[8] = "O";
        lett[9] = "P";
        lett[10] = "A";
        lett[11] = "S";
        lett[12] = "D";
        lett[13] = "F";
        lett[14] = "G";
        lett[15] = "H";
        lett[16] = "J";
        lett[17] = "K";
        lett[18] = "L";
        lett[19] = "Z";
        lett[20] = "X";
        lett[21] = "C";
        lett[22] = "V";
        lett[23] = "B";
        lett[24] = "N";
        lett[25] = "M";

        for (i=0; i<amount; i++)
        {
            random=Math.ceil(Math.random()*(lett.length-1));
            letter1 = (lett[random]);
            if ((i)%4==0) letter2 = letter2 + " ";
            letter2 = letter2 + letter1;
        }
        result = letter2.substr(2, letter2.length - 2);

        generator.innerHTML = result;

    }

    // ONLY SPECIAL CHARACTERS
    else if (setting == "special")
    {
        let special = new Array(28);
        special[0] = "`";
        special[1] = "~";
        special[2] = "!";
        special[3] = "@";
        special[4] = "#";
        special[5] = "$";
        special[6] = "%";
        special[7] = "^";
        special[8] = "&";
        special[9] = "*";
        special[10] = "(";
        special[11] = ")";
        special[12] = "-";
        special[13] = "_";
        special[14] = "=";
        special[15] = "+";
        special[16] = "{";
        special[17] = "}";
        special[18] = "[";
        special[19] = "]";
        special[20] = ":";
        special[21] = ";";
        special[22] = "'";
        special[23] = "|";
        special[24] = "<";
        special[25] = ">";
        special[26] = ",";
        special[27] = ".";
        special[28] = "/";
        special[29] = "?";

        for (i=0; i<amount; i++)
        {
            random=Math.ceil(Math.random()*(special.length-1));
            special1 = (special[random]);
            if ((i)%4==0) special2 = special2 + " ";
            special2 = special2 + special1;
        }
        result = special2.substr(2, special2.length - 2);

        generator.innerHTML = result;

    }

    // DIGITS AND LETTERS
    else if (setting == "cl")
    {
        let cl = new Array(34);
        cl[0] = "0";
        cl[1] = "1";
        cl[2] = "2";
        cl[3] = "3";
        cl[4] = "4";
        cl[5] = "5";
        cl[6] = "6";
        cl[7] = "7";
        cl[8] = "8";
        cl[9] = "9";
        cl[10] = "Q";
        cl[11] = "W";
        cl[12] = "E";
        cl[13] = "R";
        cl[14] = "T";
        cl[15] = "Y";
        cl[16] = "U";
        cl[17] = "I";
        cl[18] = "O";
        cl[19] = "P";
        cl[20] = "A";
        cl[21] = "S";
        cl[22] = "D";
        cl[23] = "F";
        cl[24] = "G";
        cl[25] = "H";
        cl[26] = "J";
        cl[27] = "K";
        cl[28] = "L";
        cl[29] = "Z";
        cl[30] = "X";
        cl[31] = "C";
        cl[32] = "V";
        cl[33] = "B";
        cl[34] = "N";
        cl[35] = "M";

        for (i=0; i<amount; i++)
        {
            random=Math.ceil(Math.random()*(cl.length-1));
            cl1 = (cl[random]);
            if ((i)%4==0) cl2 = cl2 + " ";
            cl2 = cl2 + cl1;
        }
        result = cl2.substr(2, cl2.length - 2);

        generator.innerHTML = result;

    }

    // ALL
    else if (setting == "all")
    {
        let all = new Array(65);
        all[0] = "0";
        all[1] = "1";
        all[2] = "2";
        all[3] = "3";
        all[4] = "4";
        all[5] = "5";
        all[6] = "6";
        all[7] = "7";
        all[8] = "8";
        all[9] = "9";
        all[10] = "Q";
        all[11] = "W";
        all[12] = "E";
        all[13] = "R";
        all[14] = "T";
        all[15] = "Y";
        all[16] = "U";
        all[17] = "I";
        all[18] = "O";
        all[19] = "P";
        all[20] = "A";
        all[21] = "S";
        all[22] = "D";
        all[23] = "F";
        all[24] = "G";
        all[25] = "H";
        all[26] = "J";
        all[27] = "K";
        all[28] = "L";
        all[29] = "Z";
        all[30] = "X";
        all[31] = "C";
        all[32] = "V";
        all[33] = "B";
        all[34] = "N";
        all[35] = "M";
        all[36] = "`";
        all[37] = "~";
        all[38] = "!";
        all[39] = "@";
        all[40] = "#";
        all[41] = "$";
        all[42] = "%";
        all[43] = "^";
        all[44] = "&";
        all[45] = "*";
        all[46] = "(";
        all[47] = ")";
        all[48] = "-";
        all[49] = "_";
        all[51] = "=";
        all[52] = "+";
        all[53] = "{";
        all[54] = "}";
        all[55] = "[";
        all[56] = "]";
        all[57] = ":";
        all[58] = ";";
        all[59] = "'";
        all[60] = "|";
        all[61] = "<";
        all[62] = ">";
        all[63] = ",";
        all[64] = ".";
        all[65] = "/";
        all[66] = "?";

        for (i=0; i<amount; i++)
        {
            random=Math.ceil(Math.random()*(all.length-1));
            all1 = (all[random]);
            if ((i)%4==0) all2 = all2 + " ";
            all2 = all2 + all1;
        }
        result = all2.substr(2, all2.length - 2);

        generator.innerHTML = result;

    }

}

// TIMER FUNCTION
function display_letters()
{
    document.getElementById('menu').style.display = "none";
    time = document.getElementById('time').value;
    time = time*1000;
    timer = setTimeout("end_time()", time)
}

// BACK TO START
function display_main()
{
    document.getElementById('end').style.display = "none";
    document.getElementById('generator').style.display = "none";
    document.getElementById('menu').style.display = "block";
}

// CHEANGE DISPLAY
function end_time()
{
    document.getElementById('end').style.display = "block";
    document.getElementById('generator').style.display = "none";
}

// DISPLAY CORRECT DATA
function show()
{
    document.getElementById('end').style.display = "none";
    document.getElementById('menu').style.display = "none";
    document.getElementById('generator').style.display = "block";
}

// CHECK DATA
function check()
{
    result_space = result.replace(/ /g, '');
    let value = document.getElementById('check').value;

    if (value == result || value == result_space)
    {
        document.getElementById('end').style.display = "none";
        document.getElementById('correct').style.display = "block";
    }
    else {
        document.getElementById('error').style.display = "block";
    }
}
