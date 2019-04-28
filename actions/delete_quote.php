<?php 
    session_start();
    if(!ISSET($_SESSION['username'])){
        echo "NOT SET";
        // header("Location:http://localhost/project_x/login.php");
    } else {
        include("../mysqli_connect.php");
        if (!$dbc) {
            echo("<h3>error connecting to database</h3>");
            exit();
        } else {
            // $sql_statement = "SELECT id,text,author,favorite,date_entered FROM `quotes` WHERE `quotes`.`id`='".$_GET["id"]."'ORDER BY `quotes`.`date_entered` DESC";
            $sql_statement = "DELETE FROM `quotes` WHERE `quotes`.`id` = ".$_GET["id"];
            $result = mysqli_query($dbc, $sql_statement);
            if (!$result) {
                echo "Internal server error";
                printf("Error: %s\n", mysqli_error($dbc));
            } else {
                echo "Deleted created sucessfuly";
                header("Location:http://localhost/project_x/quotes.php");
            }
        }
        $dbc -> close();
    }
?>