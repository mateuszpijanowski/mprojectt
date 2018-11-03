
<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<title>Darkest Dungeon - Memory Test</title>
	<meta name="description" content="Memory test inspired by Darkest Dungeon Game">
	<meta name="keywords" content="memory, test, darkest, dungeon, dd, game">
	<meta name="author" content="Mateusz Pijanowski">
	<meta http-equiv="X-Ua-Compatible" content="IE=edge,chrome=1">
	<link rel="Shortcut icon" href="img/5.png" />

	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Boogaloo" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="js/scrollreveal-master/dist/scrollreveal.min.js"></script>

	<!--[if lt IE 9]>
	<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
	<![endif]-->

</head>

<body>

    <header>

        <h1><a href="/dd">DARKEST DUNGEON MEMORY TEST</a></h1>
        <p>Inspired by <a href="https://www.darkestdungeon.com" target="_blank">Darkest Dungeon</a></p>

    </header>

    <main>

        <article>

	            <div class="board">

	                <?php
	                    ini_set("display_errors", 0);
						require_once "../mproject/connect.php";
	                    $database="lysyyyy_dd";
						$db_user = "lysyyyy_dd";
	                    $connect = mysqli_connect($host, $db_user, $db_pass);
	                    mysqli_query($connect, "SET CHARSET utf8");
	                    mysqli_query($connect, "SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");
	                    mysqli_select_db($connect, $database);

	                    $nick = $_POST['nick'];
	                    $turns = $_POST['turns'];
	                    $board = $_POST['board'];
						$board="size".$board;

	                    $inquiry = "INSERT INTO $board SET nick='$nick', turns='$turns'";
	                    mysqli_query($connect, $inquiry);

	                    echo '<br /><h1>You Win!<br />Done in <span style="color: #E9B64A">'.$turns.'</span> turns<br /><br /><a style="cursor: pointer" href="/dd">Again?</a></h1>';

	                    $inquiry = "SELECT nick,turns FROM $board ORDER BY turns LIMIT 5";
	                    $result = mysqli_query($connect, $inquiry);
	                    $how = mysqli_num_rows($result);

	                    echo "<span class='top'>TOP 5:</span>";

	                    if($result)
	                    {
	                        include("tabls.php");
	                    }

	                    else {
	                        echo "<span id='error'>DB Error!</span>";
	                    }

	                    mysql_close($connection);
	                ?>

	            </div>

        </article>

    </main>

	<script>

		window.sr = ScrollReveal();
		    sr.reveal('header', {
		        delay: 300,
		    });
		    sr.reveal('main', {
		        delay: 400,
		    });

	</script>

</body>
</html>
