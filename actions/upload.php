<?php 
session_start();
if(!ISSET($_SESSION['username'])){
    header("Location:http://localhost/project_x/login.php");
}
$allowed =  array('txt','pdf','doc','docx');
$filename = $_FILES['uploaded_file']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
if(!in_array($ext,$allowed) ) {
    echo 'File Format is not allowed';
    header("Location:http://localhost/project_x/uploads.php");
} else {
    if (move_uploaded_file ($_FILES['uploaded_file']['tmp_name'],"../uploads/{$_SESSION['username']}_{$_FILES['uploaded_file']['name']}")) {
        echo "uploaded";
    } else {
        echo $_FILES['uploaded_file']['error'];
        echo "UNABLE TO UPLOAD FILE ";
    }
}
?>