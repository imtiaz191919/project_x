<html>
  <head>
    <title>Status</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
		<link href='https://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Dosis:400' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="../styles/styles.css">
  </head>
  <body>
    <?php 
        include("../inc/header.php");
        include("../mysqli_connect.php");

        $selected_status = $_POST["status"];
        $username = $_POST["username"];
        $message = "The account ".$username." is now ";
        if (!$dbc) {
            echo("error connecting msql");
            exit();
        } else {
            $update_statement = "";
            if ($selected_status == "open") {
                $update_statement = "UPDATE `users` SET `status` = 'OPEN' WHERE `users`.`username` = '".$username."'";
                $message = $message . "OPEN.";
            } else if ($selected_status == "locked") {
                $update_statement = "UPDATE `users` SET `status` = 'LOCKED' WHERE `users`.`username` = '".$username."'";
                $message = $message . "LOCKED.";
            } else if ($selected_status == "grant") {
                $update_statement = "UPDATE `users` SET `admin` = 'Y' WHERE `users`.`username` = '".$username."'";
                $message = $message . "GRANTED.";
            } else if ($selected_status == "revoke") {
                $update_statement = "UPDATE `users` SET `admin` = 'N' WHERE `users`.`username` = '".$username."'";
                $message = $message . "REVOKED.";
            } else {
                $search_dir = "./uploads/".$_SESSION["username"];
                if(is_dir($search_dir)) {
                  $contents = scandir($search_dir);
                  foreach ($contents as $item) {
                      if((is_file($search_dir . '/' . $item)))  {
                              $file_size = filesize($search_dir . '/' . $item);
                              $file_name = $item;
                              $date_modified = date(filemtime($search_dir . '/' . $item));
                              $formatted_date = date('d/m/Y h:i:s', $date_modified);         
                              echo "<tr>
                              <td>".$file_name."</td>
                              <td>".$formatted_date."</td>
                              </tr>";
                      }
                  }
                }

                if (file_exists("../uploads/".$username)) {
                    if (rmdir("../uploads/".$username)) {
                    } else {
                    }
                } else {
                }
                $update_statement = "DELETE FROM `users` WHERE `users`.`username` = '".$username."'";
                $message = $message . "DELETED.";
            }
            $update_result = mysqli_query($dbc, $update_statement);
            if (!$update_result) {
                echo "Internal server error";
                printf("Error: %s\n", mysqli_error($dbc));
                exit();
            }
        }
    ?>
    <section id="mainContainer">
      <section id="contentContainer">
        <div style="background-color: lightgreen">
            <?php echo("<p>".$message."</p>") ?>
        </div>
      </section>
    </section>
    <?php include("../inc/footer.html")?>
  </body>
</html>
