<?php
    session_start();
    
    if (isset($_POST["email"]) && isset($_POST["password"])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_2 = $_POST['password_2'];
        $encrypted_password = sha1($password);
        include("../mysqli_connect.php");
        if (!$dbc) {
            echo("error connecting msql");
            exit();
        } else {
            $sql_statement = "SELECT username,password FROM users WHERE username = '" . $email ."'";
            $result = mysqli_query($dbc, $sql_statement);
            if (!$result) {
                echo "Internal server error";
            } else {
                $count = 0;
                while ($row = mysqli_fetch_array($result)) {
                    $count++;
                }
                if($count != 0) {
                    echo "Email Already Exists";
                } else {
                    $insert_statement = "INSERT INTO `users` (`username`, `password`, `user_dir`, `status`, `admin`) VALUES ('".$email."', '".$encrypted_password."', '".$email."', 'OPEN', 'N')";
                    echo $insert_statement;
                    
                    $insert_result = mysqli_query($dbc, $insert_statement);
                    if (!$insert_result) {
                        echo "Internal server error";
                        printf("Error: %s\n", mysqli_error($dbc));
                    } else {
                        echo "User created sucessfuly";
                        $_SESSION['username']=$email;
                        header("Location:http://localhost/project_x/index.php");
                    }
                }
            }
        }
    $dbc -> close();}
?>