<html>
  <head>
    <title>Books</title>
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
        <h1>Add a book</h1>
        <form action="actions/add_book.php" method="POST">
          <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">Book Title</label>
            <div class="col-sm-3">
              <input
                name="title"
                type="text"
                class="form-control"
                id="title"
                placeholder="Title"
              />
            </div>
          </div>
          <div class="form-group row">
            <label for="author" class="col-sm-2 col-form-label">Book Author</label>
            <div class="col-sm-3">
              <input
                name="author"
                type="text"
                class="form-control"
                id="author"
                placeholder="Author"
              />
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </form>
        <h2 class="mt-4 mb-4">My Books</h2>
        <?php
          $username=$_SESSION["username"];
          if (file_exists("../users/".$username)) {
            $file = fopen("../users/".$username.'/books.csv', 'r');
            print("<ul>");
            while (($data = fgetcsv($file, 1000, ",")) !== FALSE) 
            {
              print("<li>".$data[1]." By ".$data[0]."</li>");
            }
            print("</ul>");
            fclose($file);
          }
        ?>
      </section>
    </section>
    <?php include("inc/footer.html")?>
  </body>
</html>
