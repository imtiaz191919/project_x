<?php
	session_start();
	
	if (isset($_POST["email"]) && isset($_POST["password"])) {
		$email = $_POST['email'];
		$password = $_POST['password'];
		$encrypted_password = sha1($password);
		include("../mysqli_connect.php");
		if (!$dbc) {
			echo("error connecting msql");
			exit();
		} else {
			$sql_statement = "SELECT username,password FROM users WHERE username = '" . $email ."'" . "AND password = '" . $encrypted_password ."'";
			$result = mysqli_query($dbc, $sql_statement);
			if (!$result) {
				echo "Invalid Credentials";
			} else {
				$count = 0;
				while ($row = mysqli_fetch_array($result)) {
					$_SESSION['username']=$email;
					header("Location:http://localhost/project_x/index.php");
					$count++;
				}
				if($count == 0) {
					echo "Invalid Credentials";
				}
			}
		}
		$dbc -> close();
	} else {
		header("Location:http://localhost/project_x/login.php");
	}
	
    
?>