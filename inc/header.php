<header class="header">
  <a
    id="logo_name"
    href="index.php"
    style="text-decoration:none; color: white; float:left; font-size:30px; margin:0px; margin-left:20px;"
  >
    Raise High the Roof Beam!
  </a>
  <ul>
    <li><a href="#">Books</a></li>
    <li><a href="quotes.php">Quotes</a></li>
    <?php 
      session_start();
      if(ISSET($_SESSION['username'])){
        echo("<li><a href='stories.php'>Stories</a></li>");
        echo("<li><a href='uploads.php'>Uploads</a></li>");
        echo("<li><a href='#'>Admin</a></li>");
      } 
    ?>
    <?php 
      if(ISSET($_SESSION['username'])){
        echo("<li><a href='email.php'>Email</a></li>");
      } 
    ?>
    <?php 
      if(ISSET($_SESSION['username'])){
        echo("<li><a href='actions/logout.php'>logout</a></li>");
      } else {
        echo("<li><a href='login.php'>Login</a></li>");
        echo("<li><a href='register.php'>Register</a></li>");
      }
    ?>
  </ul>
</header>