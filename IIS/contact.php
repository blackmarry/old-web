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
						<div class="col-md-7">
							<!-- prostredni sloupec -->
							<div class="container">
								<h3>Vypracovali:</h3>
									<p><b>Radek Mojžíš</b></p>
									<p>xmojzi07</p>
									<p><b>Mária Halamová</b></p>
									<p>xhalam14</p>
							</div>
						</div>
						<!-- Pravy sloupec -->
						<?php
							include 'right_bar.php';
						?>
					</div>

			</main>
		</div>
	</body>
</html>