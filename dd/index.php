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

        <h1><a onclick="location.reload()">DARKEST DUNGEON MEMORY TEST</a></h1>
        <p>Inspired by <a href="https://www.darkestdungeon.com" target="_blank">Darkest Dungeon</a></p>

    </header>

    <main>

        <article>

			<div id="ranking">

			</div>

            <div class="board">

				<h1>SIZE OF BOARD</h1>

				<a id="1" class="size" onclick="boardd(12)">4x3</a>
				<a id="2" class="size" onclick="boardd(20)">5x4</a>
				<a id="3" class="size" onclick="boardd(30)">6x5</a>
				<a id="4" class="size" onclick="boardd(48)">8x6</a>
				<a id="5" class="size" onclick="boardd(80)">8x10</a>

				<div class="info">
					&copy; by <a target="_blank" href="http://mprojectt.com/">Mateusz Pijanowski</a>
				</div>

            </div>

        </article>

    </main>

	<script src="js/memory.js"></script>

</body>
</html>
