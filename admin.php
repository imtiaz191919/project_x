<html>
  <head>
    <title>Send an email</title>
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
		<link rel="stylesheet" type="text/css" href="styles/styles.css">
  </head>
  <body>
    <?php 
        include("inc/header.php");
        if (!(ISSET($_SESSION["username"]) && ISSET($_SESSION["is_admin"]))) {
            header("Location:http://localhost/project_x/login.php?message=need_to_login&type=error");
        }
        include("../mysqli_connect.php");
    ?>
    <?php 
        if (ISSET($_POST["selected_user"]) && $_POST["selected_user"] != "None") {
            if (!$dbc) {
                echo("error connecting msql");
                exit();
            } else {
                $sql_statement = "SELECT username,password,status,admin FROM users WHERE username = '".$_POST["selected_user"]."'";
                $result = mysqli_query($dbc, $sql_statement);
                if (!$result) {
                    echo "Internal server error";
                    exit();
                }
                $status = "OPEN";
                $is_admin = false;
                while ($row = mysqli_fetch_array($result)) {
                    $status = $row["status"];
                    $is_admin = $row["admin"] == 'Y';
                }
            }
            $dbc -> close();
    ?>
    <section id="mainContainer">
        <section id="contentContainer">
            <h1 class="mb-4">Administrator Functions</h1>
            <form action="" method="POST">
                <div class="dropdown mt-4 mr-4" style="display:inline">
                    <label for="username" class="mr-4">Username</label>
                    <label class="mr-4"><?php echo $_POST["selected_user"] ?></label>
                </div>
            <!-- <button type="submit" class="btn btn-primary">Change!</button> -->
            </form>
            <section id="accountOptionsContainer">
                <h2 class="mt-4 mb-4">Account Options</h2>
                <form action="actions/status.php" method="POST">
                    <?php 
                        if ($status == "OPEN") {
                            echo ('<input type="radio" name="status" value="open" checked> Open<br>');
                            echo ('<input type="radio" name="status" value="locked"> Locked<br>');
                        } else {
                            echo ('<input type="radio" name="status" value="open"> Open<br>');
                            echo ('<input type="radio" name="status" value="locked" checked> Locked<br>');
                        }
                        if (!$is_admin) {
                            echo ('<input type="radio" name="status" value="grant"> Grant Admin Role <br>');
                        } else {
                            echo ('<input type="radio" name="status" value="revoke"> Revoke Admin Role <br>');
                        }
                        echo ('<input type = "hidden" name="username" value ="'.$_POST["selected_user"].'"/>')
                    ?>
                    <input type="radio" name="status" value="delete"> Delete this account <br>
                    <button type="submit" class="btn btn-primary mt-4">Submit Changes!</button>
                </form>
            </section>
        </section>
    </section>
    <?php 
        } else {
            if (!$dbc) {
                echo("error connecting msql");
                exit();
            } else {
                $sql_statement = "SELECT username,password,status,admin FROM users";
                $result = mysqli_query($dbc, $sql_statement);
                if (!$result) {
                    echo "Internal server error";
                    exit();
                }
            }
            $dbc -> close();
        ?>
        <section id="mainContainer">
            <section id="contentContainer">
                <h1 class="mb-4">Administrator Functions</h1>
                <form action="" method="POST">
                    <div class="dropdown mt-4 mr-4" style="display:inline">
                        <label for="username" class="mr-4">Username</label>
                        <select name="selected_user">
                            <option>None</option>
                            <?php
                                while ($row = mysqli_fetch_array($result)) {
                                    echo("<option>".$row["username"]."</option>");
                                }
                            ?>
                        </select>
                    </div>
                <button type="submit" class="btn btn-primary">Submit!</button>
                </form>
            </section>
        </section>
    <?php 
        }
        include("inc/footer.html");
    ?>
  </body>
</html>
