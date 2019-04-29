<?php 
    session_start();
    if(!ISSET($_SESSION['username'])){
        header("Location:http://localhost/project_x/login.php");
    }
    if(!ISSET($_POST['author']) || !ISSET($_POST['title'])) {
        header("Location:http://localhost/project_x/books.php");
    }
    if($_POST['author'] == "" || $_POST['title'] == "") {
        header("Location:http://localhost/project_x/books.php");
    } else {
        $username = $_SESSION['username'];
        if (file_exists("../../users/".$username)) {
            $file = fopen("../../users/".$username.'/books.csv', 'a');
            $author = $_POST["author"];
            $title = $_POST["title"];
            fputcsv($file, array($author,$title));
            fclose($file);
            header("Location:http://localhost/project_x/books.php");
        }
    }
?>