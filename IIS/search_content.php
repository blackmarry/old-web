<div class="col-md-7">
<?php
	require_once('connect_to_sql.php');
	if(isset($_GET["search"])){
		$what = $_GET['what'];
		$what = preg_replace("#[^0-9a-z]#i", "", $what);
		$by = $_GET['by'];
		if($by == "manga" ){
			$querry = "SELECT * FROM MANGA where TITLE like '%$what%'";
			$response = mysqli_query($dbc, $querry);
			$count = mysqli_num_rows($response);

			if($count == 0){
				$output="Sorry, no match found!";
			}
			if($response){
				$counter = 0;
				?>
				<div class="container">
					<div class="row">
				<?php
				while($row = mysqli_fetch_array($response)){
					if($counter%2){?>
						<div class="card">
						  <img class="mx-auto d-block" src="images/manga/<?php echo $row['PICTURE'];?>" alt="logo">
							<div class="card-body">
							<a class="star" href="add_favorite.php?manga=<?php echo $row['ID_MANGA'];?>">&#11088</a>
							<h4 class="card-title"><a href="manga.php?manga=<?php echo $row['ID_MANGA'];?>"> <?php echo $row['TITLE'];?></a></h4>
							<p class="card-text">Release:<?php echo $row['DATE_OF_RELEASE'];?></p>
							<p class="card-text">status:<?php echo $row['STATUS'];?></p>
							<p class="card-text">new every <?php echo $row['FREQUENCY'];?></p>
							<a class="star" href="manga.php?manga=<?php echo $row['ID_MANGA'];?>">Epizody</a>
						  </div>
						</div>
					<?php
					}else{?>
						<div class="card">
						  <img class="mx-auto d-block" src="images/manga/<?php echo $row['PICTURE'];?>" alt="logo">
							<div class="card-body">
							<a class="star" href="add_favorite.php?manga=<?php echo $row['ID_MANGA'];?>">&#11088</a>
							<h4 class="card-title"><a href="manga.php?manga=<?php echo $row['ID_MANGA'];?>"> <?php echo $row['TITLE'];?></a></h4>
							<p class="card-text">Release:<?php echo $row['DATE_OF_RELEASE'];?></p>
							<p class="card-text">status:<?php echo $row['STATUS'];?></p>
							<p class="card-text">new every <?php echo $row['FREQUENCY'];?></p>
							<a class="star" href="manga.php?manga=<?php echo $row['ID_MANGA'];?>">Epizody</a>
						  </div>
						</div>
					<?php
					}
					$counter++;
				}
				?>
					</div>
				</div>
	
			<?php
			}
			else{
				echo'Database error :(<br>';
				echo mysqli_error($dbc);
			}
		}
		if($by == "author" ){
			$querry = "SELECT * FROM  AUTHOR where NAME like '%$what%' or SURNAME like '%$what%'";
			$response = mysqli_query($dbc, $querry);
			$count = mysqli_num_rows($response);

			if($count == 0){
				$output="Sorry, no match found!";
			}
			if($response){
				$counter = 0;
				?>
				<div class="container">
					<div class="row">
				<?php
				while($row = mysqli_fetch_array($response)){
					if($counter%2){?>
						<div class="card">
						    <img class="mx-auto d-block" src="images/author/<?php echo $row['PICTURE'];?>" alt="logo">
							<div class="card-body">
								<a class="star" href="manga.php?by_author=<?php echo $row['ID_AUTHOR'];?>">Mangy</a>
								<h4 class="card-title"><a href="manga.php?by_author=<?php echo $row['ID_AUTHOR'];?>"><?php echo $row['ALIAS'];?></a></h4>
								<p class="card-text">Name: <?php echo  $row['NAME']." ".$row['SURNAME'];?></p>
								<p class="card-text">Born:<?php echo  $row['DATE_OF_BIRTH'];?></p>
								<p class="card-text">First publish:<?php echo $row['DATE_OF_FIRSTP_UBLISH'];?></p>
								
							</div>
						</div>
					<?php
					}else{?>
						<div class="card">
						    <img class="mx-auto d-block" src="images/author/<?php echo $row['PICTURE'];?>" alt="logo">
							
							<div class="card-body">
								<a class="star" href="manga.php?by_author=<?php echo $row['ID_AUTHOR'];?>">Mangy</a>								
								<h4 class="card-title"><a href="manga.php?by_author=<?php echo $row['ID_AUTHOR'];?>"><?php echo $row['ALIAS'];?></a></h4>
								<p class="card-text">Name: <?php echo  $row['NAME']." ".$row['SURNAME'];?></p>
								<p class="card-text">Born:<?php echo  $row['DATE_OF_BIRTH'];?></p>
								<p class="card-text">First publish:<?php echo $row['DATE_OF_FIRSTP_UBLISH'];?></p>
								
							</div>
						</div>
					<?php
					}
					$counter++;
				}
				?>
					</div>
				</div>
	
			<?php
			}
			else{
				echo'Database error :(<br>';
				echo mysqli_error($dbc);
			}
		}
		if($by == "genre" ){
			$querry = "SELECT * FROM  GENRE where NAME like '%$what%'";
			$response = mysqli_query($dbc, $querry);
			$count = mysqli_num_rows($response);

			if($count == 0){
				$output="Sorry, no match found!";
			}
			if($response){
				$counter = 0;
				?>
				<div class="container">
					<div class="row">
				<?php
				while($row = mysqli_fetch_array($response)){
					if($counter%2){?>
						<div class="card">
						    <img class="mx-auto d-block" src="images/logo.png" alt="logo">
							<div class="card-body">
								<a class="star" href="add_favorite.php?genre=<?php echo $row['ID_GENRE'];?>">&#11088</a>
								<h4 class="card-title"><a href="manga.php?by_genre=<?php echo $row['ID_GENRE'];?>"><?php echo  $row['NAME'];?></a></h4>
							</div>
						</div>
					<?php
					}else{?>
						<div class="card">
						    <img class="mx-auto d-block" src="images/logo.png" alt="logo">
							<div class="card-body">
								<a class="star" href="add_favorite.php?genre=<?php echo $row['ID_GENRE'];?>">&#11088</a>
								<h4 class="card-title"><a href="manga.php?by_genre=<?php echo $row['ID_GENRE'];?>"><?php echo  $row['NAME'];?></a></h4>
							</div>
						</div>
					<?php
					}
					$counter++;
				}
				?>
					</div>
				</div>
	
			<?php
			}
			else{
				echo'Database error :(<br>';
				echo mysqli_error($dbc);
			}
		}
		if($by == "character" ){
			$querry = "SELECT * FROM  CHARACT where NAME like '%$what%'";
			$response = mysqli_query($dbc, $querry);
			$count = mysqli_num_rows($response);

			if($count == 0){
				$output="Sorry, no match found!";
			}
			if($response){
				$counter = 0;
				?>
				<div class="container">
					<div class="row">
				<?php
				while($row = mysqli_fetch_array($response)){
					if($counter%2){?>
						<div class="card">
						    <img class="mx-auto d-block" src="images/characters/<?php echo $row['PICTURE'];?>" alt="logo">
							<div class="card-body">
								<a class="star" href="add_favorite.php?charact=<?php echo $row['ID_CHARACT'];?>">&#11088</a>
								<h4 class="card-title"><?php echo $row['NAME'];?></h4>
								<p class="card-text">look: <?php echo $row['LOOK'];?> age:<?php echo $row['AGE'];?> appear: <?php echo $row['FIRST_APPEARANCE'];?> - <?php echo $row['LAST_APPEARANCE'];?></p>
							</div>
						</div>
					<?php
					}else{?>
						<div class="card">
						    <img class="mx-auto d-block" src="images/characters/<?php echo $row['PICTURE'];?>" alt="logo">
							<div class="card-body">
								<a class="star" href="add_favorite.php?charact=<?php echo $row['ID_CHARACT'];?>">&#11088</a>
								<h4 class="card-title"><?php echo $row['NAME'];?></h4>
								<p class="card-text">look: <?php echo $row['LOOK'];?> age:<?php echo $row['AGE'];?> appear: <?php echo $row['FIRST_APPEARANCE'];?> - <?php echo $row['LAST_APPEARANCE'];?></p>
							</div>
						</div>
					<?php
					}
					$counter++;
				}
				?>
					</div>
				</div>
	
			<?php
			}
			else{
				echo'Database error :(<br>';
				echo mysqli_error($dbc);
			}
		}
	}
?>
</div>