<?php
	session_start();
	if(isset($_SESSION['username'])){
		require_once('connect_to_sql.php');
		$user = $_SESSION['usr_id'];
		if(isset($_GET["manga"])){
			$manga = $_GET["manga"];
			$querry = 'SELECT * FROM USER_MANGA WHERE USER_ID="'.$user.'" and MANGA_ID="'.$manga.'"';
			$response = mysqli_query($dbc, $querry);
			echo mysqli_error($dbc);
			if(mysqli_num_rows($response) == 1){
				mysqli_close($dbc);
				header('Location: '. $_SERVER['HTTP_REFERER']);
			}
				
			$querry = 'INSERT INTO USER_MANGA VALUES ("'.$user.'","'.$manga.'")';
			mysqli_query($dbc, $querry);
			if(mysqli_affected_rows ($dbc) != 1){
				mysqli_close($dbc);
				header('Location: '. $_SERVER['HTTP_REFERER']);
			}
			mysqli_close($dbc);
			header('Location: '. $_SERVER['HTTP_REFERER']);
		}

	
		if(isset($_GET["genre"])){
			$genre = $_GET["genre"];
			$querry = 'SELECT * FROM USER_GENRE WHERE USER_ID="'.$user.'" and GENRE_ID="'.$genre.'"';
			$response = mysqli_query($dbc, $querry);
			if(mysqli_num_rows($response) == 1){
				header('Location: '. $_SERVER['HTTP_REFERER']);
			}
				
			$querry = 'INSERT INTO USER_GENRE VALUES ("'.$user.'","'.$genre.'")';
			mysqli_query($dbc, $querry);
			if(mysqli_affected_rows ($dbc) != 1){
				header('Location: '. $_SERVER['HTTP_REFERER']);
			}
			mysqli_close($dbc);
			header('Location: '. $_SERVER['HTTP_REFERER']);
		}
		if(isset($_GET["charact"])){
			$charact = $_GET["charact"];
			$querry = 'SELECT * FROM USER_CHARACT WHERE USER_ID="'.$user.'" and CHARACT_ID="'.$charact.'"';
			$response = mysqli_query($dbc, $querry);
			if(mysqli_num_rows($response) == 1){
				mysqli_close($dbc);
				header('Location: '. $_SERVER['HTTP_REFERER']);
			}
				
			$querry = 'INSERT INTO USER_CHARACT VALUES ("'.$user.'","'.$charact.'")';

			mysqli_query($dbc, $querry);
			if(mysqli_affected_rows ($dbc) != 1){
				mysqli_close($dbc);
				header('Location: '. $_SERVER['HTTP_REFERER']);
			}
			mysqli_close($dbc);
			header('Location: '. $_SERVER['HTTP_REFERER']);
		}
	}
	else{
		header('Location: signup_form.php?need_login');
	}
?>