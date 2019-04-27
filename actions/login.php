<?php
	session_start();
	
	$e = $_POST['email'];
	$p = $_POST['password'];
	
	if ($e == "imtiaz1919@gmail.com") {
		if( $p == "arijithsingh") {
			$_SESSION['username']=$e;
			header("Location:http://localhost/project_x/index.php");
		} else {
			echo "Password is incorrect";
			header("Location:http://localhost/project_x/login.php");
		}
	} else {
		echo "Username is incorrect";
		header("Location:http://localhost/project_x/login.php");
	}
?>