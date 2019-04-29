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
        <?php
          if (ISSET($_GET["message"])) {
            if (ISSET($_GET["type"])) {
              $message = "";
              if ($_GET["message"] == "unable_to_upload_file") {
                $message = "Unable to upload file.";
              } else if ($_GET["message"] == "invalid_format") {
                $message = "File has to be of one of these formats txt,pdf,doc,docx.";
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
        <h1>Upload a story file</h1>
        <p class="mt-4 mb-4">File has to be of one of these formats txt,pdf,doc,docx.</p>
        <form action="actions/upload.php" method="post" enctype="multipart/form-data">
            Select file to upload:
            <input type="file" name="uploaded_file" id="uploaded_file">
            <input type="submit" value="Upload File" name="submit">
        </form>
      </section>
    </section>
    <?php include("inc/footer.html")?>
  </body>
</html>
