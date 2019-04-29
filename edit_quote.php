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
        if(!ISSET($_SESSION['username'])){
            header("Location:http://localhost/project_x/login.php");
        }
        include("../mysqli_connect.php");
        if (!$dbc) {
            echo("<h3>error connecting to database</h3>");
            exit();
        } else {
            $sql_statement = "SELECT id,text,author,favorite,date_entered FROM `quotes` WHERE `quotes`.`id`='".$_GET["id"]."'ORDER BY `quotes`.`date_entered` DESC";
            $result = mysqli_query($dbc, $sql_statement);
            if (!$result) {
                echo "<h3>Internal Server Error<h3>";
            } else {
                $count = 0;
                while ($row = mysqli_fetch_array($result)) {
                    $_SESSION["editing_quote_id"]=$row["id"];
                    $_SESSION["editing_quote_text"]=$row["text"];
                    $_SESSION["editing_author"]=$row["author"];
                    $_SESSION["editing_favorite"]=$row["favorite"];
                    $count++;
                }
                if($count == 0) {
                    echo "No results Found";
                }
            }
        }
        $dbc -> close();
    ?>
    <section id="mainContainer">
      <section id="contentContainer">
        <h1>Login Form</h1>
        <form action="actions/edit_quote.php" method="POST">
          <div class="form-group row">
            <label for="author" class="col-sm-2 col-form-label">Author</label>
            <div class="col-sm-3">
              <?php
                print('<input
                name="author"
                type="text"
                class="form-control"
                id="author"
                placeholder="Author"
                value="'.$_SESSION["editing_author"].'"/>')
              ?>
            </div>
          </div>
          <div class="form-group row">
            <label for="quote_text" class="col-sm-2 col-form-label">Quote Text</label>
            <div class="col-sm-3">
              <textarea
                rows="6"
                cols="70"
                style="width:561px; height:200px; margin:0px"
                name="quote_text"
              ><?php
                    print($_SESSION["editing_quote_text"]);
                ?></textarea>
              <br /><br />
            </div>
          </div>
          <div class="form-group row">
            <?php
                if ($_SESSION["editing_favorite"] == 'Y') {
                    print('<label class="checkbox-inline"><input type="checkbox" name="favorite" value=""checked/>  Favorite</label>');
                } else {
                    print('<label class="checkbox-inline"><input type="checkbox" name="favorite" value=""/>  Favorite</label>');
                }
            ?>
          </div>
          <div class="form-group row">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </form>
      </section>
    </section>
    <?php include("inc/footer.html")?>
  </body>
</html>
