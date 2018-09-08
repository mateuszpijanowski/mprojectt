<?php

$cate = $_REQUEST["field"];

if ($cate == "inf")
{
    $title = "Informatyka";
    $desc = "Informatyka to przyszłość, którą poznasz dzięki";
    $w_fiszker = "500px";
    $w_text = "1050px";
    $inquiry = "SHOW TABLES WHERE Tables_in_lysyyyy_fiszker LIKE 'inf_%'";
}

else if ($cate == "med")
{
    $title = "Medycyna";
    $desc = "Terminy medyczne na wyciągniecie ręki dzięki";
    $w_fiszker = "400px";
    $w_text = "1000px";
    $inquiry = "SHOW TABLES WHERE Tables_in_lysyyyy_fiszker LIKE 'med_%'";
}

else if ($cate == "bio")
{
    $title = "Biologia";
    $desc = "Zrozum mechanizmy biologiczne dzięki";
    $w_fiszker = "350px";
    $w_text = "850px";
    $inquiry = "SHOW TABLES WHERE Tables_in_lysyyyy_fiszker LIKE 'bio_%'";
}

else if ($cate == "che")
{
    $title = "Chemia";
    $desc = "Terminy chemiczne mogą stać się proste dzięki";
    $w_fiszker = "300px";
    $w_text = "1020px";
    $inquiry = "SHOW TABLES WHERE Tables_in_lysyyyy_fiszker LIKE 'che_%'";
}

else if ($cate == "fiz")
{
    $title = "Fizyka";
    $desc = "Zrozum otaczający Cię świat dzięki";
    $w_fiszker = "250px";
    $w_text = "750px";
    $inquiry = "SHOW TABLES WHERE Tables_in_lysyyyy_fiszker LIKE 'fiz_%'";
}

else if ($cate == "psy")
{
    $title = "Psychologia";
    $desc = "Poznaj Siebie i innych dzięki";
    $w_fiszker = "500px";
    $w_text = "620px";
    $inquiry = "SHOW TABLES WHERE Tables_in_lysyyyy_fiszker LIKE 'psy_%'";
}

else if ($cate == "fil")
{
    $title = "Filozofia";
    $desc = "Poznaj idee, które definiują otaczajacy Cię świat dzięki";
    $w_fiszker = "370px";
    $w_text = "1180px";
    $inquiry = "SHOW TABLES WHERE Tables_in_lysyyyy_fiszker LIKE 'fil_%'";
}

else if ($cate == "pol")
{
    $title = "J. polski";
    $desc = "Poszerz zakres swoich słów w ojczystym języku dzięki";
    $w_fiszker = "340px";
    $w_text = "1160px";
    $inquiry = "SHOW TABLES WHERE Tables_in_lysyyyy_fiszker LIKE 'pol_%'";
}

else if ($cate == "ang")
{
    $title = "J. angielski";
    $desc = "Ucz się najpowszechniejszego języka świata dzięki";
    $w_fiszker = "450px";
    $w_text = "1100px";
    $inquiry = "SHOW TABLES WHERE Tables_in_lysyyyy_fiszker LIKE 'ang_%'";
}

else if ($cate == "lat")
{
    $title = "J. łaciński";
    $desc = "Ucz się języka nauki dzięki";
    $w_fiszker = "410px";
    $w_text = "630px";
    $inquiry = "SHOW TABLES WHERE Tables_in_lysyyyy_fiszker LIKE 'lan_%'";
}

else {
    header("Location: index");
}

$connect_content = "cate";
require_once "connect.php";

function main()
{
    global $w_fiszker, $w_text, $title, $desc, $ile, $how1, $main;

    echo '

    <!DOCTYPE HTML>
    <html lang="pl">
    <head>
        <meta charset="utf-8" />
        <title>Fiszker - '.$title.'</title>
        <meta name="description" content="Zbiór '.$ile.' wirtualnych fiszek w 10 kategoriach wiedzy!" />
        <meta name="keywords" content="fiszki, fiszka, wiedza, informatyka, nauka, medycyna, zapamietywanie, pamiec, techniki, technika, programowanie" />
        <link rel="Shortcut icon" href="img/icon.png" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=0.3">

        <link rel="stylesheet" href="style.css" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Signika|Source+Sans+Pro" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="js/jquery.scrollto.min.js"></script>
        <script src="js/scrollreveal.min.js"></script>
        <script src="js/scrollto.js"></script>

        <script>
            $(document).ready(function() {
                $("#fiszker").css("transition", "none");
                $("#fiszker").css("width", "'.$w_fiszker.'");
                $(".text").css("width", "'.$w_text.'");
                setTimeout(function() {
                    $("#fiszker").css("transition", "all 0.8s");
                }, 10);

                $("#fiszker").click(function() {
                    location.href="./";
                });

                // ScrollReveal settings
                window.sr = ScrollReveal();
                    sr.reveal(".scroll_animate_text", {
                        delay: 150,
                        reset: true,
                    });

                    sr.reveal("#fields", {
                        delay: 300,
                        reset: false,
                    });

                    sr.reveal("article", {
                        delay: 200,
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

        <a href="#" class="scrollup"></a>

        <header>

            <div id="logo">
                <h1 id="fiszker">'.$title.'</h1>
            </div>

            <div id="red-line"></div>

        </header>

        <main>

            <div class="scroll_animate_text">
                <div class="text">
                    <span>'.$desc.'</span>
                    '.$ile.' fiszą w '.$how1.' kategoriach wiedzy!
                </div>
            </div>

            <div id="fields">

                '.$main.'

            </div>

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
