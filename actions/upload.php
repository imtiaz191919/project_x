<?php 
session_start();
if(!ISSET($_SESSION['username'])){
    header("Location:http://localhost/project_x/login.php");
}
$allowed =  array('txt','pdf','doc','docx');
$filename = $_FILES['uploaded_file']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
if(!in_array($ext,$allowed) ) {
    header("Location:http://localhost/project_x/uploads.php?message=invalid_format&type=error");
} else {
    
    if (file_exists("../../users/".$_SESSION['username'])) {
        
    } else {
        mkdir("../../users/".$_SESSION['username'],0777);
    }
    if (move_uploaded_file ($_FILES['uploaded_file']['tmp_name'],"../../users/{$_SESSION['username']}/{$_FILES['uploaded_file']['name']}")) {
        echo "uploaded";
        header("Location:http://localhost/project_x/stories.php");
    } else {
        echo $_FILES['uploaded_file']['error'];
        header("Location:http://localhost/project_x/uploads.php?message=unable_to_upload_file&type=error");
    }
}
?>