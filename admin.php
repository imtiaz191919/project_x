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
    ?>
    <?php 
        if (ISSET($_POST["selected_user"]) && $_POST["selected_user"] != "None") {
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
                <form action="" method="POST">
                    <input type="radio" name="status" value="Open" checked> Open<br>
                    <input type="radio" name="status" value="Locked"> Locked<br>
                    <input type="radio" name="status" value="Grant Admin Role"> Grant Admin Role <br>
                    <input type="radio" name="status" value="Delete this account"> Delete this account <br>
                    <button type="submit" class="btn btn-primary mt-4">Submit Changes!</button>
                </form>
            </section>
        </section>
    </section>
    <?php 
        } else {
    ?>
        <section id="mainContainer">
            <section id="contentContainer">
                <h1 class="mb-4">Administrator Functions</h1>
                <form action="" method="POST">
                    <div class="dropdown mt-4 mr-4" style="display:inline">
                        <label for="username" class="mr-4">Username</label>
                        <select name="selected_user">
                            <option>None</option>
                            <option>imtiaz</option>
                            <option>imtiaz2</option>
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
