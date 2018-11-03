// JS SCRIPT by MATEUSZ PIJANOWSKI

// HIDE X AREA FUNCTION
function runhidex()
{
    const select = document.querySelector('select[name="sketch"]');
    select.addEventListener('change',
    function hidex()
    {
        var settings = document.settings.sketch.value;

        if (settings == "triangle") document.getElementById('x').style.display='none';

        else document.getElementById('x').style.display='inline-block';
    });
}

// MAIN FUNCTION
function generate()
{
    var x = document.getElementById("x").value;
    var y = document.getElementById("y").value;
    var settings = document.settings.sketch.value;
    var generate = document.getElementById("generating");
    var gen = "";

    // CHECKED CHECKBOX
    if (document.getElementById("center").checked)
    {
        if (x>0 && y>0)
        {
            if (settings == "square")
            {
                for (i=1; y>=i; i++)
                {
                    for (a=1; x>=a; a++)
                    {
                        gen = gen + "&nbsp;&nbsp;&nbsp;&nbsp;";
                        gen = gen + "*";
                    }
                    gen = gen + "<br />";
                }
                generate.innerHTML = gen;
            }
        }
        else
        {
            generate.innerHTML = "Wprowadzono nieprawidłowe dane!";
        }
        if (y>0)
        {
            if (settings == "triangle")
            {
                for (i=1; y>=i; i++)
                {
                    for (a=1; i>=a; a++)
                    {
                        gen = gen + "&nbsp;&nbsp;&nbsp;&nbsp;";
                        gen = gen + "*";
                    }
                    gen = gen + "<br />";
                }
                generate.innerHTML = gen;
            }
        }
        else
        {
            generate.innerHTML = "Wprowadzono nieprawidłowe dane!";
        }
    }

    // NO CHECKED CHECKBOX
    else
    {
        if (x>0 && y>0)
        {
            if (settings == "square")
            {
                for (i=1; y>=i; i++)
                {
                    for (a=1; x>=a; a++)
                    {
                        gen = gen + "&nbsp;&nbsp;&nbsp;&nbsp;";

                        if (i==1 || a==1 || i==y || a==x)
                        {
                            gen = gen + "*";
                        }
                        else
                        {
                            gen = gen + "&nbsp;&nbsp;";
                        }

                    }
                    gen = gen + "<br />";
                }
                generate.innerHTML = gen;
            }
        }
        else
        {
            generate.innerHTML = "Wprowadzono nieprawidłowe dane!";
        }
        if (y>0)
        {
            if (settings == "triangle")
            {
                for (i=1; y>=i; i++)
                {
                    for (a=1; i>=a; a++)
                    {
                        gen = gen + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

                        if (i==1 || a==1 || i==y || a==i)
                        {
                            gen = gen + "*";
                        }
                        else
                        {
                            gen = gen + "&nbsp;&nbsp;";
                        }
                    }
                    gen = gen + "<br />";
                }
                generate.innerHTML = gen;
            }
        }
        else
        {
            generate.innerHTML = "Wprowadzono nieprawidłowe dane!";
        }
    }
}
