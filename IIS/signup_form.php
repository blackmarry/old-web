<?php session_start(); ?>

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

							<form action="signup.php" method="post">
								<b>Sign up</b>
								<p>Nickname: 	<input type="text" 			name="username" size="30" value="" />*</p>
								<p>Password: 	<input type="password" 	name="password" size="30" value="" />*</p>
								<p>Password again: 	<input type="password" 	name="passwordcheck" size="30" value="" />*</p>
								<p>First name: 	<input type="text" 			name="name" size="30" value="" /></p>
								<p>Last name: 	<input type="text"		 	name="surname" size="30" value="" /></p>
								<p>Date of birth:<input type="date" 		name="bday"></p>
								<p>Allow notification:		<input type="checkbox" 	name="Notifikace" value="on" checked></p>
								<p>Allow online shipping:			<input type="checkbox"	name="Zasilani" value="on" checked></p>
								
								<p><input type="submit" name="signup" value="Sign up!" /></p>
							</form>	
							<?php
								if(isset($_GET["need_login"])){
									echo "Sorry, you have to be logged in to use this feature ): .";
								}
								if(isset($_GET["no_nick"])){
									echo "Sorry, you have to have a nickname:(<br>";
								}
								if(isset($_GET["dupe_nick"])){
									echo "Sorry, the nick".$_GET["dupe_nick"]." is already taken, try something else :(<br>";
								}
								if(isset($_GET["pass_missmatch"])){
									echo "The two passwords didnt match :/<br>";
								}
								if(isset($_GET["pass_missing"])){
									echo "You have to have a password!<br>";
								}
								if(isset($_GET["database_error"])){
									echo $_GET["database_error"]."<br>";
									echo "Ups, sth went horribly wrong!<br>";
								}
								if(isset($_GET["ok"])){
									echo "Registration succesfull!<br>";
								}
							?>
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