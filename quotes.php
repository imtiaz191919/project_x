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
    <section id="mainContainer">
      <section id="contentContainer">
        <h1>Quotes</h1>
        <?php
            if(ISSET($_SESSION['username'])){
                echo('<div onclick="location.href='."'add_quote.php'".';"><h3 class='."'mt-4 mb-4'".' style='."'color=blue;'".'>Add a quote</h3></div>');
            }
        ?>
        <?php
            include("mysqli_connect.php");
            if (!$dbc) {
                echo("<h3>error connecting to database</h3>");
                exit();
            } else {
                $sql_statement = "SELECT text,author,favorite,date_entered FROM quotes ORDER BY `quotes`.`date_entered` DESC";
                $result = mysqli_query($dbc, $sql_statement);
                if (!$result) {
                    echo "<h3>Internal Server Error<h3>";
                } else {
                    $count = 0;
                    while ($row = mysqli_fetch_array($result)) {
                        $fav_text = $row['favorite'];
                        $is_favorite = $fav_text == 'Y' ? "Favorite" : "";
                        echo "<div class='mt-4'>";
                        echo "<div><p style='display:inline-block;'>".$row['text']."</p><p style='display:inline-block;color:red;' class='ml-4'>".$is_favorite."</p></div>";
                        echo "<h6>".$row['author']."</h6>";
                        echo "<hr />";
                        echo "</div>";
                        $count++;
                    }
                    if($count == 0) {
                        echo "No results Found";
                    }
                }
            }
            $dbc -> close();
        ?>
      </section>
    </section>
    <?php include("inc/footer.html")?>
  </body>
</html>
