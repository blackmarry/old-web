<?php
	session_start();
	if(isset($_SESSION['username'])){
		if(isset($_GET['magazine'])){
			$_SESSION['magazines'][] = $_GET['magazine'];
			header('Location: '. $_SERVER['HTTP_REFERER']);
		}
		if(isset($_GET['volume'])){
			$_SESSION['volumes'][] = $_GET['volume'];
			header('Location: '. $_SERVER['HTTP_REFERER']);
		}
	}
	else{
		header('Location: signup_form.php?need_login');
	}
	
?>