<?php
	if(isset($_POST['signup'])){
		require_once('connect_to_sql.php');
		if(isset($_POST['username']) and $_POST['username'] != ""){
			$nick = $_POST['username'];
			$querry = 'SELECT NICKNAME FROM T_USER WHERE NICKNAME="'.$nick.'"';
			$response = mysqli_query($dbc, $querry);
			echo mysqli_error($dbc);
			if(mysqli_num_rows($response) == 1){
				mysqli_close($dbc);
				header('Location: signup_form.php?dupe_nick='.$nick);
			}
		}
		else{
			mysqli_close($dbc);
			header('Location: signup_form.php?no_nick');
		}
		
		if(isset($_POST['password']) and $_POST['password'] != ""){
			$password = $_POST['password'];
		}
		else{
			mysqli_close($dbc);
			header('Location: signup_form.php?pass_missing');
		}
		
		if(isset($_POST['passwordcheck']) and $_POST['passwordcheck'] != ""){
			if($password != $_POST['passwordcheck']){
				mysqli_close($dbc);
				header('Location: signup_form.php?pass_missmatch');
			}
		}
		else{
			mysqli_close($dbc);
			header('Location: signup_form.php?pass_missmatch');
		}
		
		if(isset($_POST['name'])){
			$name = $_POST['name'];
		}
		else{
			$name = "NULL";
		}
		
		if(isset($_POST['surname'])){
			$surname = $_POST['surname'];
		}
		else{
			$surname = "NULL";
		}
		
		$date = $_POST['bday'];
		$notifikace = "N";
		$zasilani = "N";
		
		if(isset($_POST['Notifikace']) && $_POST['Notifikace'] == 'on') {
			$notifikace = "Y";
		}
		if(isset($_POST['Zasilani']) && $_POST['Zasilani'] == 'on') {
			$zasilani = "Y";
		}
		//echo $date
		$querry = 'INSERT INTO T_USER VALUES (NULL, "'.$name.'","'.$surname.'", "'.$password.'",  STR_TO_DATE("'.$date.'", "%Y-%m-%d"), "'.$nick.'", "N", "Y", "'.$notifikace.'", "'.$zasilani.'")';
		mysqli_query($dbc, $querry);
		if(mysqli_affected_rows ($dbc) != 1){
			$redirect = 'Location: signup_form.php?database_error='.mysqli_error($dbc);
			mysqli_close($dbc);
			header($redirect);
		}
		mysqli_close($dbc);
		header('Location: signup_form.php?ok');
	}
?>