<?php

if (isset($connect_content))
{

    require_once "../mproject/connect.php";
    $db_name = "lysyyyy_fiszker";
    $db_user = "lysyyyy_fiszker";

    mysqli_report(MYSQLI_REPORT_STRICT); // MYSQL REPORT TYPE

    try // CONNECT TRY
    {
        $connect = new mysqli($host, $db_user, $db_pass, $db_name); // MYSQL CONNECT
        if ($connect->connect_errno!=0) // CONNECT ERROR TEST
        {
            throw new Exception(mysqli_connect_errno()); // THROW CONNECT ERROR
        }
        else
        {
            mysqli_query($connect, "SET CHARSET utf8");
            mysqli_query($connect, "SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");

            if ($connect_content == "index")
            {
                $inquiry = "SHOW TABLES";
                $result = mysqli_query($connect, $inquiry); // MYSQL RESULT

                @$how = $result->num_rows-1; // AMOUNT OF USERS
                $ile = 0;
                $cate = "";

                for ($i = 0; $i<=$how; $i++)
                {
                    $tab = $result->fetch_assoc();
                    $fiszker = $tab["Tables_in_lysyyyy_fiszker"];
                    $row[$i] = $fiszker;

                    $result2 = mysqli_query($connect, "SELECT * FROM $row[$i]"); // MYSQL RESULT
                    @$ile = mysqli_num_rows($result2) + $ile;
                }
            }

            else if ($connect_content == "cate")
            {
                $result = mysqli_query($connect, $inquiry); // MYSQL RESULT

                @$how1 = $result->num_rows; // AMOUNT OF USERS
                @$how = $result->num_rows-1; // AMOUNT OF USERS
                $ile = 0;
                $main = "";

                for ($i = 0; $i<=$how; $i++)
                {
                    $tab = $result->fetch_assoc();
                    $fiszker = $tab['Tables_in_lysyyyy_fiszker'];
                    $row[$i] = $fiszker;

                    $inquiry2 = "SELECT descr FROM `$row[$i]` WHERE id = 1";
                    $result2 = mysqli_query($connect, $inquiry2); // MYSQL RESULT
                    $descr = mysqli_fetch_assoc($result2);
                    $result5 = mysqli_query($connect, "SELECT * FROM `$row[$i]`"); // MYSQL RESULT
                    $ile = mysqli_num_rows($result5) + $ile;

                    $row[$i] = preg_replace('['.$cate.'_]', '', $row[$i]);
                    $row[$i] = strtoupper($row[$i]);
                    $cate_name = $row[$i];
                    $cate_id = $row[$i] = str_replace(' ', '', $row[$i]);

                    //print_r($row);

                    $main = $main.'
                    <article>
                        <div id="'.$cate_id.'" class="field">
                            <a class="title">'.$cate_name.'</a>
                            <span class="desc">'.$descr["descr"].'</span>
                        </div>
                    </article>

                    <script>
                        $("#'.$cate_id.'").click(function() {
                            location.href="cards?cate='.$cate_name.'&field='.$cate.'";
                        })
                    </script>

                    ';

                    if ($i%2)
                    {
                        $main = $main.'<div style="clear: both;"></div>';
                    }
                    
                    if (!($i%2) && ($i==$how))
                    {
                        $main = $main.'
                        <script>
                            $("#'.$cate_id.'").css("float", "none");
                        </script>';
                    }
                }
            }

            else if ($connect_content == "cards")
            {
                $cards = $field.'_'.strtolower($cate);

                $inquiry = "SELECT * FROM `$cards`";
                $result = mysqli_query($connect, $inquiry); // MYSQL RESULT

                @$how = $result->num_rows; // AMOUNT OF USERS

                if ($how == 1)
                {
                    $fiszka = "fiszka";
                }
                else if (($how<10 && (preg_match('/^[2-4]/', $how))) || ($how>9 && (preg_match('/^.[2-4]/', $how))) || ($how>99 && (preg_match('/^..[2-4]/', $how))))
                {
                    $fiszka = "fiszki";
                }
                else {
                    $fiszka = "fiszek";
                }

                if (isset($type))
                {

                    $type_set = '$("#none").css("display", "none"); $("#page1").css("display", "block"); $("#page2").css("display", "none")';

                    if ($type == "random")
                    {
                        $min=1;
                        $max=$how;
                        $random=rand($min,$max);

                        // Zapytanie MySQL
                        $inquiry_rand = "SELECT page1,page2 FROM `$cards` WHERE id=$random";
                        $result_cards = mysqli_query($connect, $inquiry_rand); // MYSQL RESULT
                    }

                    if ($type == "static" && isset($id_nr))
                    {
                        $inquiry_static = "SELECT page1,page2 FROM `$cards` WHERE id=$id_nr";
                        $result_cards = mysqli_query($connect, $inquiry_static); // MYSQL RESULT
                    }

                    $min2=0;
                    $max2=1;
                    $random2=rand($min2,$max2);

                    // Warunek sprawdzający wynik losowania
                    if ($random2==0) {

                        $row = mysqli_fetch_assoc($result_cards);
                        $page1 = $row['page1'];
                        $page2 = $row['page2'];
                    }

                    if ($random2==1) {

                        $row = mysqli_fetch_assoc($result_cards);
                        $page1 = $row['page2'];
                        $page2 = $row['page1'];
                    }

                    // POBIERANIE LICZBY ZNAKÓW DANEJ STRONY
                    $page1_letter = strlen($page1);
                    $page1_letter = strlen($page1);
                    $page1_sqrt = sqrt($page1_letter);
                    if($page1_sqrt<1)
                    {
                        $page1_sqrt = 1;
                    }

                    if ($type == "random")
                    {
                        $next_id = $random;

                        $t_random = "location.reload();";
                        // Wygenerowany kod HTML
                        $card = "<div class='card' id='page1'>
                        <span id='card1' style='display: block;'>[$random] $page1</span>
                        </div>
                        <div class='card' id='page2'>
                        <span id='card2'>$page2</span>
                        </div>";
                    }

                    if ($type == "static" && isset($id_nr))
                    {
                        $next_id = $id_nr+1;
                        $t_random = "";

                        if($next_id>$how)
                        {
                            $next_id=1;
                        }

                        // Wygenerowany kod HTML
                        $card = "<div class='card' id='page1'>
                        <span id='card1' style='display: block;'><font size='7'>[$id_nr] $page1</font></span>
                        </div>
                        <div class='card' id='page2'>
                        <span id='card2'><font size='7'>$page2</font></span>
                        </div>";
                    }

                    $keydown = 'let keyy = 0;
                        $("#page1").click(function() {
                            keyy=13;
                        })
                    $(document).keydown(function(key) {
                        let keyCode = key.keyCode;
                        keyy = keyy + keyCode;

                        // Pierwszy ENTER
                        if (keyy==13) {
                            reverse();
                            event.preventDefault();
                        }

                        // Drugi ENTER
                        else if (keyy==26)
                        {
                            keyy=0;
                            '.$t_random.'
                            location.href="cards?cate='.$cate.'&field='.$field.'&type='.$type.'&id_nr='.$next_id.'#page1";
                            event.preventDefault();
                        }

                        else {
                            keyy=0;
                        }

                    })';

                }
            }

            else if ($connect_content == "tools")
            {
                if (isset($inquiry))
                {
                    $result = mysqli_query($connect, $inquiry); // MYSQL RESULT

                    if($result)
                    {
                        $result_ls = "<span class='info'>Baza danych została zaktualizowana!</span>";
                        $ok = 1;
                    }

                    else {
                        $result_ls = "<span class='info'>Doszło do błędu!</span>";
                        $ok = 1;
                    }
                }

                if (isset($inquiry2))
                {
                    $result2 = mysqli_query($connect, $inquiry2); // MYSQL RESULT

                    if($result2)
                    {
                        $result_ls = "<span class='info'>Baza danych została zaktualizowana!</span>";
                        $ok = 1;
                    }

                    else {
                        $result_ls = "<span class='info'>Dobszło do błędu!</span>";
                        $ok = 1;
                    }
                }

                else if (isset($inquiry_ls))
                {
                    $result = mysqli_query($connect, $inquiry_ls); // MYSQL RESULT

                    @$how = mysqli_num_rows($result);

                    if ($how == 0)
                    {
                        $result_ls = "<span class='info'>Wybrana tabela jest pusta lub nie istnieje!</span>";
                        $ok = 1;
                    }

                    else
                    {
                        // Warunek sprawdzający rezultat zapytania
                        if($result)
                        {
                            $result_ls = '<table width=900 align=center border=1 bordercolor=e5e5e5 cellpadding=0 cellspacing=0><tr>';

                            if ($how>=1)
                            {
                                $result_ls = $result_ls.' <br /><td width=50 align=center bgcolor=lightgray><font color=black><b>ID</b></font></td><td width=100 align=center bgcolor=lightgray><font color=black><b>Strona1</b></font></td><td width=100 align=center bgcolor=lightgray><font color=black><b>Strona2</b></font></td></tr><tr>';

                                for ($i = 1; $i <= $how; $i++)
                                {

                                    $row = mysqli_fetch_assoc($result);
                                    $id = $row['id'];
                                    $page1 = $row['page1'];
                                    $page2 = $row['page2'];

                                    $result_ls = $result_ls.'<td width=50 align=center>'.$id.'</td><td width=100 align=center>'.$page1.'</td><td width=100 align=center>'.$page2.'</td></tr><tr>';

                                }

                                $result_ls = $result_ls.'</tr></table>';

                            }

                            $ok = 1;

                        }

                        else {
                            $result_ls = '"<span class="info">Doszło do błędu!</span>"';
                            $ok = 1;
                        }
                    }
                }

                else if (isset($inquiry_ls_cate))
                {
                    $result = mysqli_query($connect, $inquiry_ls_cate); // MYSQL RESULT

                    @$how = mysqli_num_rows($result);

                    if ($how == 0)
                    {
                        $result_ls = "<span class='info'>Wybrana tabela jest pusta lub nie istnieje!</span>";
                        $ok = 1;
                    }

                    else
                    {
                        // Warunek sprawdzający rezultat zapytania
                        if($result)
                        {
                            $result_ls = '<table width=800 align=center border=1 bordercolor=e5e5e5 cellpadding=0 cellspacing=0><tr>';

                            if ($how>=1)
                            {
                                $result_ls = $result_ls.'<td width=100 align=center bgcolor=lightgray><font color=black><b>Nazwa kategorii</b></font></td>';

                                for ($i = 1; $i <= $how; $i++)
                                {
                                    $row = mysqli_fetch_assoc($result);
                                    $fiszker = $row['Tables_in_lysyyyy_fiszker'];

                                    $result_ls = $result_ls.'<tr><td width=50 align=center>'.$fiszker.'</td></tr>';

                                }

                                $result_ls = $result_ls.'</tr></table>';

                            }

                            $ok = 1;

                        }

                        else {
                            $result_ls = '"<span class="info">Doszło do błędu!</span>"';
                            $ok = 1;
                        }
                    }
                }
            }
        }

        $connect->close(); // CLOSE CONNECT
    }

    catch(Exception $error) // LIST OF ERRORS
    {
        echo '<span style="color:red">Server error!</span>';
        echo '<br /><b>DEV info:</b> '.$error;
    }

}

?>
