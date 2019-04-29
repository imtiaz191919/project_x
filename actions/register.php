<?php
    session_start();
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password_2 = $_POST['password_2'];
        $encrypted_password = sha1($password);
        include("../../mysqli_connect.php");
        if (!$dbc) {
            echo("error connecting msql");
            exit();
        } else {
            $sql_statement = "SELECT username,password FROM users WHERE username = '" . $username ."'";
            $result = mysqli_query($dbc, $sql_statement);
            if (!$result) {
                header("Location:http://localhost/project_x/register.php?message=unable_to_connect_to_db&type=error");
            } else {
                $count = 0;
                while ($row = mysqli_fetch_array($result)) {
                    $count++;
                }
                if($count != 0) {
                    header("Location:http://localhost/project_x/register.php?message=username_already_exists&type=error");
                    exit();
                } else {
                    $insert_statement = "INSERT INTO `users` (`username`, `password`, `user_dir`, `status`, `admin`) VALUES ('".$username."', '".$encrypted_password."', '".$username."', 'OPEN', 'N')";
                    $insert_result = mysqli_query($dbc, $insert_statement);
                    if (!$insert_result) {
                        header("Location:http://localhost/project_x/register.php?message=unable_to_connect_to_db&type=error");
                    } else {
                        if (file_exists("../../users/".$username)) {
                        } else {
                            mkdir("../../users/".$username,0777);
                        }
                        if (file_exists("../../users/".$username)) {
                            $file = fopen("../../users/".$username.'/books.csv', 'w');
                            fclose($file);
                        }
                        $_SESSION['username']=$username;
                        header("Location:http://localhost/project_x/index.php");
                    }
                }
            }
        }
    $dbc -> close();}
    header("Location:http://localhost/project_x/register.php");
?>