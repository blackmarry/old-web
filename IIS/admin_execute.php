<?php
	session_start();
	require_once('connect_to_sql.php');
	$usr = $_SESSION['username'];
	$querry = 'select * from T_USER where NICKNAME ="'.$usr.'"';
	$response = mysqli_query($dbc, $querry);
	echo mysqli_error($dbc);
	$row = mysqli_fetch_array($response);	
	if($row['SPRAVCE']!= "Y" ){
		echo "<p>You have to be administrator in order to use this feature!</p>";
	}else{
		
		if(isset($_GET["deactivate"])){
			$querry = 'UPDATE T_USER SET ACTIVATED="N" where ID_USER='.$_GET["deactivate"].'';
			$response = mysqli_query($dbc, $querry);
			$resp = mysqli_error($dbc);
			if($resp){
				echo $resp;
				mysqli_close($dbc);
			}else{
				mysqli_close($dbc);
				header('Location: ucet.php?admin=users');
			}
		}
		if(isset($_GET["activate"])){
			$querry = 'UPDATE T_USER SET ACTIVATED="Y" where ID_USER="'.$_GET["activate"].'"';
			$response = mysqli_query($dbc, $querry);
			$resp = mysqli_error($dbc);
			if($resp){
				echo $resp;
				mysqli_close($dbc);
			}else{
				mysqli_close($dbc);
				header('Location: ucet.php?admin=users');
			}
		}
		if(isset($_GET["make_su"])){
			$querry = 'UPDATE T_USER SET SPRAVCE="Y" where ID_USER="'.$_GET["make_su"].'"';
			$response = mysqli_query($dbc, $querry);
			$resp = mysqli_error($dbc);
			if($resp){
				echo $resp;
				mysqli_close($dbc);
			}else{
				mysqli_close($dbc);
				header('Location: ucet.php?admin=users');
			}
		}
		if(isset($_GET["disable_su"])){
			$querry = 'UPDATE T_USER SET SPRAVCE="N" where ID_USER="'.$_GET["disable_su"].'"';
			$response = mysqli_query($dbc, $querry);
			$resp = mysqli_error($dbc);
			if($resp){
				echo $resp;
				mysqli_close($dbc);
			}else{
				mysqli_close($dbc);
				header('Location: ucet.php?admin=users');
			}
		}
		if(isset($_GET["delete"])){
			$querry = 'DELETE FROM T_USER where ID_USER="'.$_GET["delete"].'"';
			$response = mysqli_query($dbc, $querry);
			$resp = mysqli_error($dbc);
			if($resp){
				mysqli_close($dbc);
			}else{
				mysqli_close($dbc);
				header('Location: ucet.php?admin=users');
			}
		}
		if(isset($_POST["manga"])){
			if($_POST["title"] == ""){
				header('Location: ucet.php?admin=manga&bad_title');
			}
			$title = $_POST["title"];
			if($_POST["picture"] == ""){
				header('Location: ucet.php?admin=manga&bad_picture');
			}
			
			$querry = 'SELECT * FROM MANGA WHERE TITLE="'.$title.'"';
			$response = mysqli_query($dbc, $querry);
			echo mysqli_error($dbc);
			if(mysqli_num_rows($response) == 1){
				mysqli_close($dbc);
				header('Location: ucet.php?admin=manga&dupe_title');
			}
			
			$picture = $_POST['picture'];
			$status = $_POST['status'];
			$frequency = $_POST['frequency'];
			$date = $_POST['date'];
			
			$querry = 'INSERT INTO MANGA VALUES (NULL, "'.$title.'", STR_TO_DATE("'.$date.'", "%Y-%m-%d"), "'.$status.'","'.$frequency.'", "'.$picture.'")';
			
			mysqli_query($dbc, $querry);
			if(mysqli_affected_rows ($dbc) != 1){
				mysqli_close($dbc);
				header('Location: ucet.php?admin=manga&BAD');
			}
			mysqli_close($dbc);
			header('Location: ucet.php?admin=manga&ok');
		}
		
		if(isset($_POST["chapter"])){
			if($_POST["title"] == ""){
				header('Location: ucet.php?admin=chapter&bad_title');
			}
			$title = $_POST["title"];
			if($_POST["serial"] == ""){
				header('Location: ucet.php?admin=chapter&bad_serial');
			}
			
			$querry = 'SELECT * FROM CHAPTER WHERE TITLE="'.$title.'"';
			$response = mysqli_query($dbc, $querry);
			echo mysqli_error($dbc);
			if(mysqli_num_rows($response) == 1){
				mysqli_close($dbc);
				header('Location: ucet.php?admin=chapter&dupe_title');
			}
			$serial = $_POST["serial"];
			$manga = $_POST["Manga"];
			
			
			$querry = 'INSERT INTO CHAPTER VALUES (NULL, "'.$title.'", "'.$serial.'","cover", "'.$manga.'")';
			mysqli_query($dbc, $querry);
			echo mysqli_error($dbc);
			
			if(mysqli_affected_rows ($dbc) != 1){
				mysqli_close($dbc);
				header('Location: ucet.php?admin=chapter&BAD');
			}
			mysqli_close($dbc);
			header('Location: ucet.php?admin=chapter&ok');
		}
		
		
		if(isset($_POST["volume"])){
			if($_POST["title"] == ""){
				header('Location: ucet.php?admin=volume&bad_title');
			}
			$title = $_POST["title"];
						
			$chapter = $_POST["Chapter"];
			
			$querry = 'INSERT INTO VOLUME VALUES (NULL, "'.$title.'")';

			mysqli_query($dbc, $querry);
			echo mysqli_error($dbc);
			if(mysqli_affected_rows ($dbc) != 1){
				mysqli_close($dbc);
				header('Location: ucet.php?admin=volume&dupe_title');
			}
			
			$querry = 'SELECT * FROM VOLUME WHERE NAME="'.$title.'"';
			$response = mysqli_query($dbc, $querry);
			echo mysqli_error($dbc);
			$row = mysqli_fetch_array($response);
			$volume_id = $row['ID_VOLUME'];
			$querry = 'INSERT INTO VOLUME_CHAPTER VALUES ("'.$volume_id.'", "'.$chapter.'")';
			mysqli_query($dbc, $querry);
			echo mysqli_error($dbc);
			if(mysqli_affected_rows ($dbc) != 1){
				header('Location: ucet.php?admin=volume&bad_title');
			}
			
			mysqli_close($dbc);
			header('Location: ucet.php?admin=volume&ok');
		}
		
		if(isset($_POST["magazine"])){
			if($_POST["title"] == ""){
				header('Location: ucet.php?admin=magazine&bad_title');
			}
			$title = $_POST["title"];
			$querry = 'SELECT * FROM MAGAZINE WHERE TITLE="'.$title.'"';
			$response = mysqli_query($dbc, $querry);
			echo mysqli_error($dbc);
			if(mysqli_num_rows($response) == 1){
				mysqli_close($dbc);
				header('Location: ucet.php?admin=magazine&dupe_title');
			}
			
			$chapter = $_POST["Chapter"];
			
			$querry = 'INSERT INTO MAGAZINE VALUES (NULL, "'.$title.'")';

			mysqli_query($dbc, $querry);
			echo mysqli_error($dbc);
			if(mysqli_affected_rows ($dbc) != 1){
				mysqli_close($dbc);
				header('Location: ucet.php?admin=magazine&BAD');
			}
			
			$querry = 'SELECT * FROM MAGAZINE WHERE TITLE="'.$title.'"';
			$response = mysqli_query($dbc, $querry);
			$row = mysqli_fetch_array($response);
			$magazine_id = $row['ID_VOLUME'];
			
			$querry = 'INSERT INTO MAGAZINE_CHAPTER VALUES ("'.$magazine_id.'", "'.$chapter.'")';
			
			mysqli_query($dbc, $querry);
			echo mysqli_error($dbc);
			if(mysqli_num_rows($response) != 1){
				header('Location: ucet.php?admin=magazine&BAD');
			}
			if(mysqli_affected_rows ($dbc) != 1){
				mysqli_close($dbc);
				header('Location: ucet.php?admin=magazine&BAD');
			}
			mysqli_close($dbc);
			header('Location: ucet.php?admin=magazine&ok');
		}


	}	
?>


