<?php
	session_start();
?>


<html>
	<head>
		<title>Manga shop</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

		<link rel="stylesheet" type="text/css" href="manga.css">
		<link href="bootstrap.css" type="text/css" rel="stylesheet">
		
	</head>
	
	<body> 
		<div class="container">
			<header class="masthead">
				<!-- Menu -->
				<?php
					include 'menu.php';
				?>
			</header>
			<main role="main">

					<div class="row">
						<!-- Levy sloupec -->
						<?php
							include 'left_bar.php';
						?>
						<!-- prostredni sloupec -->
						<?php
							include 'contents.php';
						?>
						<!-- Pravy sloupec -->
						<?php
							include 'right_bar.php';
						?>
					</div>

			</main>
		</div>
	</body>
</html>