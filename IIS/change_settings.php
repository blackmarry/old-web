<?php
	session_start();
	if(isset($_POST['change'])){
		require_once('connect_to_sql.php');
		$nick = $_SESSION['username'];
		$querry = 'SELECT * FROM T_USER WHERE NICKNAME="'.$nick.'" and PASSWORD="'.$_POST['password'].'"';
		//echo $querry;
		$response = mysqli_query($dbc, $querry);
		//echo mysqli_error($dbc);
		if(mysqli_num_rows($response) == 0){
			mysqli_close($dbc);
			header('Location: ucet.php?nastaveni&bad_pass');
		}
		else{
		$row = mysqli_fetch_array($response);
		
		if(isset($_POST['newpass'])){
			$newpass = $_POST['newpass'];
		}
		else{
			$newpass = $row['PASSWORD'];
		}
		
		if(isset($_POST['name'])){
			$name = $_POST['name'];
		}
		else{
			$name =  $row['NAME'];
		}
		
		if(isset($_POST['surname'])){
			$surname = $_POST['surname'];
		}
		else{
			$surname = $row['SURNAME'];
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
		//echo $date;
		$querry = 'UPDATE T_USER SET NAME="'.$name.'", SURNAME="'.$surname.'", PASSWORD="'.$newpass.'", DATE_OF_BIRTH=STR_TO_DATE("'.$date.'", "%Y-%m-%d"), NOTIFICATION_D="'.$notifikace.'", SHIPPING_ENABED="'.$zasilani.'" where NICKNAME="'.$nick.'"';
		mysqli_query($dbc, $querry);
		$resp = mysqli_error($dbc);
		if($resp){
			//echo $resp;
			mysqli_close($dbc);
			
		}
		else{
			mysqli_close($dbc);
			header('Location: ucet.php?nastaveni&ok');
		}
		}
	}
?>