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
  <body>
    <?php include("inc/header.php")?>
    <section id="mainContainer">
      <section id="contentContainer">
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
