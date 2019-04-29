<html>
  <head>
    <title>Login</title>
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
  <body onload="startTime()">
    <?php 
      include("inc/header.php");
      if (ISSET($_SESSION["username"])) {
        header("Location:http://localhost/project_x/index.php");
      }
    ?>
    <section id="mainContainer">
      <section id="contentContainer">
        <?php
          if (ISSET($_GET["message"])) {
            if (ISSET($_GET["type"])) {
              $message = "";
              if ($_GET["message"] == "unable_to_connect_to_db") {
                $message = "Unable to connect to database.";
              } else if ($_GET["message"] == "account_locked") {
                $message = "Your account has been locked by the admin.";
              } else if ($_GET["message"] == "invalid_credentials") {
                $message = "Invalid username or password.";
              } else if ($_GET["message"] == "need_to_login") {
                $message = "Need to login first.";
              }
              if( $_GET["type"] == "error") {
                print('<div style="background-color: salmon"><p class="ml-4">'.$message.'</p></div>');
              } else {
                print('<div style="background-color: lightgreen"><p class="ml-4">'.$message.'</p></div>');
              }
            } else {
              print('<div style="background-color: lightgreen"><p class="ml-4">'.$message.'</p></div>');
            }
          }
        ?>
        <h1>Login Form</h1>
        <form action="actions/login.php" method="POST">
          <div class="form-group">
            <label for="login_username">Username</label>
            <input name="username" type="text" class="form-control" id="login_username" aria-describedby="usernameHelp" placeholder="Enter username">
          </div>
          <div class="form-group">
            <label for="login_password">Password</label>
            <input name="password" type="password" class="form-control" id="login_password" placeholder="Password">
          </div>
          <button type="submit" class="btn btn-primary">Login!</button>
        </form>
      </section>
    </section>
    <?php include("inc/footer.html")?>
  </body>
</html>
