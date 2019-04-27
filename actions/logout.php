<?php
	session_start();
	if(ISSET($_SESSION['username'])){
		session_destroy();
		header("Location:http://localhost/project_x/index.php");
	}
?>