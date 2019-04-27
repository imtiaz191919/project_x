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
    ?>
    <section id="mainContainer">
      <section id="contentContainer">
        <h1>Email Form</h1>
        <form action="actions/send_email.php" method="POST">
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label"
              >My Email</label
            >
            <div class="col-sm-3">
              <input
                type="email"
                name="email"
                class="form-control"
                id="inputEmail3"
                placeholder="Email"
              />
            </div>
          </div>
          <div class="form-group row">
            <label for="subject" class="col-sm-2 col-form-label">Subject</label>
            <div class="col-sm-3">
              <input
                name="subject"
                type="text"
                class="form-control"
                id="subject"
                placeholder="Subject"
              />
            </div>
          </div>
          <div class="form-group row">
            <label for="message" class="col-sm-2 col-form-label">Message</label>
            <div class="col-sm-3">
              <textarea
                rows="6"
                cols="70"
                style="width:561px; height:200px; margin:0px"
                name="message"
              ></textarea
              ><br /><br />
            </div>
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
