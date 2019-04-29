<?php
	session_start();
	
	if (isset($_POST["username"]) && isset($_POST["password"])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$encrypted_password = sha1($password);
		include("../../mysqli_connect.php");
		if (!$dbc) {
			echo("error connecting msql");
			exit();
		} else {
			$sql_statement = "SELECT username,password,status,admin FROM users WHERE username = '" . $username ."'" . "AND password = '" . $encrypted_password ."'";
			$result = mysqli_query($dbc, $sql_statement);
			if (!$result) {
				header("Location:http://localhost/project_x/login.php?message=unable_to_connect_to_db&type=error");
			} else {
				$count = 0;
				while ($row = mysqli_fetch_array($result)) {
					$_SESSION['username']=$username;
					if ($row["status"] == "OPEN") {
						header("Location:http://localhost/project_x/index.php");
					} else if ($row["status"] == "LOCKED") {
						header("Location:http://localhost/project_x/login.php?message=account_locked&type=error");
					}
					
					if ($row["admin"] == 'Y') {
						$_SESSION['is_admin']=true;
					}
					$count++;
				}
				if($count == 0) {
					header("Location:http://localhost/project_x/login.php?message=invalid_credentials&type=error");
				}
			}
		}
		$dbc -> close();
	} else {
		header("Location:http://localhost/project_x/login.php");
	}
	
    
?>