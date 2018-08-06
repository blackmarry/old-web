<?php
	session_start();
	if(isset($_POST['login'])){
		$data_missing = array();
		if(empty($_POST['username'])){$data_missing[] = "username";}
		if(empty($_POST['password'])){$data_missing[] = "password";}
		if(!empty($data_missing)){
			$_SESSION['bad_login'] = true;
			header('Location: '. $_SERVER['HTTP_REFERER']);
		}else{
			require_once('connect_to_sql.php');
			$usr = $_POST['username'];
			$pass = $_POST['password'];
			$querry = 'select * from T_USER where NICKNAME ="'.$usr.'" and PASSWORD ="'.$pass.'"';
			$response = mysqli_query($dbc, $querry);
			echo mysqli_error($dbc);
			if(mysqli_num_rows($response) == 1){
				$row = mysqli_fetch_array($response);
				if($row['ACTIVATED'] = "N"){
					$_SESSION['bad_login'] = true;
					header('Location: '. $_SERVER['HTTP_REFERER']);
				}
				$_SESSION['usr_id'] = $row['ID_USER'];
				$_SESSION['username'] = $usr;
				$_SESSION['bad_login'] = false;
				$_SESSION['magazines'] = array();
				$_SESSION['volumes'] = array();
				
				header('Location: '. $_SERVER['HTTP_REFERER']);
			}else{
				$_SESSION['bad_login'] = true;
				header('Location: '. $_SERVER['HTTP_REFERER']);
			}
			$dbc->close();
			
		}
		
	}
	
	if(isset($_POST['logout'])){
		$_SESSION['username'] = NULL;
		header('Location: '. $_SERVER['HTTP_REFERER']);
	}
	
	
?>