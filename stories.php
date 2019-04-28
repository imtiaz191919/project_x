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
        <h1>Upload a story file</h1>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Name</th>
                <th scope="col">Last Modified</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $search_dir = "./../users/".$_SESSION["username"];
                if(is_dir($search_dir)) {
                  $contents = scandir($search_dir);
                  foreach ($contents as $item) {
                      if((is_file($search_dir . '/' . $item)) && strpos($item, '.csv') == false)  {
                              $file_size = filesize($search_dir . '/' . $item);
                              $file_name = $item;
                              $date_modified = date(filemtime($search_dir . '/' . $item));
                              $formatted_date = date('d/m/Y h:i:s', $date_modified);         
                              echo "<tr>
                              <td>".$file_name."</td>
                              <td>".$formatted_date."</td>
                              </tr>";
                      }
                  }
                }
                ?>
            </tbody>
        </table>
      </section>
    </section>
    <?php include("inc/footer.html")?>
  </body>
</html>
