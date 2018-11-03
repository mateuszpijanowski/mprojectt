<?php

$cate = $_REQUEST["cate"];
$field = $_REQUEST["field"];
@$type = $_REQUEST["type"];
@$id_nr = $_REQUEST["id_nr"];

$cate_letter = strlen($cate);
$field_letter = strlen($field);
$logo_letter = $cate_letter+$field_letter;
$title_letter = ($logo_letter*55)+20;

$type_set = 0;

if (isset($type))
{
    $type_set = 1;
}

if (!(isset($cate)) || !(isset($field)))
{
    header("Location: index");
}

$connect_content = "cards";
require_once "connect.php";

function main()
{
    global $w_fiszker, $w_text, $keydown, $fiszka, $card, $cate, $cate, $how, $field, $type_set, $margin_gen, $next_id, $next_id, $type, $title_letter, $t_random;

    echo '

    <!DOCTYPE HTML>
    <html lang="pl">
    <head>
        <meta charset="utf-8" />
        <title>Fiszker - '.$cate.'</title>
        <meta name="description" content="Zbiór '.$ile.' wirtualnych fiszek w 10 kategoriach wiedzy!" />
        <meta name="keywords" content="fiszki, fiszka, wiedza, informatyka, nauka, medycyna, zapamietywanie, pamiec, techniki, technika, programowanie" />
        <link rel="Shortcut icon" href="img/icon.png" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=0.3">

        <link rel="stylesheet" href="style.css" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Signika|Source+Sans+Pro" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="js/scrollreveal.min.js"></script>
        <script src="js/jquery.scrollto.min.js"></script>

        <script>
            $(document).ready(function() {
                $("#fiszker").css("transition", "none");
                $("#fiszker").css("width", "'.$title_letter.'px");
                $(".text").css("width", "1000px");
                setTimeout(function() {
                    $("#fiszker").css("transition", "all 0.8s");
                }, 10);

                $("#fiszker").click(function() {
                    location.href="cate?field='.$field.'";
                });

                $("#random").click(function() {
                    location.href="cards?cate='.$cate.'&field='.$field.'&type=random#page1";
                });

                $("#static").click(function() {
                    location.href="cards?cate='.$cate.'&field='.$field.'&type=static&id_nr=1#page1";
                });

                '.$type_set.';

                '.$margin_gen.';

                '.$keydown.';

                function reverse()
                {
                    $("#page1").css("display", "none");
                    $("#page2").css("display", "block");
                    $("#card2").css("display", "block");
                }

                $("#page1").click(function() {
                    reverse();
                    location.href="#page1";
                });

                $("#page2").click(function() {
                    '.$t_random.'
                    location.href="cards?cate='.$cate.'&field='.$field.'&type='.$type.'&id_nr='.$next_id.'#page1";
                });

                // ScrollReveal settings
                window.sr = ScrollReveal();
                    sr.reveal("#none", {
                        delay: 300,
                    });
            });

            jQuery(function($)
            {
                $.scrollTo(0);

                $(".text").click(function() { $.scrollTo($("#red-line"), 500); });
            });
        </script>

        <!--[if lt IE 9]>
        <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <header>

            <div id="logo">
                <h1 id="fiszker">'.$field.' - '.$cate.'</h1>
            </div>

            <div id="red-line"></div>

        </header>

        <main>

            <div class="scroll_animate_text">
                <div class="text">
                    Przed TobÄ… '.$how.' '.$fiszka.' w kategorii - '.$cate.'
                    <div style="padding-bottom: 60px"></div>
                </div>
            </div>

            <div id="none">

                <div id="cards">

                    <div style="padding-top: 90px"></div>

                    <div id="random" class="type">
                        <span>RANDOM</span>
                    </div>

                    <div style="padding-bottom: 90px"></div>

                    <div id="static" class="type">
                        <span>STATIC</span>
                    </div>

                </div>

            </div>

            '.$card.'

        </main>

        <footer>

            <div class="red-line2"></div>

            <div class="footer">
                <br />
                <a class="copyright">&copy; by <a class="mproject" target="_blank" href="http://mprojectt.com/">Mateusz Pijanowski</a></a>
            </div>

        </footer>

    </body>
    </html>
    ';
}

main();

?>
