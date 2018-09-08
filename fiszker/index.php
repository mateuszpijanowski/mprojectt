<?php

$connect_content = "index";
require_once "connect.php";

$cate_inf = ""; $cate_med = ""; $cate_bio = ""; $cate_che = ""; $cate_fiz = ""; $cate_psy = ""; $cate_ang = ""; $cate_lat = "";
$cate = "";
$cate_limit = 1800;

for ($i = 0; $i<=$how; $i++)
{

    $row[$i] = strtoupper($row[$i]);

    if (preg_match('/^INF/', $row[$i]) && strlen($cate_inf)<$cate_limit)
    {
        $row[$i] = preg_replace('[INF_]', '', $row[$i]);
        $cate_id = str_replace(' ', '', $row[$i]);

        $cate_inf = $cate_inf.'<span id="'.$cate_id.'" class="cate">#'.$row[$i].'</span>

        <script>
            $("#'.$cate_id.'").click(function() {
                location.href="cards?cate='.$row[$i].'&field=inf";
            })
        </script>';
    }

    else if (preg_match('/^MED/', $row[$i]) && strlen($cate_med)<$cate_limit)
    {
        $row[$i] = preg_replace('[MED_]', '', $row[$i]);
        $cate_id = str_replace(' ', '', $row[$i]);

        $cate_med = $cate_med.'<span id="'.$cate_id.'" class="cate">#'.$row[$i].'</span>

        <script>
            $("#'.$cate_id.'").click(function() {
                location.href="cards?cate='.$row[$i].'&field=med";
            })
        </script>';
    }

    else if (preg_match('/^BIO/', $row[$i]) && strlen($cate_bio)<$cate_limit)
    {
        $row[$i] = preg_replace('[BIO_]', '', $row[$i]);
        $cate_id = str_replace(' ', '', $row[$i]);

        $cate_bio = $cate_bio.'<span id="'.$cate_id.'" class="cate">#'.$row[$i].'</span>

        <script>
            $("#'.$cate_id.'").click(function() {
                location.href="cards?cate='.$row[$i].'&field=bio";
            })
        </script>';
    }

    else if (preg_match('/^CHE/', $row[$i]) && strlen($cate_che)<$cate_limit)
    {
        $row[$i] = preg_replace('[CHE_]', '', $row[$i]);
        $cate_id = str_replace(' ', '', $row[$i]);

        $cate_che = $cate_che.'<span id="'.$cate_id.'" class="cate">#'.$row[$i].'</span>

        <script>
            $("#'.$cate_id.'").click(function() {
                location.href="cards?cate='.$row[$i].'&field=che";
            })
        </script>';
    }

    else if (preg_match('/^FIZ/', $row[$i]) && strlen($cate_fiz)<$cate_limit)
    {
        $row[$i] = preg_replace('[FIZ_]', '', $row[$i]);
        $cate_id = str_replace(' ', '', $row[$i]);

        $cate_fiz = $cate_fiz.'<span id="'.$cate_id.'" class="cate">#'.$row[$i].'</span>

        <script>
            $("#'.$cate_id.'").click(function() {
                location.href="cards?cate='.$row[$i].'&field=fiz";
            })
        </script>';
    }

    else if (preg_match('/^PSY/', $row[$i]) && strlen($cate_psy)<$cate_limit)
    {
        $row[$i] = preg_replace('[PSY_]', '', $row[$i]);
        $cate_id = str_replace(' ', '', $row[$i]);

        $cate_psy = $cate_psy.'<span id="'.$cate_id.'" class="cate">#'.$row[$i].'</span>

        <script>
            $("#'.$cate_id.'").click(function() {
                location.href="cards?cate='.$row[$i].'&field=psy";
            })
        </script>';
    }

    else if (preg_match('/^FIL/', $row[$i]) && strlen($cate_fil)<$cate_limit)
    {
        $row[$i] = preg_replace('[FIL_]', '', $row[$i]);
        $cate_id = str_replace(' ', '', $row[$i]);

        $cate_fil = $cate_fil.'<span id="'.$cate_id.'" class="cate">#'.$row[$i].'</span>

        <script>
            $("#'.$cate_id.'").click(function() {
                location.href="cards?cate='.$row[$i].'&field=fil";
            })
        </script>';
    }

    else if (preg_match('/^POL/', $row[$i]) && strlen($cate_pol)<$cate_limit)
    {
        $row[$i] = preg_replace('[POL_]', '', $row[$i]);
        $cate_id = str_replace(' ', '', $row[$i]);

        $cate_pol = $cate_pol.'<span id="'.$cate_id.'" class="cate">#'.$row[$i].'</span>

        <script>
            $("#'.$cate_id.'").click(function() {
                location.href="cards?cate='.$row[$i].'&field=pol";
            })
        </script>

        ';
    }

    else if (preg_match('/^ANG/', $row[$i]) && strlen($cate_ang)<$cate_limit)
    {
        $row[$i] = preg_replace('[ANG_]', '', $row[$i]);
        $cate_id = str_replace(' ', '', $row[$i]);

        $cate_ang = $cate_ang.'<span id="'.$cate_id.'" class="cate">#'.$row[$i].'</span>

        <script>
            $("#'.$cate_id.'").click(function() {
                location.href="cards?cate='.$row[$i].'&field=ang";
            })
        </script>';
    }

    else if (preg_match('/^LAT/', $row[$i]) && strlen($cate_lat)<$cate_limit)
    {
        $row[$i] = preg_replace('[LAT_]', '', $row[$i]);
        $cate_id = str_replace(' ', '', $row[$i]);

        $cate_lat = $cate_lat.'<span id="'.$cate_id.'" class="cate">#'.$row[$i].'</span>

        <script>
            $("#'.$cate_id.'").click(function() {
                location.href="cards?cate='.$row[$i].'&field=lat";
            })
        </script>

        ';
    }

}

