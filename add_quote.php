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
  <body onload="startTime()">
    <?php include("inc/header.php")?>
    <section id="mainContainer">
      <section id="contentContainer">
        <h1>Login Form</h1>
        <form action="actions/add_quote.php" method="POST">
          <div class="form-group row">
            <label for="author" class="col-sm-2 col-form-label">Author</label>
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
            <label for="quote_text" class="col-sm-2 col-form-label">Quote Text</label>
            <div class="col-sm-3">
              <textarea
                rows="6"
                cols="70"
                style="width:561px; height:200px; margin:0px"
                name="quote_text"
              ></textarea
              ><br /><br />
            </div>
          </div>
          <div class="form-group row">
            <label class="checkbox-inline"><input type="checkbox" name='favorite' value=""/>  Favorite</label>
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
