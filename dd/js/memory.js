// GLOBAL VIRABLES
let board = "";
let board_size;
let a=1;
let b=1;
let c=0;

window.sr = ScrollReveal();
    sr.reveal('header', {
        delay: 300,
    });
    sr.reveal('main', {
        delay: 400,
    });

function anim1()
{
    window.sr = ScrollReveal();
        sr.reveal('.board', {
            delay: 200,
        });
}

function anim2()
{
    window.sr = ScrollReveal();
        sr.reveal('#ranking', {
            delay: 300,
        });
}


// MAIN FUNCTION
function boardd(x)
{
    board_size=x;
    console.log(board_size);

    // BOARD SIZE
    if(x==20)
    {
        $('.board').css('width', '800px');
    }

    if(x==30)
    {
        $('.board').css('width', '900px');
    }

    if(x==48)
    {
        $('.board').css('width', '1200px');
    }

    if(x==80)
    {
        $('.board').css('width', '1500px');
    }

    // TABLES
    let cards_list = new Array(x);
    let cards_rand = new Array(x);
    let xx = (x-1)/2;

    // CARDS LOOP
    for (i=0; i<=xx; i++)
    {
        cards_list[c]=a+".png";
        cards_list[b]=a+".png";
        a++;
        b=b+2;
        c=c+2;
    }

    xx = x;

    // BOARD LOOP
    for(i=0; i<=x-1; i++)
    {

        board = board + "<div class='card' id='c"+i+"'></div>";

            if(i==x-1)
            {
                board = board + "<div class='score'>Turn cunter: 0</div><br /><br />";
            }

    }

    // DISPLAY BOARD

    anim1();

    $(".board").html(board);

    // RANDOM CARDS LOOP
    for(var i=0; i<x; i++)
    {
        random=Math.ceil(Math.random()*xx-1);
        cards_rand[i] = cards_list[random];
        cards_list[random] = cards_list[xx-1];
        xx--;
    }

    // CARDS REVEAL LOOP
    for(i=0; i<=x; i++){
        (function (e){
        $("#c"+ e).click(function() { revealCard(e); });
    })(i);
    }

    // GAMES VIRABLES
    let oneVisible = false;
    let turnCunter = 0;
    let Visible_nr;
    let lock = false;
    let pairsLeft = x/2;

    // REVEAL CARDS FUNCTION
    function revealCard(nr)
    {
        let opacityValue = $('#c'+nr).css('opacity');

        if(opacityValue != 0 && lock == false)
        {
            lock = true;
            let picture = "url(img/" + cards_rand[nr] + ")";

            $('#c'+nr).css('background-image', picture)
            $('#c'+nr).removeClass('card');
            $('#c'+nr).addClass('cardA');

            if(oneVisible == false)
            {
                // first card

                oneVisible = true;
                Visible_nr = nr;
                lock = false;
            }

            else
            {
                // second card

                if (cards_rand[Visible_nr] == cards_rand[nr])
                {
                    setTimeout(function() { hide2cards(nr, Visible_nr) }, 600);
                }
                else
                {
                    setTimeout(function() { restore2cards(nr, Visible_nr) }, 600);
                }

                turnCunter++;
                $('.score').html('Turn cunter: '+turnCunter)
                oneVisible=false;
            }
        }

    }

    // HIDE TWO CARDS FUNCTION
    function hide2cards(nr1, nr2)
    {
        $('#c'+nr1).css('opacity', '0');
        $('#c'+nr2).css('opacity', '0');
        pairsLeft--;

        // WIN
        if (pairsLeft==0)
        {
            $('.card').css('display', 'none');
            $('.cardA').css('display', 'none');
            $('.board').css('width', '400px');
            $('#ranking').html('<span id="goodjob">Good Job!</span><form action="ranking" method="post"><br><input type="text" placeholder="Your nick" name="nick"/><br/><input type="hidden" name="turns" value="'+turnCunter+'"/><input type="hidden" name="board" value="'+board_size+'"/><br><input type="submit" value="SAVE"/></form><br>');
            $('#ranking').css('display', 'block');
            anim2();
            //$('.board').html('<br /><h1>You Win!<br />Done in '+turnCunter+' turns<br /><br /><a style="cursor: pointer" onclick="location.reload()">Again?</a></h1>');
        }

        lock = false;
    }

    // RESTORE TWO CARDS FUNCTION
    function restore2cards(nr1, nr2)
    {
        $('#c'+nr1).css('background-image', 'url(img/karta.png)');
        $('#c'+nr1).addClass('card');
        $('#c'+nr1).removeClass('cardA');

        $('#c'+nr2).css('background-image', 'url(img/karta.png)');
        $('#c'+nr2).addClass('card');
        $('#c'+nr2).removeClass('cardA');

        lock = false;
    }
}
