<?php
    session_start();
    
    if (isset($_POST["author"]) && isset($_POST["quote_text"])) {
        $author = $_POST['author'];
        $quote=addslashes($_POST["quote_text"]);
        $favorite = isset($_POST["favorite"]) ? 'Y' : 'N';
        $id=$_SESSION["editing_quote_id"];
        $date = date("Y-m-d h:i:s");
        include("../../mysqli_connect.php");

        if (!$dbc) {
            echo("error connecting msql");
            exit();
        } else {
            $insert_statement = "UPDATE `quotes` SET `author` = '".$author."', `favorite` = '".$favorite."', `date_entered` = '".$date."' WHERE `quotes`.`id` = $id";
            $insert_result = mysqli_query($dbc, $insert_statement);
            if (!$insert_result) {
                echo "Internal server error";
                printf("Error: %s\n", mysqli_error($dbc));
            } else {
                echo "Quote created sucessfuly";
                header("Location:http://localhost/project_x/quotes.php");
            }
        }
    $dbc -> close();}
?>