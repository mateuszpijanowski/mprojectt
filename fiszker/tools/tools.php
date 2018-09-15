<?php

$ok = 0;
$result_ls = "";

if (isset($_REQUEST["ls_cate"]))
{
    $inquiry_ls_cate = "SHOW TABLES";
}

if(isset($_POST['type']))
{

    $type = $_POST['type'];

    if ($type == "ls_card" && isset($_POST['cate_name']))
    {
        $cate_name = $_POST['cate_name'];

        $inquiry_ls = "SELECT * FROM `$cate_name`";
    }

    else if ($type == "add_cate" && isset($_POST['cate_new_name']))
    {
        $cate_new_name = $_POST['cate_new_name'];

        $inquiry = "CREATE TABLE `lysyyyy_fiszker`.`$cate_new_name` ( `id` INT NOT NULL AUTO_INCREMENT , `page1` TEXT CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL , `page2` TEXT CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL , `descr` TEXT CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_polish_ci;";
    }
    else if ($type == "add_card" && isset($_POST['cate_name']) && isset($_POST['page1']) && isset($_POST['page2']))
    {
        $cate_name = $_POST['cate_name'];
        $page1 = $_POST['page1'];
        $page2 = $_POST['page2'];

        if(isset($_POST['descr']))
        {
            $descr = $_POST['descr'];
        }
        else {
            $descr = "";
        }

        $inquiry = "INSERT INTO `$cate_name` (`id`, `page1`, `page2`, `descr`) VALUES (NULL, '$page1', '$page2', '$descr');";
    }

    else if ($type == "edit_card" && isset($_POST['cate_name']) && isset($_POST['id']) && isset($_POST['page1']) && isset($_POST['page2']))
    {
        $cate_name = $_POST['cate_name'];
        $id = $_POST['id'];
        $page1 = $_POST['page1'];
        $page2 = $_POST['page2'];

        if(isset($_POST['descr']))
        {
            $descr = $_POST['descr'];
        }
        else {
            $descr = "";
        }

        $inquiry = "UPDATE `$cate_name` SET `page1` = '$page1', `page2` = '$page2', `descr` = '$descr' WHERE `$cate_name`.`id` = $id;";
    }

    else if ($type == "edit_cate" && isset($_POST['cate_name']) && isset($_POST['cate_new_name']))
    {
        $cate_name = $_POST['cate_name'];
        $cate_new_name = $_POST['cate_new_name'];
        $new_descr = $_POST['new_descr'];

        $inquiry = "RENAME TABLE `$cate_name` TO `$cate_new_name`;";
        if (!empty($new_descr))
        {
            $inquiry2 = "UPDATE `$cate_new_name` SET `descr` = '$new_descr' WHERE `$cate_new_name`.`id` = 1;";
        }
    }

    else if ($type == "del_cate" && isset($_POST['cate_name']))
    {
        $cate_name = $_POST['cate_name'];

        $inquiry = "DROP TABLE $cate_name;";
    }

}

$connect_content = "tools";
require_once "../connect.php";

function main()
{
    global $result_ls, $error, $ok;

    echo '

    <!DOCTYPE HTML>
    <html lang="pl">
    <head>
        <meta charset="utf-8" />
        <title>Fiszker - Dev Tools</title>
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <link rel="Shortcut icon" href="../img/icon.png" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=0.3">

        <link rel="stylesheet" href="../style.css" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Signika|Source+Sans+Pro" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="../js/tools.js"></script>
        <script src="../js/jquery.scrollto.min.js"></script>
        <script src="../js/scrollto.js"></script>

        <script>
            $(document).ready(function() {
                if ('.$ok.' == 1)
                {
                    $("form").html("'.$result_ls.'");
                }
            });
        </script>

        <!--[if lt IE 9]>
        <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <a class="scrollup"></a>

        <header>

            <div id="logo">
                <h1 id="fiszker">TOOLS</h1>
            </div>

            <div id="red-line"></div>

        </header>

        <main>

            <div id="select">
                <ol>
                    <li class="limenu"><a id="selected">Wybierz tryb pracy</a>
                        <ul class="ulmenu">
                            <li id="ls_cate" class="limenu2"><a>Lista kategorii</a></li>
                            <li id="ls_card" class="limenu2"><a>Lista fiszek</a></li>
                            <li id="add_cate" class="limenu2"><a>Dodaj kategorie</a></li>
                            <li id="add_card" class="limenu2"><a>Dodaj fiszkę</a></li>
                            <li id="edit_card" class="limenu2"><a>Edytuj fiszkę</a></li>
                            <li id="edit_cate" class="limenu2"><a>Edytuj kategorię</a></li>
                            <li id="del_cate" class="limenu2"><a>Usuń kategorię</a></li>
                        </ul>
                    </li>
                </ol>
            </div>

            <div id="form">
                <form action="tools.php" method="post">

                </form>
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
