<div class="col-md-7">

<?php
	require_once('connect_to_sql.php');
	// >>>>>>>>>>>>>>>>>> AUTHORS <<<<<<<<<<<<<<<<<<<<<<<<<<<<//
	if(isset($_GET["authors"])){
		$querry = "SELECT * FROM AUTHOR;";
		$response = mysqli_query($dbc, $querry);
		
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
	
	// >>>>>>>>>>>>>>>>>> CHARACTERS <<<<<<<<<<<<<<<<<<<<<<<<<<<<//
	elseif(isset($_GET["characters"])){
		$querry = "SELECT * FROM CHARACT;";
		$response = mysqli_query($dbc, $querry);
		
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
	
	// >>>>>>>>>>>>>>>>>> GENRES <<<<<<<<<<<<<<<<<<<<<<<<<<<<//
	elseif (isset($_GET["genres"])){
		$querry = "SELECT * FROM GENRE;";
		$response = mysqli_query($dbc, $querry);
		
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
	// >>>>>>>>>>>>>>>>>> MANGA <<<<<<<<<<<<<<<<<<<<<<<<<<<<//
	elseif (isset($_GET["char_by_manga"])){
		$querry = 'SELECT * FROM CHARACT join MANGA_CHARACT on CHARACT_ID = ID_CHARACT where MANGA_ID = '.$_GET['char_by_manga'].';';
		$response = mysqli_query($dbc, $querry);
		
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
	
	
	elseif (isset($_GET["manga"])){
		$querry = "SELECT * FROM MANGA where ID_MANGA =".$_GET["manga"];
		$response = mysqli_query($dbc, $querry);
		$picture = NULL;
		if($response){
			if($row = mysqli_fetch_array($response)){
				//upravit
				$picture = $row['PICTURE'];
				echo  '<a class="star" href="add_favorite.php?manga='.$row['ID_MANGA'].'">&#11088</a>
				<h5><b>'.$row['TITLE'].'</b></h5> release: '. $row['DATE_OF_RELEASE'].' <br />status: '. $row['STATUS'].' <br />new every '.$row['FREQUENCY'].'
				<a class="star" href="manga.php?char_by_manga='.$row['ID_MANGA'].'">Characters</a>';
			}
		}
		
		$querry = "SELECT * FROM VOLUME join VOLUME_CHAPTER on VOLUME_ID = ID_VOLUME 
		join CHAPTER on ID_CHAPTER = CHAPTER_ID	where MANGA_ID =".$_GET["manga"];
	
		$response = mysqli_query($dbc, $querry);
		
		$count = mysqli_num_rows($response);

		if($count == 0){
			$output="No volumes.";
		}
		//echo '<br /><b>NAME  PICTURE</b>';
			
		if($response){
			$counter = 0;
			?>
			<h6><b>Volumes: </b></h6>
			<div class="container">
				<div class="row">

			<?php
			while($row = mysqli_fetch_array($response)){

				if($counter%2){ $left_card = 
					
					'<div class="card">
					  <div class="card-body">
						<img class="mx-auto d-block" src="images/manga/'.$picture.'" alt="logo">
					  	<a class="star" href="to_cart.php?volume='.$row['VOLUME_ID'].'">Add to cart</a>
					    <h4 class="card-title">'. $row['NAME'].'</h4>
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
						<img class="mx-auto d-block" src="images/manga/'.$picture.'" alt="logo">
					  	<a class="star" href="to_cart.php?volume='.$row['VOLUME_ID'].'">Add to cart</a>
					    <h4 class="card-title">'. $row['NAME'].'</h4>
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
		$querry = "SELECT * FROM MAGAZINE join MAGAZINE_CHAPTER on MAGAZINE_ID = ID_MAGAZINE 
		join CHAPTER on ID_CHAPTER = CHAPTER_ID	where MANGA_ID =".$_GET["manga"];
	
		$response = mysqli_query($dbc, $querry);
		
		$count = mysqli_num_rows($response);

		if($count == 0){
			$output="No magazines.";
		}
		if($response){
			$counter = 0;
			?>
			<h6><b>Magazine: </b></h6>
			<div class="container">
				<div class="row">

			<?php
			while($row = mysqli_fetch_array($response)){

				if($counter%2){ $left_card = 
					
					'<div class="card">
					  <div class="card-body">
						<img class="mx-auto d-block" src="images/manga/'.$picture.'" alt="logo">
					  	<a class="star" href="to_cart.php?magazine='.$row['MAGAZINE_ID'].'">Add to cart</a>
					    <h4 class="card-title">'. $row['TITLE'].'</h4>
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
						<img class="mx-auto d-block" src="images/manga/'.$picture.'" alt="logo">
					  	<a class="star" href="to_cart.php?magazine='.$row['MAGAZINE_ID'].'">Add to cart</a>
					    <h4 class="card-title">'. $row['TITLE'].'</h4>
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
	elseif (isset($_GET["search"])){
		echo "zadna manga nezvolena";
	}elseif(isset($_GET["by_author"])){
		$author = $_GET["by_author"];
		$querry = "SELECT * FROM MANGA join AUTHOR_MANGA on MANGA.ID_MANGA = AUTHOR_MANGA.MANGA_ID where AUTHOR_ID =".$_GET["by_author"];
		$response = mysqli_query($dbc, $querry);
		
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
							<a class="star" href="manga.php?manga=<?php echo $row['ID_MANGA'];?>">Epizody</a>
							<p class="card-text">new every <?php echo $row['FREQUENCY'];?></p>
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
							<a class="star" href="manga.php?manga=<?php echo $row['ID_MANGA'];?>">Epizody</a>
							<p class="card-text">new every <?php echo $row['FREQUENCY'];?></p>
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
	elseif (isset($_GET["by_genre"])){
		$genre = $_GET["by_genre"];
		$querry = "SELECT * FROM MANGA join MANGA_GENRE on MANGA.ID_MANGA = MANGA_GENRE.MANGA_ID where GENRE_ID =".$genre;
		$response = mysqli_query($dbc, $querry);
		
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
							<a class="star" href="manga.php?manga=<?php echo $row['ID_MANGA'];?>">Epizody</a>
							<p class="card-text">new every <?php echo $row['FREQUENCY'];?></p>
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
							<a class="star" href="manga.php?manga=<?php echo $row['ID_MANGA'];?>">Epizody</a>
							<p class="card-text">new every <?php echo $row['FREQUENCY'];?></p>
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
	// >>>>>>>>>>>>>>>>>> DEFAULT <<<<<<<<<<<<<<<<<<<<<<<<<<<<//
	else{
		$querry = "SELECT * FROM MANGA";
			$response = mysqli_query($dbc, $querry);
			$count = mysqli_num_rows($response);
			
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
							<a class="star" href="manga.php?manga=<?php echo $row['ID_MANGA'];?>">Epizody</a>
							<p class="card-text">new every <?php echo $row['FREQUENCY'];?></p>
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
							<a class="star" href="manga.php?manga=<?php echo $row['ID_MANGA'];?>">Epizody</a>
							<p class="card-text">new every <?php echo $row['FREQUENCY'];?></p>
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
	
?>
</div>