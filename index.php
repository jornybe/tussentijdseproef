<?php
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Tussentijdse proef</title>
    <link href="css/globaal.css" rel="stylesheet" type="text/css" />       
  </head>     
  <body>
    <!-- container div -->
    <div id="container">
      <!-- header div -->
      <header>        
        <div id="topheader"></div>
        <nav>
          <h1 class="hidden">Navigatie van de site</h1>
          <ul>
            <li><a href="index.php?id=1">home</a></li>
            <li>|</li>
            <li><a href="index.php?id=2">winkelmandje</a></li>
            <li>|</li>
            <li><a href="index.php?id=3">contacteer ons</a></li>            
          </ul>
        </nav>
        <div id="subheader"></div>
        <div id="rechtssub"></div>
      </header>
      <!-- content div -->
      <section>
        <h1 class="hidden">Bestel hier uw gsm</h1>
        <div id="content-left">
        <?php
          $id = $_GET['id'];
          require_once ("classes/basket.class.php");
          if (!isset($_SESSION['mand']))
          {
            $mand = new Basket();
            $_SESSION['mand'] = $mand;
          }
          
          switch ($id)
          {
            case 1:
              include_once("includes/home.inc.php");
              break;
            case 2:
              include_once("includes/basket.inc.php");
              break;
            case 3:
              include_once("includes/contact.inc.php");
              break;       
            default:
              include_once("includes/home.inc.php");
          }
        ?>          
        </div>
        <div id="content-right">
          <?php            
            print_r($_SESSION['items']);            
          ?>
        </div>
      </section>
      <footer>
        <p>&copy; 2012 Jorny Berghman - Webmaster Advanced</p>
      </footer>
      <!-- footer div -->
    </div>
  </body>
</html>