<?php
	session_start();
	if(!isset($_SESSION['username'])){
		header('Location: signup_form.php?need_login');
	}
	if(isset($_GET['remove_magazine'])){
		$index = array_search($_GET['remove_magazine'], $_SESSION['magazines']);
		unset($_SESSION['magazines'][$index]);
		$_SESSION["magazines"] = array_values($_SESSION["magazines"]);
		echo $index;
	}
	if(isset($_GET['remove_volume'])){
		$index = array_search($_GET['remove_volume'], $_SESSION['volumes']);
		unset($_SESSION['volumes'][$index]);
		$_SESSION["volumes"] = array_values($_SESSION["volumes"]);
		echo $index;
	}
	if(isset($_GET['empty'])){
		unset($_SESSION['volumes']);
		$_SESSION['volumes'] = array();
		unset($_SESSION['magazines']);
		$_SESSION['magazines'] = array();
	}
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

									<h6><b>Magazines: </b></h6>
									<div class="container">
										
						<?php
							require_once('connect_to_sql.php');
							foreach ($_SESSION['magazines'] as $magazine){
								$querry = "SELECT * FROM  MAGAZINE where ID_MAGAZINE =".$magazine;
								$response = mysqli_query($dbc, $querry);
								$count = mysqli_num_rows($response);	
								echo mysqli_error($dbc);
								
								if($response){
									while($row = mysqli_fetch_array($response)){
										echo'
											  	<a class="star" href="kosik.php?remove_magazine='.$row['ID_MAGAZINE'].'">&#x274c</a>
											    <h4 class="card-title">'. $row['TITLE'].'</h4>';
									}
									
								}
								
								else{
									echo'Database error :(<br>';
									echo mysqli_error($dbc);
								}
							}

		?>
									</div>

									<h6><b>Volumes: </b></h6>
									<div class="container">
									<?php
							foreach ($_SESSION['volumes'] as $volume){
								$querry = "SELECT * FROM  VOLUME where ID_VOLUME =".$volume;
								$response = mysqli_query($dbc, $querry);
								$count = mysqli_num_rows($response);
								echo mysqli_error($dbc);
								if($response){
									while($row = mysqli_fetch_array($response)){
											echo'
											  	<a class="star" href="kosik.php?remove_volume='.$row['ID_VOLUME'].'">&#x274c</a>
											    <h4 class="card-title">'. $row['NAME'].'</h4>';
									}
									
								}
								else{
									echo'Database error :(<br>';
									echo mysqli_error($dbc);
								}
							}
							?>
						</div>
						<?php
							echo '<br /><a href="kosik.php?empty">Check out</a><a class="star" href="kosik.php?empty">Empty the cart</a><br>';
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