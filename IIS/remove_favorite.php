<?php
	session_start();
	if(isset($_SESSION['username'])){
		require_once('connect_to_sql.php');
		$user = $_SESSION['usr_id'];
		if(isset($_GET["manga"])){
			$manga = $_GET["manga"];
			$querry = 'DELETE FROM USER_MANGA WHERE USER_ID="'.$user.'" and MANGA_ID="'.$manga.'"';
			mysqli_query($dbc, $querry);
			//$resp = mysqli_error($dbc);
			//echo $resp
			mysqli_close($dbc);
			header('Location: '. $_SERVER['HTTP_REFERER']);
		}
	
		if(isset($_GET["genre"])){
			$genre = $_GET["genre"];
			$querry = 'DELETE FROM USER_GENRE WHERE USER_ID="'.$user.'" and GENRE_ID="'.$genre.'"';
			mysqli_query($dbc, $querry);
			//$resp = mysqli_error($dbc);
			mysqli_close($dbc);
			header('Location: '. $_SERVER['HTTP_REFERER']);
		}
		
		if(isset($_GET["charact"])){
			$charact = $_GET["charact"];
			$querry = 'DELETE FROM USER_CHARACT WHERE USER_ID="'.$user.'" and CHARACT_ID="'.$charact.'"';
			mysqli_query($dbc, $querry);
			$resp = mysqli_error($dbc);
			mysqli_close($dbc);
			header('Location: '. $_SERVER['HTTP_REFERER']);
		}
	}
	else{
		header('Location: signup_form.php?need_login');
	}
?>