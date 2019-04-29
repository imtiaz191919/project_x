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
                echo "Internal server error";
            } else {
                $count = 0;
                while ($row = mysqli_fetch_array($result)) {
                    $count++;
                }
                if($count != 0) {
                    echo "username Already Exists";
                } else {
                    $insert_statement = "INSERT INTO `users` (`username`, `password`, `user_dir`, `status`, `admin`) VALUES ('".$username."', '".$encrypted_password."', '".$username."', 'OPEN', 'N')";
                    echo $insert_statement;
                    
                    $insert_result = mysqli_query($dbc, $insert_statement);
                    if (!$insert_result) {
                        echo "Internal server error";
                        printf("Error: %s\n", mysqli_error($dbc));
                    } else {
                        echo "User created sucessfuly";
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
?>