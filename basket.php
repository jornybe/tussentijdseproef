<?php
  session_start();
?>
<!DOCTYPE html>
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
                    
          $artikels = $_SESSION['mand']->ophalenArtikels();
          $_SESSION['mand']->toevoegenAanMandje($artikels[$id]);          
        ?>
        <?php
          if (isset($_POST['verstuur']))
          {
            $to = $_POST['email'];
            $subject = "Uw bestelling";
                        
            foreach ($_SESSION['mand']->mandWeergeven() as $telefoon)
            {      
              $message .= "<td><table><tr><td>" . $telefoon['omschrijving'] . "</td></tr>";        
              $message .= "<tr><td>&euro; " . $telefoon['eenheidsprijs'] . "</td></tr>";            
              $message .= "</tr></td></table></td>";        
            }
            $headers = 'From: test@syntrawest.be' . "\r\n" .
                       'Reply-To: test@syntrawest.be' . "\r\n" .
                       'X-Mailer: PHP/' . phpversion();

            if (mail($to, $subject, $message, $headers))
            {
              echo "Bedankt voor uw bestelling! U ontvangt uw orderbevestiging per mail<br/>";
              echo "<a href='index.php?id=1'>Terug naar hoofdpagina</a>";
            }else{
              echo "Bestelling is niet doorgestuurd! Probeer later opnieuw!";
            }
            $_SESSION['mand']->mandLeegmaken();
          }
        ?>
          <form name="verstuur" action="" method="post">
            Geef uw emailadres ter bevestiging<br/><input type="text" name="email" /><br/>
            <input type="submit" name="verstuur" value="verstuur" />
          </form>
        </div>
        <div id="content-right">
        <?php
          foreach ($_SESSION['mand']->mandWeergeven() as $telefoon)
          {      
            echo "<td><table><tr><td>" . $telefoon['omschrijving'] . "</td></tr>";            
            echo "<tr><td>&euro; " . $telefoon['eenheidsprijs'] . "</td></tr>";            
            echo "</tr></td></table></td>";        
          }                       
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