function main()
{

    global $cate_inf, $cate_med, $cate_bio, $cate_che, $cate_fiz, $cate_psy, $cate_ang, $cate_lat, $cate_fil, $cate_pol, $ile;

    echo '

    <!DOCTYPE HTML>
    <html lang="pl">
    <head>
        <meta charset="utf-8" />
        <title>Fiszker - Zbiór '.$ile.' w 10 kategoriach wiedzy!</title>
        <meta name="description" content="Zbi�r '.$ile.' wirtualnych fiszek w 10 kategoriach wiedzy!" />
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
        <script src="js/field.js"></script>

        <!--[if lt IE 9]>
        <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <a href="#" class="scrollup"></a>

        <header>

            <div id="logo">
                <h1 id="fiszker" onclick="location.reload()">FISZKER</h1>
            </div>

            <div id="red-line"></div>

        </header>

        <main>

        <div class="scroll_animate_text">

            <div class="text">
                <span>Ucz się nowocześnie dzięki</span>
                '.$ile.' fiszą w 10 dziedzinach wiedzy!
            </div>

        </div>

            <div id="fields">

                <article>
                    <div class="scroll_animate_fields">
                        <div id="info" class="field">
                            <a class="title">Informatyka</a>
                            '.$cate_inf.'
                        </div>
                    </div>
                </article>

                <article>
                    <div class="scroll_animate_fields">
                        <div id="med" class="field">
                            <a class="title">Medycyna</a>
                            '.$cate_med.'
                        </div>
                    </div>
                </article>

                <div style="clear: both;"></div>

                <article>
                    <div class="scroll_animate_fields">
                        <div id="bio" class="field">
                            <a class="title">Biologia</a>
                            '.$cate_bio.'
                        </div>
                    </div>
                </article>

                <article>
                    <div class="scroll_animate_fields">
                        <div id="chem" class="field">
                            <a class="title">Chemia</a>
                            '.$cate_che.'
                        </div>
                    </div>
                </article>

                <div style="clear: both;"></div>

                <article>
                    <div class="scroll_animate_fields">
                        <div id="psych" class="field">
                            <a class="title">Psychologia</a>
                            '.$cate_psy.'
                        </div>
                    </div>
                </article>

                <article>
                    <div class="scroll_animate_fields">
                        <div id="fiz" class="field">
                            <a class="title">Fizyka</a>
                            '.$cate_fiz.'
                        </div>
                    </div>
                </article>

                <div style="clear: both;"></div>

                 <article>
                    <div class="scroll_animate_fields">
                        <div id="fil" class="field">
                            <a class="title">Filozofia</a>
                            '.$cate_fil.'
                        </div>
                    </div>
                </article>

                <article>
                    <div class="scroll_animate_fields">
                        <div id="pol" class="field">
                            <a class="title">J. polski</a>
                            '.$cate_pol.'
                        </div>
                    </div>
                </article>

                <div style="clear: both;"></div>

                <article>
                    <div class="scroll_animate_fields">
                        <div id="ang" class="field">
                            <a class="title">J. angielski</a>
                            '.$cate_ang.'
                        </div>
                    </div>
                </article>

                <article>
                    <div class="scroll_animate_fields">
                        <div id="latin" class="field">
                            <a class="title">J. łaciński</a>
                            '.$cate_lat.'
                        </div>
                    </div>
                </article>

                <div style="clear: both;"></div>

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
