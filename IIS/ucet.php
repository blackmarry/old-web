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

						<?php
							if(isset($_SESSION['username'])){
								require_once('connect_to_sql.php');
								$user = $_SESSION['username'];
								if(isset($_GET["oblibene"])){
									// postavy
									$querry = "SELECT * FROM CHARACT join USER_CHARACT on CHARACT.ID_CHARACT = USER_CHARACT.CHARACT_ID where USER_ID =".$_SESSION['usr_id'];
									$response = mysqli_query($dbc, $querry);
									if($response){
										$counter = 0;
										?>
										<h6><b>Character: </b></h6>
										<div class="container">
											<div class="row">

										<?php
										while($row = mysqli_fetch_array($response)){
											if($counter%2){ $left_card = 

												'<div class="card">
												  <img class="mx-auto d-block" src="images/characters/'.$row['PICTURE'].'" alt="logo">
												  <div class="card-body">
							    					<a class="star" href="remove_favorite.php?charact='.$row['ID_CHARACT'].'" >&#x274c</a>
												    <h4 class="card-title">'. $row['NAME'].'</h4>
												    <p class="card-text">look: '. $row['LOOK'].', age:'. $row['AGE'].', appear: '. $row['FIRST_APPEARANCE'].' - '. $row['LAST_APPEARANCE'].'</p>
													
												  </div>
												</div>';

											?>
											<div class="col-md-6">

												<?php echo $left_card; ?>

											</div>
											<?php
											
											}else
											{
												$right_card = 
													'<div class="card">
													  <img class="mx-auto d-block" src="images/characters/'.$row['PICTURE'].'" alt="logo">
													  <div class="card-body">
													  	<a class="star" href="remove_favorite.php?charact='.$row['ID_CHARACT'].'">&#x274c</a>
													    <h4 class="card-title">'. $row['NAME'].'</h4>
													    <p class="card-text">look: '. $row['LOOK'].', age:'. $row['AGE'].', appear: '. $row['FIRST_APPEARANCE'].' - '. $row['LAST_APPEARANCE'].'</p>
														
													  </div>
													</div>';

											?>
											<div class="col-md-6">

												<?php echo $right_card; ?>

											</div>
											<?php

											}
											$counter ++;
										}
										?>
											</div>
										</div>
										<?php
									}
									// zanry
									$querry = "SELECT * FROM GENRE join USER_GENRE on GENRE.ID_GENRE = USER_GENRE.GENRE_ID where USER_ID =".$_SESSION['usr_id'];
									$response = mysqli_query($dbc, $querry);
									if($response){
										$counter = 0;
										?>
										<h6><b>Genre: </b></h6>
										<div class="container">
											<div class="row">

										<?php
										while($row = mysqli_fetch_array($response)){
											if($counter%2){ $left_card = 
												
												'<div class="card">
												  <div class="card-body">
													<a class="star" href="remove_favorite.php?genre='.$row['ID_GENRE'].'">&#x274c</a>
												    <h4 class="card-title"><a href="manga.php?by_genre='.$row['ID_GENRE'].'&genres">'. $row['NAME'].'</a></h4>
													
												  </div>
												</div>';

											?>
											<div class="col-md-6">

												<?php echo $left_card; ?>

											</div>
											<?php	

											}else
											{
												$right_card =
												
												'<div class="card">
												  <div class="card-body">
												  	<a class="star" href="remove_favorite.php?genre='.$row['ID_GENRE'].'">&#x274c</a>
												    <h4 class="card-title"><a href="manga.php?by_genre='.$row['ID_GENRE'].'&genres">'. $row['NAME'].'</a></h4>
													
												  </div>
												</div>';

												?>
											<div class="col-md-6">

												<?php echo $right_card; ?>

											</div>
											<?php

											}
											$counter ++;
										}
										?>
											</div>
										</div>
										<?php
									}
									
									// mangy
									$querry = "SELECT * FROM MANGA join USER_MANGA on MANGA.ID_MANGA = USER_MANGA.MANGA_ID where USER_ID =".$_SESSION['usr_id'];
									$response = mysqli_query($dbc, $querry);
									if($response){
										$counter = 0;
										?>
										<h6><b>Manga: </b></h6>
										<div class="container">
											<div class="row">

										<?php
										while($row = mysqli_fetch_array($response)){
											if($counter%2){ $left_card = 
												
												'<div class="card">
												  <img class="mx-auto d-block" src="images/manga/'.$row['PICTURE'].'" alt="logo">
												  <div class="card-body">
													<a class="star" href="remove_favorite.php?manga='.$row['ID_MANGA'].'">&#x274c</a>
												    <h4 class="card-title"><a href="manga.php?manga='. $row['ID_MANGA'].'">'.$row['TITLE'].'</a></h4>
												    <p class="card-text"> release: '. $row['DATE_OF_RELEASE'].'<br /> status: '. $row['STATUS'].'<br /> new every '. $row['FREQUENCY'].'</p>

												  </div>
												</div>';

											?>
											<div class="col-md-6">

												<?php echo $left_card; ?>

											</div>
											<?php	

											}else{
												$right_card =
												
												'<div class="card">
												  <img class="mx-auto d-block" src="images/manga/'.$row['PICTURE'].'" alt="logo">
												  <div class="card-body">
													<a class="star" href="remove_favorite.php?manga='.$row['ID_MANGA'].'">&#x274c</a>											
												    <h4 class="card-title"><a href="manga.php?manga='. $row['ID_MANGA'].'">'.$row['TITLE'].'</a></h4>
												    <p class="card-text"> release: '. $row['DATE_OF_RELEASE'].'<br /> status: '. $row['STATUS'].'<br /> new every '. $row['FREQUENCY'].'</p>
												  </div>
												</div>';

												?>
											<div class="col-md-6">

												<?php echo $right_card; ?>

											</div>
											<?php

											}
											$counter ++;
										}
										?>
											</div>
										</div>
										<?php
									}
								}
								//.$row['TITLE'].' '. $row['DATE_OF_RELEASE'].' '. $row['STATUS'].' '. $row['FREQUENCY'].' '. $row['PICTURE'].'<a href="manga.php?manga='. $row['ID_MANGA'].'">epizody</a>'
								elseif(isset($_GET["nastaveni"])){
									require_once('connect_to_sql.php');
									$usr = $_SESSION['username'];
									$querry = 'select * from T_USER where NICKNAME ="'.$usr.'"';
									$response = mysqli_query($dbc, $querry);
									echo mysqli_error($dbc);
									$row = mysqli_fetch_array($response);	
									//var_dump($row);
									/*<p>pass: 	<?php echo $row['PASSWORD'] ?> </p>*/
										
									?>
									<form action="change_settings.php" method="post">
										<p><b>Current information:</b></p>
										<p>Nickname: 	<?php echo $_SESSION['username'] ?> </p>
										<p>First name: 	<?php echo $row['NAME'] ?> </p>
										<p>Last name: 	<?php echo $row['SURNAME'] ?> </p>
										<p>Date of birth: 	<?php echo $row['DATE_OF_BIRTH'] ?> </p>
										<p>Notifications: 	<?php echo $row['NOTIFICATION_D'] ?> </p>
										<p>Shipping: 	<?php echo $row['SHIPPING_ENABED'] ?> </p>
										<p><b>Change information: </b></p>
										<p>Password: 	<input type="password" 	name="password" size="30" value="" />*</p>
										<p>New password: 	<input type="password" 	name="newpass" size="30" value="" /></p>
										<p>First name: 	<input type="text" 			name="name" size="30" value="" /></p>
										<p>Last name: 	<input type="text"		 	name="surname" size="30" value="" /></p>
										<p>Date of birth:<input type="date" 		name="bday"></p>
										<p>Allow notification:		<input type="checkbox" 	name="Notifikace" value="on" checked></p>
										<p>Allow online shipping:		<input type="checkbox"	name="Zasilani" value="on" checked></p>
										<p><input type="submit" name="change" value="change" /></p>
									</form>
								<?php
										if(isset($_GET["bad_pass"])){
											echo "Incorrect password!";
										}
								}elseif(isset($_GET["admin"])){
									require_once('connect_to_sql.php');
									$usr = $_SESSION['username'];
									$querry = 'select * from T_USER where NICKNAME ="'.$usr.'"';
									$response = mysqli_query($dbc, $querry);
									echo mysqli_error($dbc);
									$row = mysqli_fetch_array($response);	
									if($row['SPRAVCE']!= "Y" ){
										echo "<p>You have to be administrator in order to use this feature!</p>";
									}else{
										include 'admin.php';
									}
								}else{
										require_once('connect_to_sql.php');
										$usr = $_SESSION['username'];
										$querry = 'select * from T_USER where NICKNAME ="'.$usr.'"';
										$response = mysqli_query($dbc, $querry);
										echo mysqli_error($dbc);
										$row = mysqli_fetch_array($response);	?>
										
										<p>Nickname: 	<?php echo $_SESSION['username'] ?> </p>
										<p>ID: 	<?php echo $_SESSION['usr_id'] ?> </p>
										<p>First name: 	<?php echo $row['NAME'] ?> </p>
										<p>Last name: 	<?php echo $row['SURNAME'] ?> </p>
										<p>Date of birth: 	<?php echo $row['DATE_OF_BIRTH'] ?> </p>
										<p>Notifications: 	<?php echo $row['NOTIFICATION_D'] ?> </p>
										<p>Shipping: 	<?php echo $row['SHIPPING_ENABED'] ?> </p>
								<?php
										
								}
							}
							else{
								echo "sorry, you have to be logged in to use this feature :(";
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
