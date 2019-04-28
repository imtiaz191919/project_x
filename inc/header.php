<header class="header">
  <a
    id="logo_name"
    href="index.php"
    style="text-decoration:none; color: white; float:left; font-size:30px; margin:0px; margin-left:20px;"
  >
    Raise High the Roof Beam!
  </a>
  <ul>
    <li><a href="http://localhost/project_x/books.php">Books</a></li>
    <li><a href="http://localhost/project_x/quotes.php">Quotes</a></li>
    <?php 
      session_start();
      if(ISSET($_SESSION['username'])){
        echo("<li><a href='http://localhost/project_x/stories.php'>Stories</a></li>");
        echo("<li><a href='http://localhost/project_x/uploads.php'>Uploads</a></li>");
        if (ISSET($_SESSION['is_admin']) && $_SESSION['is_admin']) {
          echo("<li><a href='http://localhost/project_x/admin.php'>Admin</a></li>");
        }
      } 
    ?>
    <?php 
      if(ISSET($_SESSION['username'])){
        echo("<li><a href='http://localhost/project_x/email.php'>Email</a></li>");
      } 
    ?>
    <?php 
      if(ISSET($_SESSION['username'])){
        echo("<li><a href='http://localhost/project_x/actions/logout.php'>logout</a></li>");
      } else {
        echo("<li><a href='http://localhost/project_x/login.php'>Login</a></li>");
        echo("<li><a href='http://localhost/project_x/register.php'>Register</a></li>");
      }
    ?>
  </ul>
</header>
