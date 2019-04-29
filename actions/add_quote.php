<?php
    session_start();
    
    if (isset($_POST["author"]) && isset($_POST["quote_text"])) {
        $author = $_POST['author'];
        $quote=addslashes($_POST["quote_text"]);
        $favorite = isset($_POST["favorite"]) ? 'Y' : 'N';
        $date = date("Y-m-d h:i:s");
        include("../../mysqli_connect.php");

        if (!$dbc) {
            echo("error connecting msql");
            exit();
        } else {
            $insert_statement = "INSERT INTO `quotes` (`id`, `text`, `author`, `favorite`, `date_entered`) VALUES (NULL, '".$quote."', '".$author."', '".$favorite."', '".$date."')";
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