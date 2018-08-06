<div class="col-md-3">
	<div class="search_bar">
		<form class="right" action="search.php" method="get">
			<input type="text" name="what" >
			
			<input type="submit" name="search" value="&#x1f50d" /><br />
			<select name="by">
				<option value="manga">Manga</option>
				<option value="author">Author</option>
				<option value="genre">Genre</option>
				<option value="character">Character</option>
			</select>
		</form>
	</div>

	<div class="login_bar">
		<?php
		// init stuff
		
		if(!isset($_SESSION['bad_login'])){
			$_SESSION['bad_login'] = false;
		}
		
		// >>> login form
		if(!isset($_SESSION['username'])){
			$_SESSION['username'] = NULL;
		?>

		<form class="right" action="login.php" method="post">
			<b>Login</b>
			<p>Nickname: 	<input type="text" 	name="username" value="" /></p>
			<p>Password: 	<input type="password" 	name="password" value="" /></p>
			<p><input type="submit" name="login" value="Login" /></p>
			<p>Or <a href="signup_form.php">sign up :)</a></p>
		</form>

		<?php
		if($_SESSION['bad_login']){
				echo 'Bad login :/<br>';
			}
		}
		else{
		?>
		
		<form class="right" action="login.php" method="post">
			Loged in as <b><?php echo $_SESSION['username']; ?> </b>
			<br />
			<p><input type="submit" name="logout" value="Logout" /></p>
		</form>

		<?php 
			} 
		?>
	</div>

	<div class="right">
		<p>Notifications:</p>
		<?php 
		if(isset($_SESSION['username'])){
			$querry = "SELECT * FROM MANGA join USER_MANGA on MANGA.ID_MANGA = USER_MANGA.MANGA_ID where USER_ID =".$_SESSION['usr_id'];
			$response = mysqli_query($dbc, $querry);
			if($response){
				while($row = mysqli_fetch_array($response)){
					if($row['STATUS'] == 'open'){
						$frequency = $row['FREQUENCY']; //'day', 'week', 'month', 'year'
						?>
						<a href="manga.php?manga=<?php echo $row['ID_MANGA']; ?>"><?php echo $row['TITLE']; ?></a>
						<?php 
						if($frequency == 'day'){
							echo " New daily";
						}
						if($frequency == 'week'){
							$days = floor((strtotime(date("Y-m-d")) - strtotime($row['DATE_OF_RELEASE']))/(24 * 60 * 60))%7;
							echo " New in ".$days." days <br />";
						}
						if($frequency == 'month'){
							$days = floor((strtotime(date("Y-m-d")) - strtotime($row['DATE_OF_RELEASE']))/(24 * 60 * 60))%date('t');
							echo " New in ".$days." days <br />";
						}
						if($frequency == 'year'){
							$days = floor((strtotime(date("Y-m-d")) - strtotime($row['DATE_OF_RELEASE']))/(24 * 60 * 60))%date('z');
							echo " New in ".$days." days <br />";
						}
					}else{
						?>
						<a href="manga.php?manga=<?php echo $row['ID_MANGA']; ?>"><?php echo $row['TITLE']; ?></a>
						<?php 
						echo "Finished";?> <br /> <?php 
					}
				}
			}	
		}
		else{
		?>
			<p>Sorry, you have to be logged in to use this feature :/</p>
		<?php
		}
		?>
		
	</div>

</div>