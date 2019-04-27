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
    <?php include("inc/header.php")?>
    <section id="mainContainer">
      <section id="contentContainer">
        <h1>Upload a story file</h1>
        <form action="actions/upload.php" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="uploaded_file" id="uploaded_file">
            <input type="submit" value="Upload Image" name="submit">
        </form>
      </section>
    </section>
    <?php include("inc/footer.html")?>
  </body>
</html>
